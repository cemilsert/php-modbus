<?php

require_once dirname(__FILE__) . '/../class/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("10.0.0.9", "TCP");

// Data to be writen - TRUE, FALSE
$data_true = array(TRUE);
$data_false = array(FALSE);

try {
    // Write single coil - FC5
    $modbus->writeSingleCoil(2, 1, $data_false);
    $modbus->writeSingleCoil(2, 1, $data_false);

}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}
