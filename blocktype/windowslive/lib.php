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
 * @subpackage blocktype-windowslive
 * @author     Gregor Anželj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2010 Gregor Anželj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeWindowsLive extends SystemBlocktype {

    private static $default_width = 402;
    private static $default_height = 346;
    private static $default_scrolling = 'no';

    public static function get_title() {
        return get_string('title', 'blocktype.windowslive');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.windowslive');
    }

    public static function get_categories() {
        return array('fileimagevideo');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
        $result = '';
        $service = self::make_services_url($configdata['servicesid']);
        $url    = hsc($service['url']);
        $type   = hsc($service['type']);
        $width  = (!empty($configdata['width'])) ? hsc($configdata['width']) : self::$default_width;
        $height = (!empty($configdata['height'])) ? hsc($configdata['height']) : self::$default_height;
		// Get Hotmail Calendar width and height from embed code and override the default width and height
		if ($type == 'calendar') {
			$width = hsc($service['width']);
			$height = hsc($service['height']);
		}

        if (isset($configdata['servicesid'])) {
            $result .= '<div class="windowslive-container center"><div class="windowslive">';
			switch ($type) {
				case 'map':
				case 'calendar':
					$result .= '<iframe width="' . $width . '" height="' . $height . '" scrolling="no" frameborder="0" ';
					$result .= 'src="' . $url . '"></iframe>';
					break;
				case 'iframe':
					$result .= '<iframe width="' . $width . '" height="' . $height . '" frameborder="0" ';
					$result .= 'src="' . $url . '"></iframe>';
					break;
				case 'iframeicon':
					$result .= '<iframe width="100" height="115" scrolling="no" frameborder="0" ';
					$result .= 'style="width:100px;height:115px;padding:0;background-color:#fcfcfc;" ';
					$result .= 'src="' . $url . '"></iframe>';
					break;
			}
            $result .= '</div></div>';
        }

        return $result;
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');
        $service    = self::make_services_url($configdata['servicesid']);
        $type       = hsc($service['type']);
        return array(
            'servicesid' => array(
                'type'  => 'textarea',
                'title' => get_string('servicescodeorurl','blocktype.windowslive'),
                'description' => get_string('servicescodeorurldesc','blocktype.windowslive') . self::get_html_of_supported_services(),
                'rows' => 5,
				'cols' => 80,
                'defaultvalue' => (!empty($configdata['servicesid']) ? $configdata['servicesid'] : null),
                'rules' => array(
                    'required' => true
                ),
                'help' => true,
            ),
            'width' => array(
				'type' => 'text',
                'title' => get_string('width','blocktype.windowslive'),
                'size' => 3,
                'rules' => array(
                    'required' => true,
                    'integer'  => true,
                ),
                'defaultvalue' => (!empty($configdata['width']) ? $configdata['width'] : self::$default_width),
				// If we want to embed small Hotmail Calendar, than disable width - Calendar has it's own set of widths!
                'disabled' => ($type == 'calendar' ? true : false),
                'help' => ($type == 'calendar' ? true : false),
            ),
            'height' => array(
				'type' => 'text',
                'title' => get_string('height','blocktype.windowslive'),
                'size' => 3,
                'rules' => array(
                    'required' => true,
                    'integer'  => true,
                ),
                'defaultvalue' => (!empty($configdata['height'])) ? $configdata['height'] : self::$default_height,
				// If we want to embed small Hotmail Calendar, than disable height - Calendar has it's own set of heights!
                'disabled' => ($type == 'calendar' ? true : false),
                'help' => ($type == 'calendar' ? true : false),
            ),
        );
    }

    private static function make_services_url($url) {
        static $embedsources = array(
            // Microsoft Office Excel Web App embeddable spreadsheet
			// $1 - all arguments, needed to embed the spreadsheet
            array(
                'match'  => '#.*r.office.microsoft.com/.*ExcelEmbed\?([a-zA-Z0-9\!\&\=]+).*#',
                'url'    => 'http://r.office.microsoft.com/r/rlidExcelEmbed?$1',
				'width'  => '',
				'height' => '',
				'type'   => 'iframe',
            ),
            // Microsoft Office PowerPoint Web App embeddable presentation
			// $1 - all arguments, needed to embed the presentation
            array(
                'match'  => '#.*r.office.microsoft.com/.*PowerPointEmbed\?([a-zA-Z0-9\!\&\=]+).*#',
                'url'    => 'http://r.office.microsoft.com/r/rlidPowerPointEmbed?$1',
				'width'  => '',
				'height' => '',
				'type'   => 'iframe',
            ),
            // Microsoft Office Word embeddable icon with link to document or
			// Microsoft Office OneNote embeddable icon with link to notebook or
			// SkyDrive folder embeddable icon with link to folder on SkyDrive
			// $1 - id of the document/notebook/folder on the SkyDrive
			// $2 - name of the document/notebook/folder, to be embedded
            array(
                'match'  => '#.*http://cid-([a-zA-Z0-9]+).office.live.com/embedicon.aspx/([a-zA-Z0-9\!\&\=\.\_\-\%\/]+).*#',
                'url'    => 'http://cid-$1.office.live.com/embedicon.aspx/$2',
				'width'  => '',
				'height' => '',
				'type'   => 'iframeicon',
            ),
            // Microsoft Hotmail Calendar (big)
			// $1 - id of the embedded calendar
			// $2 - title (name) of the embedded calendar
			// $3 - all arguments, needed to embed the calendar
            array(
                'match'  => '#.*http://cid-([a-zA-Z0-9]+).calendar.live.com/calendar/([a-zA-Z0-9\!\&\=\.\,\;\:\_\-\+\']+)/index.html\?([a-zA-Z0-9\!\&\=\.\_\-]+).*#',
                'url'    => 'http://cid-$1.calendar.live.com/calendar/$2/index.html?$3',
				'type'   => 'iframe',
            ),
            // Microsoft Hotmail Calendar (small)
			// $1 - all arguments, needed to embed the calendar
			// $2 - width of the embedded calendar
			// $3 - height of the embedded calendar
            array(
                'match'  => '#.*http://calendar.live.com/calendar/.*\?([a-zA-Z0-9\!\&\=\.\_\-\+\']+).*width.*([0-9]{3}).*height.*([0-9]{3}).*#',
                'url'    => 'http://calendar.live.com/calendar/badgeif.aspx?$1',
				'width'  => '$2',
				'height' => '$3',
				'type'   => 'calendar',
            ),
            // Bing Maps
			// $1 - width of the embedded calendar
			// $2 - height of the embedded calendar
			// $3 - all arguments, needed to embed the calendar
            array(
                'match'  => '#.*http://www.bing.com/maps/embed/.*\?([a-zA-Z0-9\!\&\=\.\_\-\%\+\;\~]+).*emid\=([a-zA-Z0-9\-]+).*w\=([0-9]{3}).*h\=([0-9]{3}).*#',
                'url'    => 'http://www.bing.com/maps/embed/?$1emid=$2',
				'width'  => '$3',
				'height' => '$4',
				'type'   => 'map',
            ),
        );

        foreach ($embedsources as $source) {
			$url = htmlspecialchars_decode($url); // convert &amp; back to &, etc.
            if (preg_match($source['match'], $url)) {
				// It is necessary to delete </div> tags from Bing Maps url, width and height...
                $service_url = preg_replace(array($source['match'], '(</div>)'), array($source['url'], ''), $url);
				$service_type = $source['type'];
				$service_width = preg_replace(array($source['match'], '(</div>)'), array($source['width'], ''), $url);
				$service_height = preg_replace(array($source['match'], '(</div>)'), array($source['height'], ''), $url);
				return array('url' => $service_url, 'type' => $service_type, 'width' => $service_width, 'height' => $service_height);
            }
        }
        // TODO handle failure case
    }

    /**
     * Returns a block of HTML that the Windows Live block can use to list 
     * which Windows Live services  are supported.
     */
    private static function get_html_of_supported_services() {
        $html = '<ul style="list-style-type: none;">';
		$html .= '<li><img src="' . get_config('wwwroot') . '/blocktype/windowslive/logos/officewebapps.png" width="16" height="16" style="vertical-align:middle;margin-right:5px;">Office Web Apps (Excel, OneNote, PowerPoint, Word)</li>';
		$html .= '<li><img src="' . get_config('wwwroot') . '/blocktype/windowslive/logos/hotmailcalendar.png" width="16" height="16" style="vertical-align:middle;margin-right:5px;">Hotmail Calendars</li>';
		$html .= '<li><img src="' . get_config('wwwroot') . '/blocktype/windowslive/logos/bingmaps.png" width="16" height="14" style="vertical-align:middle;margin-right:5px;">Bing Maps</li>';
		$html .= '</ul>';
		return $html;
    }

    public static function default_copy_type() {
        return 'full';
    }

}

?>
