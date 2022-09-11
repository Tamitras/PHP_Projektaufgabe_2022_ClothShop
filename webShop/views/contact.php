<?php
// function autoload($className)
// {
//     require_once "Models/" . $className . ".php";
// }

// spl_autoload_register('autoload');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/header.php';
?>


<section class="content">

    <?php if (!isset($_SESSION["contact"])) :  ?>
        <div style="border: 1px solid black;">
            <form action="contact.php" method="post">
                <div class="elem-group">
                    <label for="name">Vorname</label>
                    <input type="text" id="name" name="name" placeholder="Max" pattern=[A-Z\sa-z]{3,20} required>
                </div>
                <div class="elem-group">
                    <label for="name">Nachname</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Mustermann" pattern=[A-Z\sa-z]{3,20} required>
                </div>
                <div class="elem-group">
                    <label for="email">Email Adresse</label>
                    <input type="email" id="email" name="email" placeholder="max.mustermann@email.com" required>
                </div>

                <div class="elem-group">
                    <label for="name">Plz</label>
                    <input id="plz" type="text" id="plz" name="plz" required>
                </div>

                <div class="elem-group">
                    <label for="title">Stadt</label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="elem-group">
                    <label for="title">Staßenname</label>
                    <input type="text" id="streetName" name="streetName" required>
                </div>

                <div class="elem-group">
                    <label for="title">Nummer</label>
                    <input type="text" id="streetNumber" name="streetNumber" required>
                </div>

                <div class="elem-group">
                    <label for="newsletter">Newsletter</label>
                    <input type="checkbox" id="newsletter" name="newsletter" pattern=[A-Za-z0-9\s]{8,60}>
                </div>
                <button type="submit">Speichern</button>
            </form>
        </div>
    <?php else : ?>
        <div> <?php echo $_SESSION["contact"]->Name ?>, Sie sind bereits registriert</div>
    <?php endif ?>


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

    var_dump($_POST);

    if (
        isset($_POST['name'])
        && isset($_POST['lastName'])
        && isset($_POST['email'])
        && isset($_POST['plz'])
        && isset($_POST['city'])
        && isset($_POST['newsletter'])
    ) {
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

        echo "Perfekt, sie wurden angelegt";

        header("cart.php");
    } else {
        echo '<p>Something went wrong</p>';
    }
}
?>