<?php
// Hinzufügen des Scopes für das Model Shoe
require '../Models/Shoe.php';
// include_once("../Models/Shoe.php");

?>
<?php
session_start();

function GetTestData()
{
    $_SESSION["shoes"] = array();

    array_push(
        $_SESSION["shoes"],
        new Shoe(1, "Schuh1", 0, "Schuh der nicht passen wird", "assets/Shoes/orange.svg"),
        new Shoe(2, "Schuh2", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/green.svg"),
        new Shoe(3, "Schuh3", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
        new Shoe(4, "Schuh4", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/pink.svg"),
        new Shoe(5, "Schuh5", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
    );

    print_r($_SESSION["shoes"]);
}

function AddToCart(Shoe $shoe)
{
    // get data from session
    if (isset($_SESSION['Cart'])) {

        $cart = $_SESSION["Cart"];
        array_push($cart->Shoes, $shoe);
    }
}

function RemoveFromCart(Shoe $shoe)
{
    // TODO
}

function ShowCart()
{
    if (isset($_SESSION["isCart"])) {
        $_SESSION["isCart"] = true;
    }
}

function ShowShoes()
{
    if (isset($_SESSION["isCart"])) {
        $_SESSION["isCart"] = false;
    }
}

function GetData(string $query = null)
{
    $db_link = mysqli_connect(
        // MYSQL_HOST,
        // MYSQL_BENUTZER,
        // MYSQL_KENNWORT,
        // MYSQL_DATENBANK
        "host",
        "username",
        "password",
        "database"
    );

    $sql = "SELECT * FROM adressen";
    $sql2 = $query;

    $db_erg = mysqli_query($db_link, $sql);
    if (!$db_erg) {
        // die('Ungültige Abfrage: ' . mysqli_error());
    }
}

if (isset($_GET['action']) && !empty(isset($_GET['action']))) {
    $action = $_GET['action'];
    $param1 = $_GET['param1'];

    switch ($action) {
        case "GetTestData": {

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
