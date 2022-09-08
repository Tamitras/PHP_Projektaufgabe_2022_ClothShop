<?php
include("../../Models/Shoe.php");
session_start();

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];

    switch ($action) {
        case "ShowCart": {
                ShowCart();
            }
            break;

        case "RefreshHeadCart": {
                RefreshHeadCart();
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
} ?>

<?php

function RefreshHeadCart()
{
    $cartContent = '';

    $cartContent .= '<div class="row">
                    Warenkorb
                    <div class="col">
                        Anzahl: '. count($_SESSION["cart"]).'
                    </div>
                    <div class="col">
                        Gesamt: 12€
                    </div>
                </div>';

    echo $cartContent;
}

function ShowCart()
{
    if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
        echo "Warenkorb ist noch leer";
    }

    $cart = $_SESSION["cart"];

    $cartContent = '<div>
                        <div class="row">
                            <div class="col">
                                <h1>Warenkorb</h1>
                            </div>
                        </div>';



    foreach ($cart as $key => $cartObject) {

        $cartContent .= '<div class="row">
                            <div class="col">
                                <div>Name</div>
                            </div>
                            <div class="col">
                                <div>' . $cartObject->Name . '</div>
                            </div>
                        </div>';
    }
    $cartContent .= "</div>";
    echo $cartContent;

    // foreach ($shoes as $key=>$shoe) {

    //     $shoesContent .='<div class="col-xs-12 col-sm-12 col-md-6 col-xxl-3 col-lg-6 col-xl-4">
    //                             <div class="card m-2 p-3" style="border-radius:25px;">
    //                                 <div class="col border-3 buttonNoSelect">
    //                                     <img style="background: black; border-radius:25px;" src=' . $shoe->Src .' class="card-img-top p-3">
    //                                 </div>
    //                                 <div class="col">
    //                                     <div class="card-body">
    //                                         <div hidden>'.$shoe->Id .' </div>
    //                                         <h5 class="card-title">' . $shoe->Name . '</h5>
    //                                         <p class="card-text">' . $shoe->Description .'</p>
    //                                         <a href="#" class="btn btn-primary">Details</a>
    //                                         <button onclick="index.addToCart('. $shoe->Id .');" class="btn btn-success">In den Warenkorb</button>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                         </div>';
    // }
    // $shoesContent .= "</div>";
    // return $shoesContent;
}

?>