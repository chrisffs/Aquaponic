<div class="flex justify-between px-5 py-4">
    <div>
        <h3 class="font-bold text-base">Records</h3>
    </div>
    <div class="flex">
        <div class="flex items-center px-3">
            <div class="mx-auto rounded-full bg-[#AC1A1A] w-[10px] h-[10px]"></div>
            <div>
                <h3 class="font-semibold text-xs mx-1">ACIDIC</h3>
            </div>
        </div>
        <div class="flex items-center px-3">
            <div class="mx-auto rounded-full bg-[#2E8C3D] w-[10px] h-[10px]"></div>
            <div>
                <h3 class="font-semibold text-xs mx-1">NEUTRAL</h3>
            </div>
        </div>
        <div class="flex items-center px-3">
            <div class="mx-auto rounded-full bg-[#2400FF] w-[10px] h-[10px]"></div>
            <div>
                <h3 class="font-semibold text-xs mx-1">ALKALINE</h3>
            </div>
        </div>
    </div>
</div>
<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 px-8">
        <div class="overflow-hidden overflow-y-auto">
            <table class="min-w-full text-left text-sm font-light">
                <thead class="bg-white border-b-3 font-semibold text-[#626262] sticky top-0">
                    <tr>
                        <th scope="col" class="px-5 py-2 text-xs">pH Value</th>
                        <th scope="col" class="px-5 py-2 text-xs">pH Diagnosis</th>
                        <th scope="col" class="px-5 py-2 text-xs">pH Status</th>
                        <th scope="col" class="px-5 py-2 text-xs">Water Temperature</th>
                        <th scope="col" class="px-5 py-2 text-xs">Date</th>
                        <th scope="col" class="px-5 py-2 text-xs">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conn.php";
                    $phtable = mysqli_query($conn, "SELECT phreport_tbl.date AS date, phreport_tbl.time AS time, phreport_tbl.phvalue AS phvalue, phreport_tbl.phstatus AS phstatus, phreport_tbl.dbstatus AS dbstatus, phreport_tbl.diagnosis AS diagnosis, waterreporttbl.date, waterreporttbl.time, waterreporttbl.watertemp AS watertemp FROM `phreport_tbl` INNER JOIN waterreporttbl ON phreport_tbl.time = waterreporttbl.time WHERE phreport_tbl.date LIKE CURRENT_DATE order by phreport_tbl.time DESC LIMIT 7");
                    while($row = mysqli_fetch_array($phtable))
                    {
                    ?>
                    <tr class="border-b-2 ">
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs"><?php echo $row["phvalue"]?></td>
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs"><?php echo $row["phstatus"]?></td>
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs flex items-center"><div class="legend mx-auto rounded-full <?php if($row["dbstatus"] == "ACIDIC") echo 'bg-[#AC1A1A]'; if ($row["dbstatus"] == "NEUTRAL") echo 'bg-[#2E8C3D]'; if ($row["dbstatus"] == "ALKALINE") echo 'bg-[#2400FF]';?> w-[10px] h-[10px]"></div><p class="dbstat hidden"><?php echo $row["dbstatus"]?></p></td>
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs"><?php echo $row["watertemp"]?>°C</td>
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs"><?php echo $row["date"]?></td>
                        <td class="whitespace-nowrap px-5 py-4 font-inter font-medium text-xs w-[10px] h-[10px]"><?php echo $row["time"]?></td>
                    </tr>
                    <?php
                    }
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
