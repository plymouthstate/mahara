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
 * @subpackage blocktype-multipleintelligences
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeMultipleIntelligences extends PluginBlocktype {

    public static function get_title() {
        return get_string('title', 'blocktype.learning/multipleintelligences');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.learning/multipleintelligences');
    }

    public static function single_only() {
        return true;
    }

    public static function get_categories() {
        return array('internal');
    }

    public static function get_viewtypes() {
        return array('portfolio', 'profile');
    }

    public static function render_instance(BlockInstance $instance, $editing=false) {
        $smarty = smarty_core();
        $configdata = $instance->get('configdata');
		$artefacttype = $instance->get('blocktype');

		// Get multiple inteligences for the owner of current view
		$artefacts = get_records_sql_array('
			SELECT id
			FROM {artefact}
			WHERE artefacttype = \'' . $artefacttype . '\'
			AND owner = (
				SELECT owner
				FROM {view}
				WHERE id = ?
			)', array($instance->get('view')));

        $smarty->assign('MULTIPLEINTELLIGENCES', $artefacts);
        $smarty->assign('color', (!empty($configdata['color']) ? $configdata['color'] : '#95BFD8'));
        $smarty->assign('legend', (!empty($configdata['legend']) ? $configdata['legend'] : 'A,B,C,D,E,F,G,H'));
        $smarty->assign('values', (!empty($configdata['values']) ? $configdata['values'] : '0,0,0,0,0,0,0,0'));
		$smarty->assign('date', (!empty($configdata['date']) ? strftime(get_string('strftimedate'), strtotime($configdata['date'])) : strftime(get_string('strftimedate'), strtotime(time()))));
        return $smarty->fetch('blocktype:multipleintelligences:content.tpl');
    }

    public static function has_instance_config() {
        return true;
    }

    public static function instance_config_form($instance, $istemplate) {
		//log_debug($userid);

        if ($istemplate) {
            // Don't offer any configuration. Profile data needs to be reworked 
            // so it's not artefacts before this will work
            return array();
        }
        $configdata = $instance->get('configdata');
		$artefacttype = $instance->get('blocktype');

		// Get multiple inteligences for the owner of current view
		$artefacts = get_records_sql_array('
			SELECT id, description
			FROM {artefact}
			WHERE artefacttype = \'' . $artefacttype . '\'
			AND owner = (
				SELECT owner
				FROM {view}
				WHERE id = ?
			)', array($instance->get('view')));

		if ($artefacts) {
			foreach ($artefacts as $artefact) {
				$artefactid = $artefact->id;
				$surveyanswers = unserialize($artefact->description);
			}
		}
		
		// Get multiple intelligences survey values to correctly draw graph...
		$graphvalues = array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0,'F' => 0,'G' => 0,'H' => 0);
		foreach ($surveyanswers as $key => $value) {
			if ($value == 1) $graphvalues[$key[0]]++;
		}
		
		$drawvalues = implode(",", $graphvalues);
		$drawdate = strftime("%Y-%m-%d", time());
		
        if ($artefacts) {
			$form = array(
				'color' => array(
					'type' => 'text',
					'title' => get_string('graphcolor', 'blocktype.learning/multipleintelligences'),
					'defaultvalue' => (!empty($configdata['color']) ? $configdata['color'] : '#95BFD8'),
				),
				'legend' => array(
					'type' => 'radio',
					'title' => get_string('graphlegend', 'blocktype.learning/multipleintelligences'),
					'options' => array(
						'A,B,C,D,E,F,G,H' => get_string('arabiclegend', 'blocktype.learning/multipleintelligences'),
						'1,2,3,4,5,6,7,8' => get_string('numericlegend', 'blocktype.learning/multipleintelligences'),
					),
					'defaultvalue' => (!empty($configdata['legend']) ? $configdata['legend'] : 'A,B,C,D,E,F,G,H'),
					'separator' => '<br>',
				),
				'values' => array(
					'type' => 'hidden',
					'value' => $drawvalues,
				),
				'date' => array(
					'type' => 'hidden',
					'value' => $drawdate,
				),
				'artefactids' => array(
					'type' => 'hidden',
					'value' => $artefactid,
				),
			);
		}
		// IF user has not completed his/her multiple intelligences survey yet...
		else {
			$form = array(
				'message' => array(
					'type' => 'html',
					'value' => get_string('filloutsurvey', 'blocktype.learning/multipleintelligences', '<a href="' . get_config('wwwroot') . 'artefact/learning/">', '</a>'),
				),
			);
		}
		return $form;
    }

    public static function instance_config_save($values) {
        unset($values['message']);
        return $values;
    }

    // TODO: make decision on whether this should be abstract or not
    public static function artefactchooser_element($default=null, $istemplate=false) {
		//
	}

    public static function default_copy_type() {
        return 'shallow';
    }

    /**
     * Multiple intelligences blocktype is only allowed in personal views, because 
     * there's no such thing as group/site multiple intelligences
     */
    public static function allowed_in_view(View $view) {
        return $view->get('owner') != null;
    }

}

?>
