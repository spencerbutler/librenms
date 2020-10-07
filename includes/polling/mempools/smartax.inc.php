<?php
/**
 * smartax.inc.php
 *
 * LibreNMS mempool poller module for Huawei SmartAX
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link       http://librenms.org
 * @copyright  2018 TheGreatDoc
 * @author     TheGreatDoc <doctoruve@gmail.com>
 */
$oid = '.1.3.6.1.4.1.2011.2.6.7.1.1.2.1.6.' . $mempool['mempool_index'];
$used = snmp_get($device, $oid, '-OvQ');
$mempool['total'] = 100;
$mempool['free'] = ($mempool['total'] - $used);
$mempool['used'] = $used;
unset(
    $oid,
    $used
);
