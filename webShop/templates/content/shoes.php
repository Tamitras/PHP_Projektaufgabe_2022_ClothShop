<?php

// Ließt Daten aus der Sessionvariable
if (isset($_SESSION['name'])) {
    echo "Name: " . $_SESSION['name'];
}
?>


<?php  for ($x = 0; $x <= 10; $x++) { ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-xxl-3 col-lg-6 col-xl-4">
    <div class="card m-2 p-3" style="border-radius:25px;">
        <div class="col border-3 buttonNoSelect">
            <img style="background: black; border-radius:25px;" src="assets/Shoes/orange.svg" class="card-img-top p-3">
        </div>
        <div class="col">

            <div class="card-body">
                <h5 class="card-title">Orange Shoes</h5>
                <p class="card-text">Orange shoes directly from the moon</p>
                <a href="#" class="btn btn-primary">Details</a>
                <a href="#" class="btn btn-success">In den Warenkorb</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php

?>