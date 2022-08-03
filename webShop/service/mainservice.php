<?php

function test()
{
    echo "Ich bin ein Test";
}

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];

    switch ($action) {
        case "test": {
                return test();
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
