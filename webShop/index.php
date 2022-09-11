<?php
// Einbinden einer anderen php datei
require __DIR__ . '/router.php';

//Zugriff auf die Klassenfunktionalität
$fullPathSubStrings = explode("\\", __DIR__);
$rootPathSubStrings = explode("/", $_SERVER["DOCUMENT_ROOT"]);

// print "<pre>";
// echo "fullPathSubStrings";
// var_dump($fullPathSubStrings);
// print "</pre>";

// print "<pre>";
// print $_SERVER["DOCUMENT_ROOT"];
// print "</pre>";


// print "<pre>";
// echo "Inside loop";
// echo "Anzahl rootPathSubStrings" . count($rootPathSubStrings);
// print "</pre>";

// print "<pre>";
// echo "Anzahl fullPathSubStrings" . count($fullPathSubStrings);
// print "</pre>";


$wildcard = "";
for ($x = count($rootPathSubStrings); $x < count($fullPathSubStrings); $x++) {
    $wildcard .= "/" . $fullPathSubStrings[$x];
}

// echo $wildcard;

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

Route::add($wildcard . '/cart', function () {
    require __DIR__ . '/views/cart.php';
});

Route::add($wildcard . '/cart.php', function () {
    require __DIR__ . '/views/cart.php';
});

Route::add($wildcard . '/contact.php', function () {
    require __DIR__ . '/views/contact.php';
});

Route::add($wildcard . '/contact', function () {
    require __DIR__ . '/views/contact.php';
});

Route::add($wildcard . '/confirmation.php', function () {
    require __DIR__ . '/views/confirmation.php';
});

Route::add($wildcard . '/confirmation', function () {
    require __DIR__ . '/views/confirmation.php';
});

Route::submit();
