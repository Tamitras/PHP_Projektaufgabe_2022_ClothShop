<?php
include("../../Models/Shoe.php");
session_start();

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];

    switch ($action) {
        case "ShowCart": {
                echo ShowCart();
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
} ?>

<?php

function ShowCart()
{
    if (!isset($_SESSION["cart"])) {
        print_r("kein cart");
        return null;
    }

    $cartContent = '<div>
                        <div class="row">
                            <div class="col">
                                <h1>Warenkorb</h1>
                            </div>
                        </div>';
    $cart = $_SESSION["cart"];
    
    foreach ($cart as $key=>$cartObject) {

        $cartContent .='<div class="row">
                            <div class="col">
                                <div>Name</div>
                            </div>
                            <div class="col">
                                <div>' . $cartObject->Name .'</div>
                            </div>
                        </div>';
    }
    $cartContent .= "</div>";
    return $cartContent;
}

?>