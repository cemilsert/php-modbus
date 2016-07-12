<?php

require_once dirname(__FILE__) . '/../../class/ModbusMasterUdp.php';

// Create Modbus object
$modbus = new ModbusMasterUdp("10.0.0.9");

try {
    // Read input discretes - FC 4
    $recData = $modbus->readMultipleInputRegisters(0, 0, 2);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

var_dump($recData);