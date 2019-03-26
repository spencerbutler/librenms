<?php
/**
 * dell-net.inc.php
 *
 * LibreNMS os poller module for Dell-Networking
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

$mem_data = snmpwalk_cache_oid($device, 'dellNetCpuUtilTable', [], 'DELL-NETWORKING-CHASSIS-MIB', 'dell', '-OUseQ');
$mem_data = snmpwalk_cache_oid($device, 'DellNetProcessorEntry', $mem_data, 'DELL-NETWORKING-CHASSIS-MIB', 'dell', '-OUseQ');

if (is_array($mem_data)) {
    foreach ($mem_data as $index => $data) {
        $size = $data['dellNetProcessorMemSize'];

        if (preg_match('/stack/', $index) && isset($size)) {
            $units            = 1024*1024;
            $perc             = $data['dellNetCpuUtilMemUsage'];
            $total            = $data['dellNetProcessorMemSize']*$units;
            $mempool['total'] = $total;
            $mempool['used']  = $perc/100 * $total;
            $mempool['free']  = $total - $total/$perc;
        }
    }
}
unset($mem_data);
