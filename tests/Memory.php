<?php

require_once dirname(__FILE__) . '/../class/ModbusMaster.php';

// Create Modbus object
$ip = "10.0.0.9";
$modbus = new ModbusMaster($ip, "TCP");

try {
    // FC 3
    $moduleId = 50;
    $reference = 0;
    $mw0address = 4;
    $quantity = 5;
    $recData = $modbus->readMultipleRegisters($moduleId, $reference, $quantity);
}
catch (Exception $e) {
    echo $modbus;
    echo $e;
    exit;
}

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=windows-1250">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <title>WAGO 750-841 M-memory dump</title>
    </head>
    <body>
        <h1>Dump of M-memory</h1>
        <ul>
            <li>PLC</li>
            <li>IP: <?php echo $ip?></li>
            <li>Modbus module ID: <?php echo $moduleId?></li>
            <li>Modbus memory reference: <?php echo $reference?></li>
            <li>Modbus memory quantity: <?php echo $quantity?></li>
        </ul>

        <h2>M-memory dump</h2>

        <table border="1px" width="400px">
            <tr>
                <td>Modbus address</td>
                <td>MWx</td>
                <td>value</td>
            </tr>
            <?php
            for($i=0;$i<count($recData);$i+=2) {
                ?>
            <tr>
                <td><?php echo $i+$reference?></td>
                <td>MW<?php echo ($i + $reference - $mw0address)/2?></td>
                <td><?php echo ($recData[$i] << 8)+ $recData[$i+1]?></td>
            </tr>
                <?php
            }
            ?>
        </table>

        <h2>Modbus class status</h2>
        <?php
        echo $modbus;
        ?>

    </body>
</html>
