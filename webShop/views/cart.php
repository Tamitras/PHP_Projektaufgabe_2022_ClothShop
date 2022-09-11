<?php
require __DIR__ . '/header.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<section>
    <?php
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {

        echo ShowCart();
    } else {
        $_SESSION["cart"] = array();
        echo ShowCart();
    }

    ?>
</section>

<?php
function ShowCart()
{
    $errorMessage = "";
    $group = array();
    $sumPrice = 0.00;
    foreach ($_SESSION["cart"] as $element) {
        $group[$element->Id][] = $element;
        $sumPrice += $element->Price;
    }
    $redirectTo = (isset($_SESSION["contact"])) ? "confirmation.php" : "contact.php";

    $isEmpty = "<div><h1>Warenkorb Leer</h1></div>";
    $notEmpty = "<div><h1>Warenkorb</h1></div>";
    $cartString = (count($_SESSION["cart"]) == 0) ? $isEmpty : $notEmpty;

    $resultcontent = '<div class="content">
                        <div class="row" style="border-bottom:1px solid black">
                            <div class="col d-flex justify-content-center">    
                                <h1>' . $cartString . '</h1>
                            </div>
                        </div>';

    foreach ($group as $list) {
        $resultcontent .=   '<div class="row align-items-center" style="padding-top: 10px;padding-bottom: 5px; margin-bottom: 5px;border: 1px solid black; border-radius:15px">
                                <div class="col-1 d-flex justify-content-center">
                                    <i style="cursor:pointer;" onclick="index.addOrRemoveCartItem(' . $list[0]->Id . ');" class="fa-sharp fa-solid fa-trash fa-lg"></i>
                                </div>
                                <div class="col-3 d-flex justify-content-center">
                                    <img width="100%" height="auto" style="max-width:200px;" src="' . $list[0]->Src . '"></img>
                                </div>
                                <div class="col-2 d-flex flex-column">
                                <div hidden>ID:</div>
                                <div>Name:</div>
                                <div>Beschreibung:</div>
                                <div>Preis:</div>
                                <div>Anzahl:</div>
                            </div>
                                <div class="col d-flex flex-column">
                                    <div hidden>' . $list[0]->Id . '</div>
                                    <div>' . $list[0]->Name . '</div>
                                    <div>' . $list[0]->Description . '</div>
                                    <div><b>' . $list[0]->Price . '€</b> (' . count($list) . ' x ' . $list[0]->Price . ' = ' . count($list) * $list[0]->Price . ' )</div>
                                    <div>' . count($list) .  '</div>
                                </div>
                            </div>';
    }

    $resultcontent .= "</div>";

    if (count($_SESSION["cart"]) > 0) {
        $resultcontent .=   '<div style="border-bottom:1px solid black; padding-top:15px">
                                <div><p>Summe: &nbsp; (' . count($_SESSION["cart"]) . ' Artikel): <b><s>' . $sumPrice . '€</s></b></div></p>
                                <div><p>Neu: &ensp; &emsp; (' . count($_SESSION["cart"]) . ' Artikel): <b> <span>0,00€ (Studentenpreis)</span> </b></div></p>
                            </div>';

        $resultcontent .= '<div class="d-grid gap-2 col-6 mx-auto" style="padding-top:15px">
                                <button onclick="index.checkout();" title="Es müssen noch Kontaktdaten eingegeben werden" type="button" class="btn btn-warning">
                                    <span>Zur Kasse gehen</span>
                                </button>
                            </div>';

        if ($errorMessage != "") {
            $resultcontent .= '<div class="errorMessage">' . $errorMessage . '</div>';
        }
    }

    echo $resultcontent;
}
?>

