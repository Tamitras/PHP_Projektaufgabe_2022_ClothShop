<?php
// Einbinden einer anderen php datei
require __DIR__ . '/router.php';

//Zugriff auf die Klassenfunktionalität
$spliced = explode("\\", __DIR__ );
$wildcard = $spliced[count($spliced) -1];
$wildcard = "/" . $wildcard;

Route::add($wildcard . '/', function() {
    require __DIR__ .'/views/home.php';
});

Route::add($wildcard . '/home', function() { 
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/home.php', function() {
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/index.php', function() {
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/cart', function() {
    require __DIR__ . '/views/cart.php';
});

Route::add($wildcard . '/cart.php', function() {
    require __DIR__ . '/views/cart.php';
});

Route::submit();
