<?php

$version  = trim(snmp_get($device, '.1.3.6.1.4.1.39165.1.3.0', '-OQv', 'HIK-DEVICE-MIB'), '"');
$hardware = trim(snmp_get($device, '.1.3.6.1.4.1.39165.1.1.0', '-OQv', 'HIK-DEVICE-MIB'), '"');
$features = trim(snmp_get($device, '.1.3.6.1.4.1.39165.1.21.0', '-OQv', 'HIK-DEVICE-MIB'), '"');
$features .= '-' . trim(snmp_get($device, '.1.3.6.1.4.1.39165.1.22.0', '-OQv', 'HIK-DEVICE-MIB'), '"');

