<?php
/**
 * hikvision-ds.inc.php
 *
 * LibreNMS storage discovery module for hikvision-ds
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
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2019 Spencer Butler
 * @author     Spencer Butler <github@crooked.app>
 */

if ($device['os'] === 'hikvision-ds') {
    echo 'hikvision-ds:';

    $size = snmp_get($device, '.1.3.6.1.4.1.39165.1.8.0', '-Ovq');
    $used = snmp_get($device, '.1.3.6.1.4.1.39165.1.9.0', '-Ovq');
    $descr = 'Storage';
    $fstype = 'Generic';
    $index = 0;
    discover_storage($valid_storage, $device, $index, $fstype, 'generic-storage', $descr, $size, null, $used);
}
