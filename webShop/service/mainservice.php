<?php

function GetTestData($param)
{
    echo "Ich bin ein Test - aber was soll ich mit $param anfangen?";
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
