<?php
// Einbinden einer anderen php datei
require __DIR__ . '/router.php';

//Zugriff auf die Klassenfunktionalität
Route::add('/', function() {
    require __DIR__ . '/views/home.php';
});

Route::submit(); 
?>
