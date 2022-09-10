<?php if (isset($_SESSION["cart"])) : ?>

    <?php
    $sumPrice = 0.00;
    foreach ($_SESSION["cart"] as $element) {
        $sumPrice += $element->Price;
    }
    ?>

    <div class="row">
        <span>
            Einkaufswagen
        </span>
        <i class="fas fa-shopping-cart pt-1">
            <span><?php echo count($_SESSION["cart"]) ?></span>
        </i>
        <div class="col">
            Gesamt: <?php echo $sumPrice ?>€
        </div>
    </div>
    
<?php endif ?>