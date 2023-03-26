<?php 
include "conn.php";

header('Content-Type: application/json');

require_once('conn.php');

$sqlQuery = "SELECT WEEKDAY(phreport_tbl.date) AS weekday, date, ROUND(AVG(phreport_tbl.phvalue), 2) AS phvalueAve FROM phreport_tbl GROUP BY phreport_tbl.date ORDER BY phreport_tbl.date LIMIT 7";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
