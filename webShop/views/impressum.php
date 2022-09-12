<?php
require __DIR__ . '/header.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<div class="content" style="height: calc(100vh - 200px)!important; " id="content">

    <h1>Impressum</h1>

    <h2>Angaben gem&auml;&szlig; &sect; 5 TMG</h2>
    <p>Erik Kaufmann<br />
        Teststra&szlig;e 15<br />
        73249 Wernau</p>

    <h2>Kontakt</h2>
    <p>Telefon: &#91;Telefonnummer&#93;<br />
        E-Mail: info@kfm.de</p>

</div>


<?php
require __DIR__ . '/footer.php';
?>