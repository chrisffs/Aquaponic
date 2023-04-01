<?php
include "conn.php";
$table = mysqli_query($conn, "SELECT * FROM signal_tbl WHERE DATE LIKE CURRENT_DATE ORDER BY time desc LIMIT 1");
while($row = mysqli_fetch_array($table)) {
?>
<div class="flex items-baseline">
    <div class="h-[0.25rem] w-[.30rem] <?php if($row["signal"] > 5) echo 'bg-[#4ECB71]'; if($row["signal"] < 5) echo 'bg-[#D9D9D9]'?> mx-[1.5px]"></div>
    <div class="h-[0.5rem] w-[.30rem] <?php if($row["signal"] > 35) echo 'bg-[#4ECB71]'; if($row["signal"] < 35) echo 'bg-[#D9D9D9]'?> mx-[1.5px]"></div>
    <div class="h-[.75rem] w-[.30rem] <?php if($row["signal"] > 65) echo 'bg-[#4ECB71]'; if($row["signal"] < 65) echo 'bg-[#D9D9D9]'?> mx-[1.5px]"></div>
    <div class="h-[1rem] w-[.30rem] <?php if($row["signal"] > 75) echo 'bg-[#4ECB71]'; if($row["signal"] < 75) echo 'bg-[#D9D9D9]'?> mx-[1.5px]"></div>
    <div class="h-[1.25rem] w-[.30rem] <?php if($row["signal"] > 85) echo 'bg-[#4ECB71]'; if($row["signal"] < 85) echo 'bg-[#D9D9D9]'?> mx-[1.5px]"></div>
</div>
<?php
}
?>