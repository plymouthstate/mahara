<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2008 Catalyst IT Ltd (http://www.catalyst.net.nz)
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
 * @subpackage blocktype-html
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2008 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeHtml extends PluginBlocktype {

    public static function get_title() {
        return get_string('title', 'blocktype.file/html');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.file/html');
    }

    public static function get_categories() {
        return array('fileimagevideo');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $configdata = $instance->get('configdata'); // this will make sure to unserialize it for us
        $configdata['viewid'] = $instance->get('view');

        $result = '';
        if (isset($configdata['artefactid'])) {
            $html = $instance->get_artefact_instance($configdata['artefactid']);

            if (!file_exists($html->get_path())) {
                return;
            }

            $result = clean_text(file_get_contents($html->get_path()));
        }

        return $result;
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance) {
        $configdata = $instance->get('configdata');
        return array(
            self::artefactchooser_element((isset($configdata['artefactid'])) ? $configdata['artefactid'] : null),
        );
    }

    private static function get_allowed_extensions() {
        return array('html', 'htm');
    }

    public static function artefactchooser_element($default=null) {
        $extraselect = '(' . implode(' OR ', array_map(
            create_function('$a', 'return "title LIKE \'%.$a\'";'),
            self::get_allowed_extensions())
        ) . ')';
        return array(
            'name'  => 'artefactid',
            'type'  => 'artefactchooser',
            'title' => get_string('file', 'artefact.file'),
            'defaultvalue' => $default,
            'rules' => array(
                'required' => true,
            ),
            'blocktype' => 'html',
            'limit' => 10,
            'artefacttypes' => array('file'),
            'template' => 'artefact:file:artefactchooser-element.tpl',
            'extraselect' => $extraselect,
        );
    }

    public static function get_viewtypes() {
        return array('portfolio', 'profile');
    }

}

?>