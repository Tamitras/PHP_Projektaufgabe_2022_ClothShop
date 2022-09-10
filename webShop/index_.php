<?php
// Include Model
include("Models/Shoe.php");

// Start Session
session_start();

// Fehleranalyse
error_reporting(-1);
ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html lang="de">

<?php include __DIR__ . "/head.php" ?>

<body>
    <!-- MainContainer -->
    <div class="MainContainer">

        <!-- Place Header -->
        <?php include './templates/header/header.php' ?>

        <!-- ContentContainer -->
        <div id="content"></div>

        <!-- Place Footer -->
        <?php include './templates/footer/footer.php' ?>

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
        margin: 15px;
        padding: 15px;
    }
</style>
<?php

$_SESSION["shoes"] = array();
$_SESSION["cart"] = array();

array_push(
    $_SESSION["shoes"],
    new Shoe(1, "Schuh1", 19.99, "Schuh der nicht passen wird", "assets/Shoes/orange.svg"),
    new Shoe(2, "Schuh2", 24.99, "Schmerzt schon beim Ansehen",  "assets/Shoes/green.svg"),
    new Shoe(3, "Schuh3", 18.99, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
    new Shoe(4, "Schuh4", 14.95, "Schmerzt schon beim Ansehen",  "assets/Shoes/pink.svg"),
    new Shoe(5, "Schuh5", 99.99, "Schmerzt schon beim Ansehen",  "assets/Shoes/blue.svg"),
);

?>