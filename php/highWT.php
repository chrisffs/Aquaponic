<div>
<?php 
include "conn.php";
$sql = mysqli_query($conn, "SELECT MAX(watertemp) as watertemp FROM `waterreporttbl` WHERE DATE LIKE CURRENT_DATE");
while($row = mysqli_fetch_array($sql)) {
?>
    <h1 class="font-inter font-semibold text-2xl"><?php echo $row["watertemp"] ?>°C</h1>
<?php
}
?>
    <div class="flex">
        <h4 class="font-semibold text-sm">Today</h4>
        <div class="ml-1 flex items-center">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66664 11.3333H5.3333V3.33335L1.66664 7.00001L0.719971 6.05335L5.99997 0.773346L11.28 6.05335L10.3333 7.00001L6.66664 3.33335V11.3333Z" fill="#4ECB71"/>
            </svg>
        </div>
    </div>
</div>
<div>
<?php 
$sql1 = mysqli_query($conn, "SELECT MAX(watertemp) as watertemp FROM `waterreporttbl` WHERE MONTH(DATE) LIKE MONTH(CURRENT_DATE)");
while($row = mysqli_fetch_array($sql1)) {
?>
    <h1 class="font-inter font-semibold text-2xl"><?php echo $row["watertemp"] ?>°C</h1>
<?php
}
?>
    <div class="flex">
        <h4 class="font-semibold text-sm">This Month</h4>
        <div class="ml-1 flex items-center">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66664 11.3333H5.3333V3.33335L1.66664 7.00001L0.719971 6.05335L5.99997 0.773346L11.28 6.05335L10.3333 7.00001L6.66664 3.33335V11.3333Z" fill="#4ECB71"/>
            </svg>
        </div>
    </div>
</div>