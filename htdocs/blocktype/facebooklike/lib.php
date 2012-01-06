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
 * @subpackage blocktype-facebooklike
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2011 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeFacebookLike extends SystemBlocktype {

    public static function single_only() {
        return true;
    }

    public static function get_title() {
        return get_string('title', 'blocktype.facebooklike');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.facebooklike');
    }

    public static function get_categories() {
        return array('general');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
        $align  = (!empty($configdata['align'])) ? hsc($configdata['align']) : 'left';
		
		switch ($configdata['layout']) {
			case 'box_count':
				$width = 90;
				$height = 65;
				break;
			case 'button_count':
				$width = 90;
				$height = 20;
				break;
			case 'standard':
			default:
				$width = 450;
				$height = 35;
				break;
		}
		
		$full_self_url = urlencode('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
		$result = '<div class="' . $align . '">';
        $result .= '<iframe src="http://www.facebook.com/plugins/like.php?href=' . $full_self_url
                  . '&amp;layout=' . $configdata['layout']
                  . '&amp;action=' . $configdata['action']
                  . '&amp;colorscheme=' . $configdata['color']
                  . '&amp;show_faces=false'
                  . '&amp;width=' . $width
                  . '&amp;height=' . $height
                  . '&amp;locale=' . self::get_locale_code(get_config('lang'))
                  . '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . $width . 'px; height:' . $height . 'px;" allowTransparency="true"></iframe>';
		$result .= '</div>';
		return $result;
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');

        return array(
            'showtitle' => array(
                'type'  => 'checkbox',
                'title' => get_string('showtitle','blocktype.facebooklike'),
                'defaultvalue' => (!empty($configdata['showtitle']) ? $configdata['showtitle'] : 0),
            ),
            'layout' => array(
                'type' => 'select',
                'title' => get_string('layoutstyle','blocktype.facebooklike'),
                'description' => get_string('layoutstyledesc','blocktype.facebooklike'),
                'defaultvalue' => (!empty($configdata['layout']) ? $configdata['layout'] : 'standard'),
				'options' => array(
					'standard'     => get_string('layoutstylestandard','blocktype.facebooklike'),
					'button_count' => get_string('layoutstylebuttoncount','blocktype.facebooklike'),
					'box_count'    => get_string('layoutstyleboxcount','blocktype.facebooklike'),
				),
            ),
            'action' => array(
                'type' => 'select',
                'title' => get_string('verbtodisplay','blocktype.facebooklike'),
                'description' => get_string('verbtodisplaydesc','blocktype.facebooklike'),
                'defaultvalue' => (!empty($configdata['action']) ? $configdata['action'] : 'like'),
				'options' => array(
					'like'       => get_string('verbtodisplaylike','blocktype.facebooklike'),
					'recommend'  => get_string('verbtodisplayrecommend','blocktype.facebooklike'),
				),
            ),
            'color' => array(
                'type' => 'select',
                'title' => get_string('colorscheme','blocktype.facebooklike'),
                'description' => get_string('colorschemedesc','blocktype.facebooklike'),
                'defaultvalue' => (!empty($configdata['color']) ? $configdata['color'] : 'light'),
				'options' => array(
					'light' => get_string('colorschemelight','blocktype.facebooklike'),
					'dark'  => get_string('colorschemedark','blocktype.facebooklike'),
				),
            ),
            'align' => array(
                'type' => 'radio',
                'title' => get_string('align','blocktype.facebooklike'),
                'defaultvalue' => (!empty($configdata['align'])) ? $configdata['align'] : 'left',
				'options' => array(
					'left' => get_string('alignleft','blocktype.facebooklike'),
					'center' => get_string('aligncenter','blocktype.facebooklike'),
					'right' => get_string('alignright','blocktype.facebooklike'),
				),
				'separator' => '&nbsp;&nbsp;&nbsp;',
			),
        );
    }

    public static function instance_config_save($values) {
        if (empty($values['showtitle'])) {
			$values['title'] = null;
		}
		return $values;
	}
	
    public static function get_locale_code($code) {
		switch ($code) {
			case 'ca.utf8': $locale = 'es_CA'; break;
			case 'cs.utf8': $locale = 'cs_CZ'; break;
			case 'da.utf8': $locale = 'da_DK'; break;
			case 'de.utf8': $locale = 'de_DE'; break;
			case 'en.utf8': $locale = 'en_GB'; break;
			case 'es.utf8': $locale = 'es_ES'; break;
			case 'fr.utf8': $locale = 'fr_FR'; break;
			case 'it.utf8': $locale = 'it_IT'; break;
			case 'jp.utf8': $locale = 'jp_JA'; break;
			case 'hu.utf8': $locale = 'hu_HU'; break;
			case 'sl.utf8': $locale = 'sl_SI'; break;
			default: $locale = 'en_US'; break;
		}
		return $locale;
	}
	
    public static function default_copy_type() {
        return 'full';
    }

}

?>
