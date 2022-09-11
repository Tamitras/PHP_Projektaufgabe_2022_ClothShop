<?php
function autoload($className)
{
    require_once "Models/" . $className . ".php";
}

spl_autoload_register('autoload');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/header.php';
?>


<section class="content">
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
            <label for="newsletter">Newsletter</label>
            <input type="checkbox" id="newsletter" name="newsletter" pattern=[A-Za-z0-9\s]{8,60}>
        </div>
        <button type="submit">Speichern</button>

    </form>
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
        $email = $_POST['email'];
        $plz = $_POST['plz'];
        $city = $_POST['city'];
        $newsletter = $_POST['newsletter'];


        // $email_body .= "</div>";

        // $headers  = 'MIME-Version: 1.0' . "\r\n"
        //     . 'Content-type: text/html; charset=utf-8' . "\r\n"
        //     . 'From: ' . $email . "\r\n";

        // if (mail($recipient, $email_title, $email_body, $headers)) {
        //     echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
        // } else {
        //     echo '<p>We are sorry but the email did not go through.</p>';
        // }


        echo "Perfekt, sie wurden angelegt";
    } else {
        echo '<p>Something went wrong</p>';
    }
}
?>