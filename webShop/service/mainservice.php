<?php
// Hinzufügen des Scopes für das Model Shoe
require '../Models/Shoe.php';
?>
<?php
session_start();

function GetTestData()
{
    $output = "keine Jobs - ";
    $tempJobs = $GLOBALS['jobs'];

    $_SESSION['name'] = "Dies ist ein Test";

    foreach ($tempJobs as $job) {
        $output .= "<tr>";
        $output .= "<td>" . $job['name'] . "</td>";
        // $output .=  "<td>".$job['$jobTitle']."</td>";
        // $output .=  "<td>".$job['$jobStartDate']."</td>";
        // $output .=  "<td>".$job['$jobDuration']."</td>";
        // $output .=  "<td>".$job['$qty']."</td></tr>"  
    }

    echo $output;
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

                echo $param1;
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
