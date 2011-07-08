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
 * Returns whether the given field is a valid e-mail address.
 *
 * Currently, the check is [anything]@[anything]. Someone is welcome to write
 * something better, this was made just for testing.
 *
 * @param Pieform $form    The form the rule is being applied to
 * @param string  $value   The e-mail address to check
 * @param array   $element The element to check
 * @return string          The error message, if there is something wrong with
 *                         the address.
 */
function pieform_rule_email(Pieform $form, $value, $element) {/*{{{*/
    if (!preg_match('/^[A-Za-z0-9+\._%-]+@(?:[A-Za-z0-9-]+\.)+[a-z]{2,4}$/', $value)) {
        return $form->i18n('rule', 'email', 'email', $element);
    }
}/*}}}*/

function pieform_rule_email_i18n() {/*{{{*/
    return array(
        'en.utf8' => array(
            'email' => 'E-mail address is invalid'
        ),
        'de.utf8' => array(
            'email' => 'Die E-Mail Addresse ist ungültig'
        ),
        'fr.utf8' => array(
            'email' => 'Cette adresse de courriel n\'est pas valide'
        ),
        'ja.utf8' => array(
            'email' => 'メールアドレスが有効ではありません'
        ),
        'es.utf8' => array(
            'email' => 'Dirección de correo errónea'
        ),
        'sl.utf8' => array(
            'email' => 'Epoštni naslov je neveljaven'
        ),
        'nl.utf8' => array(
            'email' => 'E-mailadres is ongeldig'
        ),
        'cs.utf8' => array(
            'email' => 'Neplatná e-mailová adresa'
        ),

    );
}/*}}}*/

?>
