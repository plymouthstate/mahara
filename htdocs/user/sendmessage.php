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
 * @subpackage core
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2009 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

define('INTERNAL', 1);
define('MENUITEM', 'inbox');
require(dirname(dirname(__FILE__)) . '/init.php');
require_once('pieforms/pieform.php');
require_once('searchlib.php');
safe_require('search', 'internal');

$id = param_integer('id');
$replytoid = param_integer('replyto', null);
$messages = null;

if (!is_null($replytoid)) {
    // Let us validate what we are going to reply first. The message should exist,
    // addressed to us and originated from user we are replying to.
    $message = get_record('notification_internal_activity', 'id', $replytoid, 'usr', $USER->get('id'), 'from', $id);
    if (!$message) {
        throw new AccessDeniedException(get_string('cantviewmessage', 'group'));
    }
    // OK, now it safe to fetch the whole thread.
    $messages = get_message_thread($replytoid);
}

$returnto = param_alpha('returnto', 'myfriends');

$user = get_record('usr', 'id', $id, 'deleted', 0);

if (!$user || !can_send_message($USER->to_stdclass(), $id)) {
	throw new AccessDeniedException(get_string('cantmessageuser', 'group'));
}

define('TITLE', get_string('sendmessageto', 'group', display_name($user)));

$form = pieform(array(
    'name' => 'sendmessage',
    'autofocus' => false,
    'elements' => array(
        'message' => array(
            'type'  => 'textarea',
            'title' => $messages ? get_string('Reply', 'group') : get_string('message'),
            'cols'  => 80,
            'rows'  => 10,
        ),
        'submit' => array(
            'type' => 'submitcancel',
            'value' => array($messages ? get_string('Reply', 'group') : get_string('sendmessage', 'group'), get_string('cancel')),
            'goto' => get_config('wwwroot') . ($returnto == 'find' ? 'user/find.php' : ($returnto == 'view' ? 'user/view.php?id=' . $id : 'user/myfriends.php')),
        )
    )
));

$smarty = smarty();
$smarty->assign('PAGEHEADING', TITLE);
$smarty->assign('form', $form);
$smarty->assign('user', $user);
$smarty->assign('messages', $messages);
$smarty->display('user/sendmessage.tpl');

function sendmessage_submit(Pieform $form, $values) {
    global $USER, $SESSION, $id;
    $user = get_record('usr', 'id', $id);
    send_user_message($user, $values['message'], param_integer('replyto', null));
    $SESSION->add_ok_msg(get_string('messagesent', 'group'));
    switch (param_alpha('returnto', 'myfriends')) {
        case 'find':
            redirect('/user/find.php');
            break;
        case 'view':
            redirect('/user/view.php?id=' . $id);
            break;
        case 'inbox':
            redirect('/account/activity');
            break;
        default:
            redirect('/user/myfriends.php');
            break;
    }
}
