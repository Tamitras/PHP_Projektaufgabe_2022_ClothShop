<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<?php if (isset($_SESSION["cart"])) : ?>

    <?php
    $sumPrice = 0.00;
    foreach ($_SESSION["cart"] as $element) {
        $sumPrice += $element->Price;
    }
    ?>

    <div class="row">
        <span class="space">
            Einkaufswagen
        </span>
        <i class="fas fa-shopping-cart pt-1 space">
            <span><?php echo count($_SESSION["cart"]) ?></span>
        </i>
        <div>
            Gesamt: <?php echo $sumPrice ?>€
        </div>
        <div>
            <?php if (isset($_SESSION["contact"])) : ?>
                <div>
                    <!--  -->
                </div>

                <input id="checkoutValue" type="hidden" name="<?php echo $_SESSION["contact"]->Name ?>">
            <?php endif; ?>
        </div>
    </div>

<?php endif ?>

<style>
    .space {
        margin-bottom: 4px;
    }
</style>