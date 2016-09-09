<?php

require_once dirname(__FILE__) . '/../class/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("10.0.0.9", "UDP");

// Data to be writen
$data = array(TRUE, FALSE, TRUE, TRUE, FALSE, TRUE, TRUE, TRUE, 
              TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE,
              FALSE, FALSE, FALSE, FALSE, TRUE, TRUE, TRUE, TRUE,
              TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE);

try {
    // FC15
    $modbus->writeMultipleCoils(0, 1, $data);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

// Print status information
echo $modbus;
