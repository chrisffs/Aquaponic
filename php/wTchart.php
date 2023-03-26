<?php 
include "conn.php";

header('Content-Type: application/json');

require_once('conn.php');

$sqlQuery = "SELECT WEEKDAY(waterreporttbl.date) AS weekday, date, ROUND(AVG(waterreporttbl.watertemp), 2) AS watertempAve FROM waterreporttbl GROUP BY waterreporttbl.date ORDER BY waterreporttbl.date LIMIT 7";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
