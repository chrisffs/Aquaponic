<?php
include "../php/conn.php";

  //Get current date and time
date_default_timezone_set('Asia/Manila');
$d = date("Y-m-d");
$t = date("H:i:s");

if (!empty($_POST['signal'])) {
    $signal_strength = $_POST["signal"];
    $sql = "INSERT INTO `signal_tbl`(`signal`, `date`, `time`) VALUES ('".$signal_strength."', '".$d."', '".$t."')";
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (!empty($_POST['watertemp'])) {
    $waterTemp = $_POST["watertemp"];
    $sql = "INSERT INTO waterreporttbl (watertemp, date, time) VALUES ('".$waterTemp."', '".$d."', '".$t."')";

    if ($conn->query($sql) === TRUE) {
        echo "OK";
        $conn->query("UPDATE `waterreporttbl` set status = 'COLD' WHERE `watertemp` BETWEEN 0.00 and 19.49");

        $conn->query("UPDATE `waterreporttbl` set status = 'NORMAL' WHERE `watertemp` BETWEEN 19.50 and 32.10");

        $conn->query("UPDATE `waterreporttbl` set status = 'HOT' WHERE `watertemp` BETWEEN 32.11 and 100.00");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (!empty($_POST['phvalue'])) {
    $PHTemp = $_POST["phvalue"];
    $sql = "INSERT INTO phreport_tbl (phvalue, date, time) VALUES ('".$PHTemp."', '".$d."', '".$t."')";


    if ($conn->query($sql) === TRUE) {
        echo "OK";
        $conn->query("UPDATE `phreport_tbl` set dbstatus = 'ACIDIC',`diagnosis` = 'Change Water!', sensor = 'PH' WHERE `phvalue` BETWEEN 0.00 and 5.99");

        $conn->query("UPDATE `phreport_tbl` set  dbstatus = 'NEUTRAL',`diagnosis` = 'Nothing', sensor = 'PH' WHERE `phvalue` BETWEEN 6.00 and 8.99 ");
        
        $conn->query("UPDATE `phreport_tbl` set  dbstatus = 'ALKALINE',`diagnosis` = 'Change Water!', sensor = 'PH' WHERE `phvalue` BETWEEN 9.00 and 14.00");

        $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Acid Death Point' WHERE `phvalue` BETWEEN 0.00 and 3.99 ");

        $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'No Reproduction & Slow Growth' WHERE `phvalue` BETWEEN 4.00 and 6.49 ");

        $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Desirable Range of pH' WHERE `phvalue` BETWEEN 6.50  and 8.99 ");

        $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'No Reproduction & Slow Growth' WHERE `phvalue` BETWEEN 9.00 and 10.99");

        $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Alkaline Death Point' WHERE `phvalue` BETWEEN 11.00 and 14.00");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>