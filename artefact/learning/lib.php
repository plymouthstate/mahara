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

defined('INTERNAL') || die();

class PluginArtefactLearning extends Plugin {
    
    public static function get_artefact_types() {
        return array(
            'multipleintelligences', 
            'learningstyles'
        );
    }
    
    public static function get_block_types() {
        return array(); 
    }

    public static function get_plugin_name() {
        return 'learning';
    }

    public static function menu_items() {
        return array(
            array(
                'path' => 'profile/mylearning',
                'title' => get_string('mylearning', 'artefact.learning'),
                'url' => 'artefact/learning/',
                'weight' => 20,
            )
        );
    }

}

class ArtefactTypeLearning extends ArtefactType {

    public static function get_icon($options=null) {}

    public function __construct($id=0, $data=array()) {
        if (empty($id)) {
            $data['title'] = get_string($this->get_artefact_type(), 'artefact.learning');
        }
        parent::__construct($id, $data);
    }
    
    public static function is_singular() {
        return false;
    }

    public static function format_child_data($artefact, $pluginname) {
        $a = new StdClass;
        $a->id         = $artefact->id;
        $a->isartefact = true;
        $a->title      = '';
        $a->text       = get_string($artefact->artefacttype, 'artefact.learning'); // $artefact->title;
        $a->container  = (bool) $artefact->container;
        $a->parent     = $artefact->id;
        return $a;
    }

    public static function get_links($id) {
        // @todo Catalyst IT Ltd
    }

    public function render_self($options) {
        //
    }
}


class ArtefactTypeLearningIntelligencesAndStyles extends ArtefactTypeLearning {

    public static function is_singular() {
        return true;
    }

    public static function get_intelligencesandstyles_artefact_types() {
        return array('multipleintelligences', 'learningstyles');
    }

}

class ArtefactTypeMultipleIntelligences extends ArtefactTypeLearningIntelligencesAndStyles { }
class ArtefactTypeLearningStyles extends ArtefactTypeLearningIntelligencesAndStyles { }


function multipleintelligencesform_submit(Pieform $form, $values) {
    try {
        $a = artefact_instance_from_type('multipleintelligences');
        $a->set('description', serialize($values));
    }
    catch (Exception $e) {
        global $USER;
        $classname = generate_artefact_class_name('multipleintelligences');
        $a = new $classname(0, array(
            'owner' => $USER->get('id'),
            'title' => get_string('multipleintelligences', 'artefact.learning'),
            'description' => serialize($values),
        )); 
    }
    $a->commit();
    $form->json_reply(PIEFORM_OK, get_string('learningsaved', 'artefact.learning'));
}   

function learningstylesform_submit(Pieform $form, $values) {
    try {
        $a = artefact_instance_from_type('learningstyles');
        $a->set('description', serialize($values));
    }
    catch (Exception $e) {
        global $USER;
        $classname = generate_artefact_class_name('learningstyles');
        $a = new $classname(0, array(
            'owner' => $USER->get('id'),
            'title' => get_string('learningstyles', 'artefact.learning'),
            'description' => serialize($values),
        )); 
    }
    $a->commit();
    $form->json_reply(PIEFORM_OK, get_string('learningsaved', 'artefact.learning'));
}   

?>
