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
define('JSON', 1);
require(dirname(dirname(dirname(__FILE__))) . '/init.php');

$result = get_records_sql_array('SELECT a.id, a.title, a.note, (u.profileicon = a.id) AS isdefault
    FROM {artefact} a
    LEFT OUTER JOIN {usr} u
    ON (u.id = a.owner)
    WHERE artefacttype = \'profileicon\'
    AND a.owner = ?
    ORDER BY a.id', array($USER->get('id')));

if(!$result) {
    $result = array();
}

json_headers();
$data['error'] = false;
$data['data'] = $result;
$data['count'] = ($result) ? count($result) : 0;
echo json_encode($data);
