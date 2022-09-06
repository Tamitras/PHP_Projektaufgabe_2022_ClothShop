<?php
session_start();

// function GetTestData($param)
// {
//     echo "Ich bin ein Test - aber was soll ich mit $param anfangen?";
// }

$jobs = array
  (
  array('name'=>'LW12345'),
  array('name'=>'LW15783'),
  array('name'=>'DG12345'),
  array('name'=>'LK17543')
);

function GetTestData() {
    $output = "keine Jobs - ";
    $tempJobs = $GLOBALS['jobs'];

    $_SESSION['name'] = "Dies ist ein Test";

    foreach ($tempJobs as $job)   {
            $output .= "<tr>";
            $output .= "<td>".$job['name']."</td>";
            // $output .=  "<td>".$job['$jobTitle']."</td>";
            // $output .=  "<td>".$job['$jobStartDate']."</td>";
            // $output .=  "<td>".$job['$jobDuration']."</td>";
            // $output .=  "<td>".$job['$qty']."</td></tr>"  
   }

//    return $output;
   echo $output;
}

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];
    $param1 = $_GET['param1'];

    switch ($action) {
        case "GetTestData": {

                echo $param1;
                return GetTestData($param1);
            }
            break;

        case "two": {
                return 2; // or call here two();
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
}
