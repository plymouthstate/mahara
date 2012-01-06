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
 * @subpackage artefact-learning
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

define('INTERNAL', true);
define('MENUITEM', 'profile/mylearning');
define('SECTION_PLUGINTYPE', 'artefact');
define('SECTION_PLUGINNAME', 'learning');
define('SECTION_PAGE', 'index');

require_once(dirname(dirname(dirname(__FILE__))) . '/init.php');
define('TITLE', get_string('mylearning', 'artefact.learning'));
require_once('pieforms/pieform.php');
require_once(get_config('docroot') . 'artefact/lib.php');

$multipleintelligences = null;
$learningstyles = null;
try {
    $multipleintelligences = artefact_instance_from_type('multipleintelligences');
	$multipleintelligences_answers = unserialize($multipleintelligences->get('description'));
}
catch (Exception $e) { }
try {
    $learningstyles = artefact_instance_from_type('learningstyles');
	$learningstyles_answers = unserialize($learningstyles->get('description'));
}
catch (Exception $e) { }

function getlist_multipleintelligences() {
	static $statements;
	if (!empty($statements)) {
		return $statements;
	}
	$questions = array(
		'F1', 'C1', 'G1', 'A1', 'H1', 'E1', 'D1', 'B1',
		'A2', 'E2', 'H2', 'G2', 'C2', 'D2', 'B2', 'F2',
		'F3', 'B3', 'G3', 'H3', 'C3', 'E3', 'A3', 'D3',
		'H4', 'C4', 'A4', 'E4', 'F4', 'D4', 'B4', 'G4',
	);
	
	foreach ($questions as $q) {
		$statements[$q] = get_string("multipleintelligences.{$q}", "artefact.learning");
	}
	return $statements;
}

function getlist_learningstyles() {
	static $statements;
	if (!empty($statements)) {
		return $statements;
	}
	$questions = array(
		'A01', 'V01', 'V02', 'K01', 'A02', 'A03', 'V03', 'A04', 'K02', 'K03',
		'V04', 'K04', 'K05', 'V05', 'K06', 'K07', 'A05', 'K08', 'A06', 'V06',
		'K09', 'A07', 'K10', 'V07', 'K11', 'A08', 'A09', 'V08', 'A10', 'V09',
		'A11', 'V10', 'V11'
	);
	
	foreach ($questions as $q) {
		$statements[$q] = get_string("learningstyles.{$q}", "artefact.learning");
	}
	return $statements;
}

// Get statements for Multiple Intelligences Survey...
$items = array();
$statement_list = getlist_multipleintelligences();
foreach ($statement_list as $key => $statement) {
	$items[$key] = array(
		'type'         => 'checkbox',
		'defaultvalue' => ((!empty($multipleintelligences_answers)) ? $multipleintelligences_answers[$key] : null),
		'title'        => $statement,
	);
}
$items['submit'] = array(
	'type'  => 'submit',
	'value' => get_string('save'),
);

// Create form for Multiple Intelligences Survey...
$multipleintelligences = pieform(array(
    'name' => 'addmultipleintelligences',
	'help' => true,
    'jsform' => true,
    'plugintype' => 'artefact',
    'pluginname' => 'learning',
    'successcallback' => 'multipleintelligencesform_submit',
    'elements' => array(
        'intelligences' => array(
            'type'        => 'fieldset',
            'legend'      => get_string('multipleintelligences', 'artefact.learning'),
			'collapsible' => true,
			'collapsed'   => true,
            'elements'    => $items,
		)
	)
));


// Get statements for Learning Styles Survey...
$items = array();
$statement_list = getlist_learningstyles();
foreach ($statement_list as $key => $statement) {
	$items[$key] = array(
		'type'         => 'select',
		'defaultvalue' => ((!empty($learningstyles_answers)) ? $learningstyles_answers[$key] : null),
        'options' => array(
            '1' => get_string('never', 'artefact.learning'),
            '2' => get_string('rarely', 'artefact.learning'),
            '3' => get_string('sometimes', 'artefact.learning'),
            '4' => get_string('often', 'artefact.learning'),
            '5' => get_string('always', 'artefact.learning'),
        ),
		'title'        => $statement,
	);
}
$items['submit'] = array(
	'type'  => 'submit',
	'value' => get_string('save'),
);

// Create form for Learning Styles Survey...
$learningstyles = pieform(array(
    'name' => 'addlearningstyles',
    'jsform' => true,
    'plugintype' => 'artefact',
    'pluginname' => 'learning',
    'successcallback' => 'learningstylesform_submit',
    'elements' => array(
        'styles' => array(
            'type'        => 'fieldset',
            'legend'      => get_string('learningstyles', 'artefact.learning'),
			'collapsible' => true,
			'collapsed'   => true,
            'elements'    => $items,
		)
	)
));


$smarty = smarty();
$smarty->assign('multipleintelligences',$multipleintelligences);
$smarty->assign('learningstyles',$learningstyles);
$smarty->assign('PAGEHEADING', get_string('mylearning', 'artefact.learning'));
$smarty->display('artefact:learning:index.tpl');

?>
