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
 * @subpackage admin
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2009 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

define('INTERNAL', 1);
define('ADMIN', 1);
define('INSTALLER', 1);
define('JSON', 1);

require(dirname(dirname(__FILE__)) . '/init.php');
require(get_config('libroot') . 'upgrade.php');
require(get_config('docroot') . 'local/install.php');

$name    = param_variable('name');
$install = ($name == 'firstcoredata' || $name == 'lastcoredata' || $name == 'localpreinst' || $name == 'localpostinst');
if (!$install) {
    $upgrade = check_upgrades($name);
    
    if (empty($upgrade->disablelogin)) {
        auth_setup();
    }
}

$data = array(
    'key'        => $name
);             
if ($install) {
    if (!get_config('installed')) {
        if ($name == 'localpreinst' || $name == 'localpostinst') {
            $fun = $name;
            $data['localdata'] = true;
        }
        else {
            $fun = 'core_install_' . $name . '_defaults';
            $data['coredata'] = true;
        }
        try {
            $fun();
        }
        catch (SQLException $e) {
            json_reply('local', array('error' => true, 'key' => $name, 'errormessage' => $e->getMessage()));
        }
        if ($name == 'localpostinst') {
            // Update local version
            $config = new StdClass;
            require(get_config('docroot') . 'local/version.php');
            set_config('localversion', $config->version);
            set_config('localrelease', $config->release);

            // Installation is finished
            set_config('installed', true);
            $USER->login('admin', 'mahara');
        }
    }
    json_reply(false, $data);
}

if (!empty($upgrade)) {
    $data['newversion'] = $upgrade->torelease . ' (' . $upgrade->to . ')' ;
    if ($name == 'core') {
        $funname = 'upgrade_core';
    } 
    else if ($name == 'local') {
        $funname = 'upgrade_local';
    }
    else {
        $funname = 'upgrade_plugin';
    }
    try {
        $funname($upgrade);
        if (isset($upgrade->install)) {
            $data['install'] = $upgrade->install;
        }
        $data['error'] = false;
        json_reply(false, $data);
        exit;
    } 
    catch (Exception $e) {
        list($texttrace, $htmltrace) = log_build_backtrace($e->getTrace());
        $data['errormessage'] = $e->getMessage() . '<br>' . $htmltrace;
        $data['error'] = true;
        json_reply('local', $data);
        exit;
    }
}
else {
    json_reply(false, array('error' => false,
                            'message' => get_string('nothingtoupgrade','admin')));
    exit;
}
?>
