<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["contact"])) {
    $_SESSION["contact"] = new Contact(0, "", "", "", 0, "", "", true, "");
} else {
    // echo "ContactInfo vorhanden";
    // var_dump($_SESSION["contact"]);
}

require __DIR__ . '/header.php';
?>


<section class="content">

    <div>
        <?php if (strlen($_SESSION["contact"]->Name) > 0) : ?>
            <div>
                Aktueller Benutzer: <?php echo $_SESSION["contact"]->Name ?>
            </div>
        <?php else : ?>



            <div style="border: 1px solid black;">

                <form action="contact.php" method="post">
                    <div class="elem-group">
                        <label for="name">Vorname</label>
                        <input type="text" id="name" name="name" placeholder="Max" pattern=[A-Z\sa-z]{3,20} value="<?php echo $_SESSION["contact"]->Name ?>" required>
                    </div>
                    <div class="elem-group">
                        <label for="name">Nachname</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Mustermann" pattern=[A-Z\sa-z]{3,20} value="<?php echo $_SESSION["contact"]->LastName ?>" required>
                    </div>
                    <div class="elem-group">
                        <label for="email">Email Adresse</label>
                        <input type="email" id="email" name="email" placeholder="max.mustermann@email.com" value="<?php echo $_SESSION["contact"]->Email ?>" required>
                    </div>

                    <div class="elem-group">
                        <label for="name">Plz</label>
                        <input id="plz" type="text" id="plz" name="plz" value="<?php echo $_SESSION["contact"]->PLZ ?>" required>
                    </div>

                    <div class="elem-group">
                        <label for="title">Stadt</label>
                        <input type="text" id="city" name="city" value="<?php echo $_SESSION["contact"]->City ?>" required>
                    </div>

                    <div class="elem-group">
                        <label for="title">Staßenname</label>
                        <input type="text" id="streetName" name="streetName" value="<?php echo $_SESSION["contact"]->StreetName ?>" required>
                    </div>

                    <div class="elem-group">
                        <label for="title">Nummer</label>
                        <input type="text" id="streetNumber" name="streetNumber" value="<?php echo $_SESSION["contact"]->StreetNumber ?>" required>
                    </div>

                    <div class="elem-group">
                        <label for="newsletter">Newsletter</label>
                        <input type="checkbox" id="newsletter" name="newsletter" pattern=[A-Za-z0-9\s]{8,60} checked="<?php echo $_SESSION["contact"]->Newsletter ?>">
                    </div>
                    <button type="submit">Speichern</button>
                </form>
            </div>
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
        && isset($_POST['newsletter'])
    ) {

        // echo "Daten werden überschrieben";

        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $plz = $_POST['plz'];
        $city = $_POST['city'];
        $streetName = $_POST['streetName'];
        $streetNumber = $_POST['streetNumber'];
        $email = $_POST['email'];
        $newsletter = $_POST['newsletter'];

        // refresh page :)

        $contact = new Contact(-1, $name, $lastName, $city, $plz, $streetName, $streetNumber, $newsletter, $email);
        $_SESSION["contact"] = $contact;

        // echo "Perfekt, sie wurden angelegt";

        // header("cart.php");
        // $nextPage = __DIR__ . "/cart.php";
        // echo $nextPage;
        // header("Location:".$nextPage);
        // exit;

        header("Refresh:0");
    }
}
?>