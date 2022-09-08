<?php
include("../../Models/Shoe.php");
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


<?php

if (isset($_GET['shoeIndex'])) {

    $index = $_GET["shoeIndex"];

    $shoe = $shoes[$index];

    AddToCart($shoe);
}

function ShowShoes()
{
    if (!isset($_SESSION["shoes"])) {
        print_r("keine shoes");
        return null;
    }

    $shoesContent = "<div class='row'>";
    $shoes = $_SESSION["shoes"];
    
    foreach ($shoes as $key=>$shoe) {

        $shoesContent .='<div class="col-xs-12 col-sm-12 col-md-6 col-xxl-3 col-lg-6 col-xl-4">
                                <div class="card m-2 p-3" style="border-radius:25px;">
                                    <div class="col border-3 buttonNoSelect">
                                        <img style="background: black; border-radius:25px;" src=' . $shoe->Src .' class="card-img-top p-3">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <div hidden>'.$shoe->Id .' </div>
                                            <h5 class="card-title">' . $shoe->Name . '</h5>
                                            <p class="card-text">' . $shoe->Description .'</p>
                                            <a href="#" class="btn btn-primary">Details</a>
                                            <button onclick="index.addToCart('. $shoe->Id .');" class="btn btn-success">In den Warenkorb</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
    }
    $shoesContent .= "</div>";
    return $shoesContent;
}

?>