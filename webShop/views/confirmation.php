<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<?php
ShowCart();

function ShowCart()
{
    $errorMessage = "";
    $group = array();
    $sumPrice = 0.00;
    foreach ($_SESSION["cart"] as $element) {
        $group[$element->Id][] = $element;
        $sumPrice += $element->Price;
    }

    $resultcontent = '<div class="content">
                        <div class="row" style="border-bottom:1px solid black">
                            <div class="col d-flex justify-content-center">    
                                <h1>Bestellbestätigung</h1>
                            </div>
                        </div>';

    foreach ($group as $list) {
        $resultcontent .=   '<div class="row align-items-center" style="padding-top: 10px;padding-bottom: 5px; margin-bottom: 5px;border: 1px solid black; border-radius:15px">
                                <div class="col-1 d-flex justify-content-center">
                                    <i title="Entfernen" style="cursor:pointer;" onclick="index.addOrRemoveCartItem(' . $list[0]->Id . ');" class="fa-sharp fa-solid fa-trash fa-lg"></i>
                                </div>
                                <div class="col-3 d-flex justify-content-center">
                                    <img title="' . $list[0]->Name . '" width="100%" height="auto" style="max-width:100px;" src="' . $list[0]->Src . '"></img>
                                </div>
                                <div class="col-2 d-flex flex-column">
                            </div>
                                <div class="col d-flex flex-column">
                                    <div hidden>' . $list[0]->Id . '</div>
                                    <div>' . $list[0]->Name . '</div>
                                    <div>' . $list[0]->Description . '</div>
                                    <div><b>' . $list[0]->Price . '€</b> (' . count($list) . ' x ' . $list[0]->Price . ' = ' . count($list) * $list[0]->Price . ' )</div>
                                    <div>Anzahl: ' . count($list) .  '</div>
                                </div>
                            </div>';
    }

    $resultcontent .= "</div>";

    if (count($_SESSION["cart"]) > 0) {
        $resultcontent .=   '<div style="border-bottom:1px solid black; padding-top:15px">
                                <div><p>Summe: &nbsp; (' . count($_SESSION["cart"]) . ' Artikel) <b>0.00 €</b>:</div></p>
                            </div>';

        $resultcontent .= '<div class="d-grid gap-2 col-6 mx-auto" style="padding-top:15px">
                            </div>';

        if ($errorMessage != "") {
            $resultcontent .= '<div class="errorMessage">' . $errorMessage . '</div>';
        }
    } else {
        $resultcontent .= '<div>
        <img class="bgimg_large" src="./views/images/cartEmpty.jpg"></img>
        </div>';
    }

    echo $resultcontent;
}

// delete session
session_destroy();

?>

<div class="content">
    <h1>Vielen Dank für Ihre Bestellung</h1>
</div>
