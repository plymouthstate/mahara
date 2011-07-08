<?php
/**
 * Pieforms: Advanced web forms made easy
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
 * @package    pieform
 * @subpackage rule
 * @author     Nigel McNie <nigel@catalyst.net.nz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2008 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

/**
 * Makes sure that the submitted value is specified in the 'options' index of
 * the element. This prevents malicious people from doing things like
 * submitting values that aren't in a select box.
 *
 * @param Pieform $form      The form the rule is being applied to
 * @param string  $field     The field to check
 * @param string  $element   The element being checked
 * @return string            The error message, if the value is invalid.
 */
function pieform_rule_validateoptions(Pieform $form, $field, $element) {/*{{{*/
    // Get the value into an array as a key if it's a scalar, since
    // the actual check involves array keys
    $field = (array) $field;

    $allowedvalues = array_keys($element['options']);
    foreach ($field as $key) {
        if (!in_array($key, $allowedvalues)) {
            return sprintf($form->i18n('rule', 'validateoptions', 'validateoptions', $element), $key);
        }
    }
}/*}}}*/

function pieform_rule_validateoptions_i18n() {/*{{{*/
    return array(
        'en.utf8' => array(
            'validateoptions' => 'The option "%s" is invalid'
        ),
        'de.utf8' => array(
            'validateoptions' => 'Die Option "%s" ist ungültig'
        ),
        'fr.utf8' => array(
            'validateoptions' => 'Cette option "%s" n\'est pas valide'
        ),
        'ja.utf8' => array(
            'validateoptions' => 'オプション「 %s 」が正しくありません'
        ),
        'es.utf8' => array(
            'validateoptions' => 'La opción "%s" no es válida'
        ),
        'sl.utf8' => array(
            'validateoptions' => 'Možnost "%s" je neveljavna'
        ),
        'nl.utf8' => array(
            'validateoptions' => 'De optie "%s" is niet geldig'
        ),
        'cs.utf8' => array(
            'validateoptions' => 'Neplatný výběr "%s"'
        ),

    );
}/*}}}*/

?>
