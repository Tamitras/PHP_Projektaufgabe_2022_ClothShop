<?php
function autoload($className)
{
    require_once "Models/Contact.php";
}

spl_autoload_register('autoload');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/header.php';
?>


<section class="content">

</section>


<?php
require __DIR__ . '/footer.php';
?>