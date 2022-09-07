<?php
session_start();
// Fehleranalyse
error_reporting(-1);
ini_set('display_errors', 'On');

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
        <?php include '../webShop/templates/header/header.php' ?>

        <!-- ContentContainer -->
        <div class="container" style="color: white; background: rgb(235 237 237); border-radius:25px;">

            <?php if ($_SESSION("isCart")) { ?>
                <!-- Show Cart View -->
                <?php include '../webShop/templates/content/cart.php' ?>
            <?php } else { ?>
                <!-- Show list with shoes -->
                <?php include '../webShop/templates/content/shoes.php' ?>
            <?php } ?>
        </div>

        <!-- Place Footer -->
        <?php include '../webShop/templates/footer/footer.php' ?>

    </div>
</body>

</html>

<script>

</script>

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
</style>