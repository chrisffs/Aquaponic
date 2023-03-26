<?php
include "conn.php";
// PH TABLE===============

       $sql = "SELECT * FROM `phreport_tbl`";
       $result = $conn->query($sql);

       while($row = $result-> fetch_assoc()){         
        if ($sql >= 0){                                      
            $conn->query("UPDATE `phreport_tbl` set dbstatus = 'ACIDIC',`diagnosis` = 'Change Water!', sensor = 'PH' WHERE `phvalue` BETWEEN 0.00 and 5.99");
        }
       }

       $sql2 = "SELECT * FROM `phreport_tbl`";
       $result2 = $conn->query($sql2);

       while($row2 = $result2-> fetch_assoc()){  
        if ($sql2 >= 0){
            $conn->query("UPDATE `phreport_tbl` set  dbstatus = 'ALKALINE',`diagnosis` = 'Change Water!', sensor = 'PH' WHERE `phvalue` BETWEEN 9.00 and 14.00");
        } 
       } 

       $sql3 = "SELECT * FROM `phreport_tbl`";
       $result3 = $conn->query($sql3);

       while($row3 = $result3-> fetch_assoc()){  
        if ($sql3 >= 0){
            $conn->query("UPDATE `phreport_tbl` set  dbstatus = 'NEUTRAL',`diagnosis` = 'Nothing', sensor = 'PH' WHERE `phvalue` BETWEEN 6.00 and 8.99 ");
        } 
       } 

       $sql34 = "SELECT * FROM `phreport_tbl`";
       $result34 = $conn->query($sql34);

       while($row34 = $result34-> fetch_assoc()){  
        if ($sql34 >= 0){
          
            $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Acid Death Point' WHERE `phvalue` BETWEEN 0.00 and 3.99 ");

            $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'No Reproduction & Slow Growth' WHERE `phvalue` BETWEEN 4.00 and 6.49 ");

            $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Desirable Range of pH' WHERE `phvalue` BETWEEN 6.50  and 8.99 ");

            $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'No Reproduction & Slow Growth' WHERE `phvalue` BETWEEN 9.00 and 10.99");

            $conn->query("UPDATE `phreport_tbl` set `phstatus` = 'Alkaline Death Point' WHERE `phvalue` BETWEEN 11.00 and 14.00");

        } 
       } 


       // TEMP TABLE===============

?>