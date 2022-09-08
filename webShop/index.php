<?php
// Include Model
include_once("Models/Shoe.php");

// Start Session
session_start();

// Fehleranalyse
error_reporting(-1);
ini_set('display_errors', 'On');

function renderPhpFile($filename, $vars = null)
{
    if (is_array($vars) && !empty($vars)) {
        extract($vars);
    }
    ob_start();
    include $filename;
    return ob_get_clean();
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>WebShop 1390365 Erik Kaufmann</title>
    <meta charset="utf-8">

    <!-- Importiere index.js als Modul mit eigenem Scope/Funktionen/Routinen ==> Module Pattern -->
    <script type="module" src="./index.js"></script>

    <!-- Importiere externe Bibliotheken wie z.B. Bootstrap, JQuery und FontAwesome (Icons) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a65f36b132.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <!-- MainContainer -->
    <div class="MainContainer">

        <!-- Place Header -->
        <?php include_once '../webShop/templates/header/header.php' ?>

        <!-- ContentContainer -->
        <div id="content"> </div>

        <!-- Place Footer -->
        <?php include_once '../webShop/templates/footer/footer.php' ?>

    </div>
</body>

</html>

<style>
    body {
        /* overrides the default 8px margin  */
        margin: 0 !important;
        /* background-color: rgb(23, 23, 23); */
    }

    .buttonNoSelect {
        user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -o-user-select: none;

        pointer-events: none;
    }

    #content {
        background: rgb(235 237 237);
        border-radius: 25px;
    }
</style>
<?php

$_SESSION["shoes"] = array();
$_SESSION["cart"] = array();

array_push(
    $_SESSION["shoes"],
    new Shoe(1, "Schuh1", 0, "Schuh der nicht passen wird", "assets/Shoes/orange.svg"),
    new Shoe(2, "Schuh2", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/green.svg"),
    new Shoe(3, "Schuh3", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
    new Shoe(4, "Schuh4", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/pink.svg"),
    new Shoe(5, "Schuh5", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
);

// array_push(
//     $_SESSION["cart"],
//     new Shoe(5, "Schuh5", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
//     new Shoe(1, "Schuh1", 0, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
// );

?>