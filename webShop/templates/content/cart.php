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
                        Anzahl: ' . count($_SESSION["cart"]) . '
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

    // $cartContent = '<div>
    //                     <div class="row">
    //                         <div class="col">
    //                             <h1>Warenkorb</h1>
    //                         </div>
    //                     </div>';



    // foreach ($cart as $key => $cartObject) {

    //     $cartContent .= '<div class="row">
    //                         <div class="col">
    //                             <div>Name</div>
    //                         </div>
    //                         <div class="col">
    //                             <div>' . $cartObject->Name . '</div>
    //                         </div>
    //                     </div>';
    // }
    // $cartContent .= "</div>";
    // echo $cartContent;


    $group = array();
    $sumPrice = 0.00;
    foreach ($_SESSION["cart"] as $element) {
        $group[$element->Id][] = $element;
        $sumPrice += $element->Price;
    }



    $resultcontent = '<div>
                        <div class="row" style="border-bottom:1px solid black">
                            <div class="col d-flex justify-content-center">
                                <h1>Warenkorb</h1>
                            </div>
                        </div>';

    foreach ($group as $list) {
        $resultcontent .=   '<div class="row align-items-center" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 1px solid black;">
                                <div class="col-3 d-flex justify-content-center">
                                    <img width="auto" height="120" src="' . $list[0]->Src . '"></img>
                                </div>
                                <div class="col d-flex flex-column">
                                    <div>ID: ' . $list[0]->Id . '</div>
                                    <div>Name: ' . $list[0]->Name . '</div>
                                    <div>Beschreibung: ' . $list[0]->Description . '</div>
                                    <div>Preis: ' . $list[0]->Price . '€</div>
                                    <div>Anzahl: ' . count($list) .  '</div>
                                </div>
                            </div>';
    }

    $resultcontent .= "</div>";
    $resultcontent .=   '<div style="border-bottom:1px solid black; padding-top:15px">
                            <div><p>Summe: &nbsp; (' . count($_SESSION["cart"]) . ' Artikel): <b><s>' . $sumPrice . '€</s></b></div></p>
                            <div><p>Neu: &ensp; &emsp; (' . count($_SESSION["cart"]) . ' Artikel): <b> <span>0,00€</span> </b></div></p>
                        </div>';

    $resultcontent .= '<div>
                        <button>Zur Kasse gehen</button>
                        </div>';

    echo $resultcontent;
}

?>