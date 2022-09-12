<?php

// Helper Script

// loads session
session_start();

// delete session
session_destroy();

header("refresh:0;url=home.php" );
?>

<a href="home.php"> Zurück</a>


<!-- Change mysql root password -->
<!-- ALTER USER 'root'@'localhost' IDENTIFIED BY 'root'; -->