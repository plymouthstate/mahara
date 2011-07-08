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
 * Checks whether the given value is shorter than the allowed length.
 *
 * @param PieForm $form      The form the rule is being applied to
 * @param string  $value     The value to check
 * @param array   $element   The element to check
 * @param int     $minlength The length to check for
 * @return string            The error message, if the value is invalid.
 */
function pieform_rule_minlength(Pieform $form, $value, $element, $minlength) {/*{{{*/
    if (strlen($value) < $minlength) {
        return sprintf($form->i18n('rule', 'minlength', 'minlength', $element), $minlength);
    }
}/*}}}*/

function pieform_rule_minlength_i18n() {/*{{{*/
    return array(
        'en.utf8' => array(
            'minlength' => 'This field must be at least %d characters long', 
        ),
        'de.utf8' => array(
            'minlength' => 'Das Feld muss zumindest %d Zeichen lang sein',
        ),
        'fr.utf8' => array(
            'minlength' => 'Ce champ doit contenir au moins %d caractères',
        ),
        'es.utf8' => array(
            'minlength' => 'Este campo debe tener como mínimo %d caracteres', 
        ),
        'sl.utf8' => array(
            'minlength' => 'To polje mora biti dolgo vsaj %d znakov',
        ),
        'nl.utf8' => array(
            'minlength' => 'Dit veld moet minstens %d tekens lang zijn',
        ),
        'cs.utf8' => array(
            'minlength' => 'Musíte zadat nejméně %d znaků',
        ),

    );
}/*}}}*/

?>
