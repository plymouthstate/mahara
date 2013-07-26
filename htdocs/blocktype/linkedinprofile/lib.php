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
 * @subpackage blocktype-linkedinprofile
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2012 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeLinkedInProfile extends SystemBlocktype {

    public static function single_only() {
        return true;
    }

    public static function get_title() {
        return get_string('title', 'blocktype.linkedinprofile');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.linkedinprofile');
    }

    public static function get_categories() {
        return array('internal');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
		$profileurl = $configdata['profileurl'];
        $style      = isset($configdata['style']) ? intval($configdata['style']) : 0;
        $width      = isset($configdata['width']) ? intval($configdata['width']) : 300;
        $related    = (!empty($configdata['related']) && $configdata['related'] == true) ? true : false;
        $align      = (!empty($configdata['align'])) ? hsc($configdata['align']) : 'left';
		
        switch ($style) {
            case 0: // public profile summary
                $template = 'summary';
				$profile = '';
                break;
            case 1: // full public profile
                $template = 'full';
				// Get Full public member profile from LinkedIn
				$ch = curl_init($profileurl);
				// Set so curl_exec returns the result instead of outputting it.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch);
				curl_close($ch);
				// Extract only the left column of the Full public member profile...
				$start_pattern = '<div id="content" class="resume hresume">';
				$end_pattern   = '<div id="extra"'; // full tag can be: <div id="extra"> or <div id="extra" class="infobar">
				$start = strpos($result, $start_pattern);
				$end = strpos($result, $end_pattern);
				$profile = substr($result, $start, $end-$start);
				// Fix internal href links (or they will be broken)!
				$profile = str_replace('href="/', 'href="http://www.linkedin.com/', $profile);
				// Fix internal src links (or they will be broken)!
				$profile = str_replace('src="/', 'src="http://www.linkedin.com/', $profile);
                break;
        }

		$smarty = smarty_core();
        $smarty->assign('profileurl', $profileurl);
        $smarty->assign('width', $width);
        $smarty->assign('related', $related);
        $smarty->assign('align', $align);
        $smarty->assign('profile', $profile);

        return $smarty->fetch('blocktype:linkedinprofile:' . $template . '.tpl');
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');
        $style_options = array(
            0 => get_string('stylesummary', 'blocktype.linkedinprofile'),
            1 => get_string('stylefull', 'blocktype.linkedinprofile'),
        );

        return array(
            'showtitle' => array(
                'type'  => 'checkbox',
                'title' => get_string('showtitle','blocktype.linkedinprofile'),
                'defaultvalue' => (!empty($configdata['showtitle']) ? $configdata['showtitle'] : 0),
            ),
            'profileurl' => array(
                'type' => 'text',
                'title' => get_string('profileurl','blocktype.linkedinprofile'),
                'defaultvalue' => (!empty($configdata['profileurl']) ? $configdata['profileurl'] : ''),
                'rules' => array(
                    'required' => true
                ),
            ),
            'style' => array(
                'type' => 'radio',
                'title' => get_string('style', 'blocktype.linkedinprofile'),
                'options' => $style_options,
                'defaultvalue' => (isset($configdata['style'])) ? $configdata['style'] : 0,
                'separator' => '<br>',
            ),
            'width' => array(
                'type' => 'text',
                'title' => get_string('width', 'blocktype.linkedinprofile'),
                'size' => 3,
                'defaultvalue' => (isset($configdata['width'])) ? $configdata['width'] : 300,
                //'description' => get_string('widthdescription', 'blocktype.linkedinprofile'),
                'rules' => array(
                    'minvalue' => 300,
                ),
			),
            'related' => array(
                'type' => 'checkbox',
                'title' => get_string('showconnections','blocktype.linkedinprofile'),
                'defaultvalue' => (!empty($configdata['related']) && $configdata['related'] == true ? true : false),
				'description' => get_string('showconnectionsdesc','blocktype.linkedinprofile'),
            ),
            'align' => array(
                'type' => 'radio',
                'title' => get_string('align','blocktype.linkedinprofile'),
                'defaultvalue' => (!empty($configdata['align'])) ? $configdata['align'] : 'left',
				'options' => array(
					'left' => get_string('alignleft','blocktype.linkedinprofile'),
					'center' => get_string('aligncenter','blocktype.linkedinprofile'),
					'right' => get_string('alignright','blocktype.linkedinprofile'),
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
	
    public static function default_copy_type() {
        return 'full';
    }

    /**
     * LinkedIn Profile blocktype is only allowed in personal views, because
     * there's no such thing as group/site profiles
     */
    public static function allowed_in_view(View $view) {
        return $view->get('owner') != null;
	}		
			
}

?>
