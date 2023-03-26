<?php
include "conn.php";
$table = mysqli_query($conn, "SELECT * FROM phreport_tbl WHERE DATE LIKE CURRENT_DATE ORDER BY time desc LIMIT 1");
while($row = mysqli_fetch_array($table)) {
    echo $row["phvalue"]; 
}
?>