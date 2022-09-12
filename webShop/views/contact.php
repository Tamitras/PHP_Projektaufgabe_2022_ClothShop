<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["contact"])) {
    $_SESSION["contact"] = new Contact(0, "", "", "", 0, "", "", true, "");
}

require __DIR__ . '/header.php';
?>

<div class="box">
    <img class="bgimg" src="./views/images/contact.jpg">
</div>

<section class="content">

    <div>
        <?php if (strlen($_SESSION["contact"]->Name) > 0) : ?>
            <div>
                Aktueller Benutzer: <?php echo $_SESSION["contact"]->Name ?>
            </div>
        <?php else : ?>
            <div style="border: 1px solid black;">
                <form action="contact.php" method="post">
                    <section class="section pt-5">
                        <div class="container">
                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Vorname</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Max" pattern=[A-Z\sa-z]{3,20} value="<?php echo $_SESSION["contact"]->Name ?>" required>
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Nachname</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Mustermann" pattern=[A-Z\sa-z]{3,20} value="<?php echo $_SESSION["contact"]->LastName ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- Email -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Email</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="email" id="email" name="email" class="form-control" value="" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"  placeholder="max.mustermann@email.com" value="<?php echo $_SESSION["contact"]->Email ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- Plz -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Plz</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input id="plz" type="text" id="plz" name="plz" class="form-control" placeholder="12345" value="<?php echo $_SESSION["contact"]->PLZ ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- City -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">City</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="text" id="city" name="city" placeholder="Stuttgart" class="form-control" value="<?php echo $_SESSION["contact"]->City ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- Name -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Straßenname</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="text" id="streetName" name="streetName" placeholder="Teststraße" class="form-control" value="<?php echo $_SESSION["contact"]->StreetName ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- Name -->
                                <div class="col-md-12 text-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="name">Nummer</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="text" id="streetNumber" name="streetNumber" placeholder="1337" class="form-control" value="<?php echo $_SESSION["contact"]->StreetNumber ?>" required>
                                    </div><!-- /.col-lg-6 -->
                                </div>

                                <!-- Name -->
                                <div class="col-md-12 text-center">
                                    <div class="elem-group row p-2">
                                        <div class="col">
                                            <button type="submit">Speichern</button>
                                        </div>
                                    </div>
                                </div>


                            </div> <!-- End row -->
                        </div> <!-- End row -->
            </div> <!-- End container -->
</section> <!-- End section -->

<?php endif; ?>
</div>
</section>


<?php
require __DIR__ . '/footer.php';
?>

<?php

if ($_POST) {
    $name = "";
    $lastName = "";
    $email = "";
    $plz = "";
    $city = "";
    $newsletter = false;

    // var_dump($_POST);

    if (
        isset($_POST['name'])
        && isset($_POST['lastName'])
        && isset($_POST['email'])
        && isset($_POST['plz'])
        && isset($_POST['city'])
    ) {

        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $plz = $_POST['plz'];
        $city = $_POST['city'];
        $streetName = $_POST['streetName'];
        $streetNumber = $_POST['streetNumber'];
        $email = $_POST['email'];

        $contact = new Contact(-1, $name, $lastName, $city, $plz, $streetName, $streetNumber, $email);
        $_SESSION["contact"] = $contact;

        header("refresh:0;url=cart.php" );
    }
}
?>