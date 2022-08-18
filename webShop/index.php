<?php

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
    <div class="MainContainer">

        <!-- Place Header -->
        <?php include '../webShop/templates/header/header.php' ?>


        <!-- MainContainer -->
        <div class="container" style="color: white; background: rgb(235 237 237); border-radius:25px;">

            <!-- content -->
            <div class="row">

                <?php for ($x = 0; $x <= 10; $x++) {

                    // if($x % 2 == 0)
                    // {
                    //    echo "mmäööögg";
                    // }
                ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xxl-3 col-lg-6 col-xl-4">
                        <div class="card m-2 p-3" style="border-radius:25px;">
                            <div class="col border-3 buttonNoSelect">
                                <img style="background: black; border-radius:25px;" src="assets/Shoes/orange.svg" class="card-img-top p-3">
                            </div>
                            <div class="col">

                                <div class="card-body">
                                    <h5 class="card-title">Orange Shoes</h5>
                                    <p class="card-text">Orange shoes directly from the moon</p>
                                    <a href="#" class="btn btn-primary">Details</a>
                                    <a href="#" class="btn btn-success">In den Warenkorb</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
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