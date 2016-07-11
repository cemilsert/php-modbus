<?php

require_once dirname(__FILE__) . '/../class/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("10.0.0.9", "TCP");

try {
    // FC 1
    $recData = $modbus->readCoils(0, 0, 7);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

// Print status information
echo "</br>Status:</br>" . $modbus;

// Print read data
echo "</br>Data:</br>";
var_dump($recData); 
echo "</br>";