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
 * @subpackage blocktype-embedly
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2011 Gregor Anzelj, gregor.anzelj@gmail.com
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
class PluginBlocktypeEmbedly extends SystemBlocktype {

    public static function get_title() {
        return get_string('title', 'blocktype.embedly');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.embedly');
    }

    public static function get_categories() {
        return array('feeds');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata');
        $width   = (!empty($configdata['width'])) ? hsc($configdata['width']) : null;
        $height  = (!empty($configdata['height'])) ? hsc($configdata['height']) : null;
        $align  = (!empty($configdata['align'])) ? hsc($configdata['align']) : 'left';
		
        $result  = ''; // To silence warning
		
        if (isset($configdata['mediaid'])) {
            // IE seems to wait for all elements on the page to load
            // fully before the onload event goes off.  This means the
            // view editor isn't initialised until all videos have
            // finished loading, and an invalid video URL can stop the
            // editor from loading and result in an uneditable view.

            // Therefore, when this block appears on first load of the
            // view editing page, keep the embed code out of the page
            // initially and add it in after the page has loaded.

			$url = 'http://api.embed.ly/1/oembed?url=' . urlencode($configdata['mediaid']) . '&maxwidth=' . $width . '&maxheight=' . $height . '&wmode=transparent';
            $request = array(
                CURLOPT_URL => $url,
            );
            $result = mahara_http_request($request);
            $data = json_decode($result->data, true);

			$result = '<div class="' . $align . '">';
			switch ($data['type']) {
				case 'photo':
					$result .= '<img src="' . $data['url'] . '" width="' . $data['width'] . '" height="' . $data['height'] . '" border="0">';
					break;
				case 'video':
				case 'rich' :
					$result .= $data['html'];
					break;
				case 'link' :
					$result .= $configdata['mediaid'];
					break;
			}

			if (isset($data['description']) && !empty($configdata['showdescription'])) {
				$result .= '<p>' . nl2br($data['description']) . '</p>';
			}
			$result .= '</div>';
        }

        return $result;
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');
        return array(
            'mediaid' => array(
                'type'  => 'text',
                'title' => get_string('mediaurl','blocktype.embedly'),
                'description' => get_string('mediaurldescription2','blocktype.embedly', '<a href="http://api.embed.ly/" target="_blank">', '</a>')
								 . '<br>' . get_string('mediaurlpatterns','blocktype.embedly', '<a href="http://api.embed.ly/" target="_blank">', '</a>'),
                'defaultvalue' => isset($configdata['mediaid']) ? $configdata['mediaid'] : null,
                'rules' => array(
                    'required' => true
                ),
            ),
            'showdescription' => array(
                'type'  => 'checkbox',
                'title' => get_string('showdescription', 'blocktype.embedly'),
                'defaultvalue' => !empty($configdata['showdescription']) ? true : false,
            ),
            'width' => array(
                'type' => 'text',
                'title' => get_string('width','blocktype.embedly'),
                'size' => 3,
                'rules' => array(
                    'minvalue' => 100,
                    'maxvalue' => 800,
                ),
                'defaultvalue' => (!empty($configdata['width'])) ? $configdata['width'] : null,
            ),
            'height' => array(
                'type' => 'text',
                'title' => get_string('height','blocktype.embedly'),
                'size' => 3,
                'rules' => array(
                    'minvalue' => 100,
                    'maxvalue' => 800,
                ),
                'defaultvalue' => (!empty($configdata['height'])) ? $configdata['height'] : null,
            ),
            'align' => array(
                'type' => 'radio',
                'title' => get_string('align','blocktype.embedly'),
                'defaultvalue' => (!empty($configdata['align'])) ? $configdata['align'] : 'left',
				'options' => array(
					'left' => get_string('alignleft','blocktype.embedly'),
					'center' => get_string('aligncenter','blocktype.embedly'),
					'right' => get_string('alignright','blocktype.embedly'),
				),
				'separator' => '&nbsp;&nbsp;&nbsp;',
			),
        );
    }

    public static function instance_config_validate(Pieform $form, $values) {
        if ($values['mediaid']) {
            $urlparts = parse_url($values['mediaid']);
            if (empty($urlparts['host'])) {
                $form->set_error('mediaid', get_string('invalidurl', 'blocktype.embedly'));
            }
        }
    }

    public static function instance_config_save($values) {
        if ($values['mediaid']) {
			$values['mediaid'] = str_replace('https', 'http', $values['mediaid']);
		}
        return $values;
    }

	
    public static function default_copy_type() {
        return 'full';
    }

}

?>
