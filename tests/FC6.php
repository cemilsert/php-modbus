<?php

require_once dirname(__FILE__) . '/../Phpmodbus/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("10.0.0.9", "UDP");

// Data to be writen
$data = array(0);
$dataTypes = array("Bool");

try {
    // FC6
    $modbus->writeSingleRegister(0, 2, "0", "Bool");
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