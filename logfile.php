<?php

$sdate=$_POST["startdate"];
//echo $sdate."<br>\n";


$edate=$_POST["enddate"];
//echo $edate."<br>\n"."<br>\n";



//        Create CSV File

$myFile = "testFile".".csv"; 
$fh = fopen($myFile, 'w') 
       or                  
       die("can't open file");
fwrite($fh, $sdate."\n");
do {
   $sdate = date ("Y-m-d", strtotime("+1 day", strtotime($sdate))); 
   fwrite($fh, $sdate."\n");
} while ($sdate < $edate);

 fclose($fh);

 // Get Date from CSV file


 $row = 1;
if (($handle = fopen("testFile.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 50000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        
        for ($c=0; $c < $num; $c++) {
            echo $row.":	".$data[$c] . "<br />\n";
        $row++;
        }
    }
    fclose($handle);
}
?>