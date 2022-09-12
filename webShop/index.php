<?php
// Einbinden einer anderen php datei
require __DIR__ . '/router.php';

error_reporting(E_ALL);

//Zugriff auf die Klassenfunktionalität
$fullPathSubStrings = explode("\\", __DIR__);
$rootPathSubStrings = explode("/", $_SERVER["DOCUMENT_ROOT"]);

$wildcard = "";
for ($x = count($rootPathSubStrings); $x < count($fullPathSubStrings); $x++) {
    $wildcard .= "/" . $fullPathSubStrings[$x];
}

// echo $wildcard;


// --------------------------Home--------------------------
Route::add($wildcard . '/', function () {
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/home', function () {
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/home.php', function () {
    require __DIR__ . '/views/home.php';
});

Route::add($wildcard . '/index.php', function () {
    require __DIR__ . '/views/home.php';
});
// --------------------------Home--------------------------


// --------------------------Cart--------------------------

Route::add($wildcard . '/cart', function () {
    require __DIR__ . '/views/cart.php';
});

Route::add($wildcard . '/cart.php', function () {
    require __DIR__ . '/views/cart.php';
});
// --------------------------Cart--------------------------


// --------------------------Contact--------------------------
Route::add($wildcard . '/contact.php', function () {
    require __DIR__ . '/views/contact.php';
});

Route::add($wildcard . '/contact', function () {
    require __DIR__ . '/views/contact.php';
});
// --------------------------Contact--------------------------


// --------------------------Confirmation--------------------------
Route::add($wildcard . '/confirmation.php', function () {
    require __DIR__ . '/views/confirmation.php';
});

Route::add($wildcard . '/confirmation', function () {
    require __DIR__ . '/views/confirmation.php';
});
// --------------------------Confirmation--------------------------



// --------------------------Impressum--------------------------
Route::add($wildcard . '/impressum.php', function () {
    require __DIR__ . '/views/impressum.php';
});

Route::add($wildcard . '/impressum', function () {
    require __DIR__ . '/views/impressum.php';
});
// --------------------------Impressum--------------------------


// --------------------------Newsletter--------------------------
Route::add($wildcard . '/newsletter.php', function () {
    require __DIR__ . '/views/newsletter.php';
});

Route::add($wildcard . '/newsletter', function () {
    require __DIR__ . '/views/newsletter.php';
});
// --------------------------Newsletter--------------------------

Route::submit();
