<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_GET) {

    // var_dump($_GET);
    if (isset($_GET['email'])) {
        $_SESSION["hasNewsletter"] = $_GET['email'];
    }
}

header("refresh:0;url=home.php" );

?>