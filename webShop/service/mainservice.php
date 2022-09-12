<?php
// Hinzufügen des Scopes für das Model Shoe
require '../Models/Shoe.php';
require '../Models/Contact.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST['action']) && !empty(isset($_POST['action']))) {
    $action = $_POST['action'];

    switch ($action) {

        case "AddToCart": {
                if (isset($_POST['param1'])) {
                    $param1 = $_POST['param1'];
                    AddToCart($param1);
                }
            }
            break;
        case "RemoveFromCart": {
                if (isset($_POST['param1'])) {
                    $param1 = $_POST['param1'];
                    RemoveFromCart($param1);
                }
            }
            break;

        case "RefreshHeadCart": {
                include_once "../views/cartHead.php";
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
}

function AddToCart(int $index)
{
    // get data from session
    if (isset($_SESSION['cart']) && isset($_SESSION["shoes"])) {

        $shoes = $_SESSION["shoes"];
        $shoe = null;

        foreach ($shoes as $s) {
            if ($index == $s->Id) {
                $shoe = $s;
            }
        }

        if ($shoe == null) {
            return;
        }

        array_push($_SESSION["cart"], $shoe);
        sort($_SESSION["cart"]);

        echo true;
    } else {
        echo false;
    }
}

function RemoveFromCart(int $index)
{
    // get data from session
    if (isset($_SESSION['cart'])) {

        //Remove from array
        foreach ($_SESSION["cart"] as $key => $row) {
            if ($row->Id == $index) {
                unset($_SESSION["cart"][$key]);

                // reassign keys
                $_SESSION["cart"] = array_values($_SESSION["cart"]);
                break;
            }
        }

        echo true;
    } else {
        echo false;
    }
}

