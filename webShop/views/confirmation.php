<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<?php

echo "Zusammenfassung";

?>


<div class="content">
    <h1>Vielen Dank für Ihre Bestellung</h1>

    <div class="row">

    </div>

    <div class="row">
        <h3>Ihre bestellten Artikel</h3>
    </div>
    <div class="row">
        <h3>Lieferadresse:</h3>

    </div>
</div>

<?php

// Helper Script


// delete session
session_destroy();

?>

<a href="home.php"> Zurück</a>