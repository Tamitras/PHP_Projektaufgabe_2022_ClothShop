<?php
// Hinzufügen des Scopes für das Model Shoe
require '../Models/Shoe.php';

?>
<?php
session_start();

function GetTestData()
{
    echo true;
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

        echo true;
    } else {
        echo false;
    }
}

function unsetValue(array $array, $value, $strict = TRUE)
{
    if(($key = array_search($value, $array, $strict)) !== FALSE) {
        unset($array[$key]);
    }
    return $array;
}

function RemoveFromCart(int $index)
{
    // get data from session
    if (isset($_SESSION['cart'])) {

        //Remove from array
        foreach($_SESSION["cart"] as $key=>$row){
            if($row->Id == $index){
              unset($_SESSION["cart"][$key]);
            }
        } 

        echo true;
    } else {
        echo false;
    }
}

function UpdateCart()
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

    switch ($action) {
        case "GetTestData": {
                GetTestData();
            }
            break;

        case "AddToCart": {
                if (isset($_GET['param1'])) {
                    $param1 = $_GET['param1'];
                    AddToCart($param1);
                }
            }
            break;
        case "RemoveFromCart": {
                if (isset($_GET['param1'])) {
                    $param1 = $_GET['param1'];
                    RemoveFromCart($param1);
                }
            }
            break;

        default: {
                // do not forget to return default data, if you need it...
            }
    }
}
