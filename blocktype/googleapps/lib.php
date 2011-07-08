<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2009 Catalyst IT Ltd and others; see:
 *                         http://wiki.mahara.org/Contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    mahara
 * @subpackage blocktype-googleapps
 * @author     Gregor Anželj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2010 Gregor Anželj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

/**
 * todos before this block type can be considered complete
 *  - document this class and methods
 *  - correct category
 *  - more video url sources, and good default behaviour
 *  - block title editable
 *  - i18n
 *  - minvalue/maxvalue rules
 */
class PluginBlocktypeGoogleApps extends SystemBlocktype {

    private static $default_width = 410;
    private static $default_height = 342;

    public static function get_title() {
        return get_string('title', 'blocktype.googleapps');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.googleapps');
    }

    public static function get_categories() {
        return array('fileimagevideo');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
        $result = '';
        $url    = hsc(self::make_apps_url($configdata['appsid']));
        $width  = (!empty($configdata['width'])) ? hsc($configdata['width']) : self::$default_width;
        $height = (!empty($configdata['height'])) ? hsc($configdata['height']) : self::$default_height;

        if (isset($configdata['appsid'])) {
            $result .= '<div class="googleapps-container center"><div class="googleapps">';
			$result .= '<iframe width="' . $width . '" height="' . $height . '" frameborder="0" ';
			$result .= 'src="' . $url . '"></iframe>';
            $result .= '</div></div>';
        }

        return $result;
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');
        return array(
            'appsid' => array(
                'type'  => 'textarea',
                'title' => get_string('appscodeorurl','blocktype.googleapps'),
                'description' => get_string('appscodeorurldesc','blocktype.googleapps') . self::get_html_of_supported_googleapps(),
                'rows' => 5,
				'cols' => 80,
                'defaultvalue' => (!empty($configdata['appsid']) ? $configdata['appsid'] : null),
                'rules' => array(
                    'required' => true
                ),
                'help' => true,
            ),
            'width' => array(
                'type' => 'text',
                'title' => get_string('width','blocktype.googleapps'),
                'size' => 3,
                'rules' => array(
                    'required' => true,
                    'integer'  => true,
                    'minvalue' => 100,
                    'maxvalue' => 800,
                ),
                'defaultvalue' => (!empty($configdata['width']) ? $configdata['width'] : self::$default_width),
            ),
            'height' => array(
                'type' => 'text',
                'title' => get_string('height','blocktype.googleapps'),
                'size' => 3,
                'rules' => array(
                    'required' => true,
                    'integer'  => true,
                    'minvalue' => 100,
                    'maxvalue' => 800,
                ),
                'defaultvalue' => (!empty($configdata['height'])) ? $configdata['height'] : self::$default_height,
            ),
        );
    }

    private static function make_apps_url($url) {
        static $embedsources = array(
            // docs.google.com/present - Google presentation
            array(
                'match' => '#.*docs.google.com/present.*id=([a-zA-Z0-9\_\-\&\=]+).*#',
                'url'   => 'http://docs.google.com/present/embed?id=$1',
            ),
            // docs.google.com - Google document (before July 2010)
            array(
                'match' => '#.*docs.google.com/View.*id=([a-zA-Z0-9\_\-]+).*#',
                'url'   => 'http://docs.google.com/View?id=$1',
            ),
            // docs.google.com - Google document (after July 2010)
            array(
                'match' => '#.*docs.google.com/document/pub.*id=([a-zA-Z0-9\_\-]+).*#',
                'url'   => 'http://docs.google.com/document/pub?id=$1',
            ),
            // spreadsheets.google.com - Google spreadsheet
            array(
                'match' => '#.*spreadsheets.google.com.*key=([a-zA-Z0-9\_\-]+).*#',
                'url'   => 'http://spreadsheets.google.com/pub?key=$1',
            ),
            // www.google.com/calendar - Google calendar
            array(
                'match' => '#.*www.google.com/calendar.*src=([a-zA-Z0-9\.\_\-\&\%\=/]+).*#',
                'url'   => 'http://www.google.com/calendar/embed?src=$1',
            ),
            // maps.google.com - Google My Maps (IMPORTANT: this is ONLY for My Maps)
            array(
                'match' => '#.*maps.google.com/maps/ms\?([a-zA-Z0-9\.\,\;\_\-\&\%\=\+/]+).*#',
                'url'   => 'http://maps.google.com/maps/ms?$1',
            ),
            // maps.google.com - Google Maps (IMPORTANT: tjis is for ANY Maps EXCEPT My Maps)
            array(
                'match' => '#.*maps.google.com/maps\?([a-zA-Z0-9\.\,\;\_\-\&\%\=\+/]+).*#',
                'url'   => 'http://maps.google.com/maps?$1',
            ),
        );

        foreach ($embedsources as $source) {
			$url = htmlspecialchars_decode($url); // convert &amp; back to &, etc.
            if (preg_match($source['match'], $url)) {
                $return = preg_replace($source['match'], $source['url'], $url);
				// For correctly embed Google maps...
				$return = str_replace('source=embed', 'output=embed', $return);
				return $return;
            }
        }
        // TODO handle failure case
    }

    /**
     * Returns a block of HTML that the Google Apps block can use to list 
     * which Google services  are supported.
     */
    private static function get_html_of_supported_googleapps() {
        $html = '<ul style="list-style-type: none;">';
		$html .= '<li><a href="http://www.google.com/calendar" target="_blank"><img src="http://calendar.google.com/googlecalendar/images/calendar_logo_sm_' . substr(get_config('lang'),0,2) . '.gif" border="0" height="20"></li>';
		$html .= '<li><a href="http://docs.google.com/" target="_blank"><img src="http://docs.google.com/images/doclist/docs_logo_sm.gif" border="0" height="20"></a></li>';
		$html .= '<li><a href="http://maps.google.com/" target="_blank"><img src="http://maps.google.com/intl/' . substr(get_config('lang'),0,2) . '/images/logos/maps_logo.gif" border="0" height="20"></a></li>';
		$html .= '</ul>';
		return $html;
    }

    public static function default_copy_type() {
        return 'full';
    }

}

?>
