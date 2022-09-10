<?php
// Einbinden einer anderen php datei
require __DIR__ . '/router.php';

//Zugriff auf die Klassenfunktionalität
Route::add('/home', function() {
    require __DIR__ . '/views/home.php';
});

Route::add('/home.php', function() {
    require __DIR__ . '/views/home.php';
});

Route::add('/index.php', function() {
    require __DIR__ . '/views/home.php';
});

Route::add('/cart', function() {
    require __DIR__ . '/views/cart.php';
});

Route::add('/cart.php', function() {
    require __DIR__ . '/views/cart.php';
});

Route::submit();
