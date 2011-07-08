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
 * @subpackage blocktype-twittertweet
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2011 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeTwitterTweet extends SystemBlocktype {

    public static function single_only() {
        return true;
    }

    public static function get_title() {
        return get_string('title', 'blocktype.twittertweet');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.twittertweet');
    }

    public static function get_categories() {
        return array('general');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
        $align      = (!empty($configdata['align'])) ? hsc($configdata['align']) : 'left';
        $tweettext  = (!empty($configdata['tweettext'])) ? hsc($configdata['tweettext']) : '';
        $tweetuser  = (!empty($configdata['tweetuser'])) ? hsc($configdata['tweetuser']) : '';
		
		/*
		switch ($configdata['layout']) {
			case 'vertical':
				$width = 80;
				$height = 65;
				break;
			case 'horizontal':
				$width = 120;
				$height = 20;
				break;
			case 'none':
			default:
				$width = 80;
				$height = 20;
				break;
		}
		*/
		
		$full_self_url = urlencode('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
		$result = '<div class="' . $align . '">';
        $result .= '<a href="http://twitter.com/share?url=' . $full_self_url . '" class="twitter-share-button"'
				  . ' data-text="' . $configdata['tweettext'] . '"'
				  . ' data-count="' . $configdata['layout'] . '"'
				  . ' data-lang="' . self::get_locale_code(get_config('lang')) . '"'
                  . '>Tweet</a>'
                  . '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
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
                'title' => get_string('showtitle','blocktype.twittertweet'),
                'defaultvalue' => (!empty($configdata['showtitle']) ? $configdata['showtitle'] : 0),
            ),
            'layout' => array(
                'type' => 'select',
                'title' => get_string('datacount','blocktype.twittertweet'),
                'description' => get_string('datacountdesc','blocktype.twittertweet'),
                'defaultvalue' => (!empty($configdata['layout']) ? $configdata['layout'] : 'standard'),
				'options' => array(
					'none'     => get_string('datacountnone','blocktype.twittertweet'),
					'horizontal' => get_string('datacounthorizontal','blocktype.twittertweet'),
					'vertical'    => get_string('datacountvertical','blocktype.twittertweet'),
				),
            ),
            'tweettext' => array(
                'type' => 'text',
                'title' => get_string('tweettext','blocktype.twittertweet'),
                'description' => get_string('tweettextdesc','blocktype.twittertweet'),
                'defaultvalue' => (!empty($configdata['tweettext']) ? $configdata['tweettext'] : ''),
            ),
            'align' => array(
                'type' => 'radio',
                'title' => get_string('align','blocktype.twittertweet'),
                'defaultvalue' => (!empty($configdata['align'])) ? $configdata['align'] : 'left',
				'options' => array(
					'left' => get_string('alignleft','blocktype.twittertweet'),
					'center' => get_string('aligncenter','blocktype.twittertweet'),
					'right' => get_string('alignright','blocktype.twittertweet'),
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
			case 'ca.utf8': $locale = 'es'; break;
			case 'de.utf8': $locale = 'de'; break;
			case 'es.utf8': $locale = 'es'; break;
			case 'fr.utf8': $locale = 'fr'; break;
			case 'it.utf8': $locale = 'it'; break;
			case 'jp.utf8': $locale = 'jp'; break;
			case 'ko.utf8': $locale = 'ko'; break;
			default: $locale = 'en'; break;
		}
		return $locale;
	}
	
    public static function default_copy_type() {
        return 'full';
    }

}

?>
