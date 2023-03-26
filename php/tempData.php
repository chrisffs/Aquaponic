<?php
include "conn.php";

header('Content-Type: application/json');

require_once('conn.php');

$sqlQuery = "SELECT watertemp, date, status FROM waterreporttbl WHERE DATE LIKE CURRENT_DATE ORDER BY time desc LIMIT 1";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>