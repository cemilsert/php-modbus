<?php

require_once dirname(__FILE__) . '/../class/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("10.0.0.9", "UDP");

// Data to be writen
$data = array(10, -1000, 2000, 3.0);
$dataTypes = array("WORD", "INT", "DINT", "REAL");

try {
    // FC16
    $modbus->writeMultipleRegister(0, 12288, $data, $dataTypes);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

// Print status information
echo $modbus;

?>