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
 * @subpackage blocktype-learningstyles
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

class PluginBlocktypeLearningStyles extends PluginBlocktype {

    public static function get_title() {
        return get_string('title', 'blocktype.learning/learningstyles');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.learning/learningstyles');
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

		$smarty->assign('LEARNINGSTYLES', $artefacts);
        $smarty->assign('color1', (!empty($configdata['color1']) ? $configdata['color1'] : '#BECB94'));
        $smarty->assign('color2', (!empty($configdata['color2']) ? $configdata['color2'] : '#95BFD8'));
        $smarty->assign('color3', (!empty($configdata['color3']) ? $configdata['color3'] : '#D99191'));
        $smarty->assign('legend', (!empty($configdata['legend']) ? $configdata['legend'] : 'V,A,K'));
        $smarty->assign('values', (!empty($configdata['values']) ? $configdata['values'] : '0,0,0'));
		$smarty->assign('date', (!empty($configdata['date']) ? strftime(get_string('strftimedate'), strtotime($configdata['date'])) : strftime(get_string('strftimedate'), strtotime(time()))));
        return $smarty->fetch('blocktype:learningstyles:content.tpl');
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
		$graphvalues = array('V' => 0,'A' => 0,'K' => 0);
		foreach ($surveyanswers as $key => $value) {
			if (is_numeric($value) and $value >= 1 and $value <= 5) $graphvalues[$key[0]] = $graphvalues[$key[0]] + $value;
		}
		
		$angleA = round($graphvalues['V']*360/array_sum($graphvalues));
		$angleB = round($graphvalues['A']*360/array_sum($graphvalues));
		$angleC = round($graphvalues['K']*360/array_sum($graphvalues));
		if ($angleA+$angleB+$angleC > 360) {
			if ($angleA > $angleB and $angleA > $angleC) $angleA--;
			if ($angleB > $angleA and $angleB > $angleC) $angleB--;
			if ($angleC > $angleA and $angleC > $angleB) $angleC--;
		}
		
		$drawvalues = strval($angleA).','.strval($angleB).','.strval($angleC);
		$drawdate = strftime("%Y-%m-%d", time());
		
        if ($artefacts) {
			$form = array(
				'color1' => array(
					'type' => 'text',
					'title' => get_string('piechartcolor1', 'blocktype.learning/learningstyles'),
					'defaultvalue' => (!empty($configdata['color1']) ? $configdata['color1'] : '#BECB94'),
				),
				'color2' => array(
					'type' => 'text',
					'title' => get_string('piechartcolor2', 'blocktype.learning/learningstyles'),
					'defaultvalue' => (!empty($configdata['color2']) ? $configdata['color2'] : '#95BFD8'),
				),
				'color3' => array(
					'type' => 'text',
					'title' => get_string('piechartcolor3', 'blocktype.learning/learningstyles'),
					'defaultvalue' => (!empty($configdata['color3']) ? $configdata['color3'] : '#D99191'),
				),
				'legend' => array(
					'type' => 'radio',
					'title' => get_string('piechartlegend', 'blocktype.learning/learningstyles'),
					'options' => array(
						'V,A,K' => get_string('arabiclegend', 'blocktype.learning/learningstyles'),
						'1,2,3' => get_string('numericlegend', 'blocktype.learning/learningstyles'),
					),
					'defaultvalue' => (!empty($configdata['legend']) ? $configdata['legend'] : 'V,A,K'),
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
					'value' => get_string('filloutsurvey', 'blocktype.learning/learningstyles', '<a href="' . get_config('wwwroot') . 'artefact/learning/">', '</a>'),
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
