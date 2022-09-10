<?php
require "./Models/Shoe.php";
session_start();

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];

    switch ($action) {
        case "ShowShoes": {
                echo ShowShoes();
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
} ?>
