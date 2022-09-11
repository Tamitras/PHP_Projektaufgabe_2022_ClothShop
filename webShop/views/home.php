<?php
function autoload($className)
{
    require_once "Models/Shoe.php";
}

spl_autoload_register('autoload');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/header.php';
?>

<?php
$servername = "localhost"; /* 127.0.0.01:3306 */
$username = "root";
$password = "root";
$dbname = "clothshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Shoe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    //  TestDataSection
    if (!isset($_SESSION["shoes"])) {
        $_SESSION["shoes"] = array();
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["Id"] . " - Name: " . $row["Name"] . " " . $row["Description"] . "<br>";
            array_push(
                $_SESSION["shoes"],
                new Shoe($row["Id"], $row["Name"], $row["Price"], $row["Description"], $row["Src"]),
            );
        }
    }
    else{
        // Shoes bereits in der Session
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<section class="content">
    <div class="row">
        <?php if (isset($_SESSION["shoes"]) && count($_SESSION["shoes"]) > 0) : ?>

            <?php foreach ($_SESSION["shoes"] as $shoe) : ?>

                <div class="col-xs-12 col-sm-12 col-md-6 col-xxl-3 col-lg-6 col-xl-4">
                    <div class="card m-2 p-3" style="border-radius:25px;">
                        <div class="col border-3 buttonNoSelect">
                            <img style="background: black; border-radius:25px;" src='<?php echo $shoe->Src ?>' class="card-img-top p-3">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div hidden><?php $shoe->Id ?></div>
                                <h5 class="card-title">Titel: <?php echo $shoe->Name ?></h5>
                                <p class="card-text">Beschreibung: <?php echo $shoe->Description ?> </p>
                                <p class="card-text">Preis: <?php echo $shoe->Price ?> €</p>
                                <a hidden href="#" class="btn btn-primary">Details</a>
                                <button id="btnAddToCart" onclick="index.addOrRemoveCartItem('<?php echo $shoe->Id ?>', 'AddToCart');" class="btn btn-success">In den Warenkorb</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
</section>

<!-- ==================================== -->
<section class="call-to-action bg-gray section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="title">
                    <h2>SUBSCRIBE TO NEWSLETTER</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                </div>
                <div class="col">
                    <div class="input-group subscription-form">
                        <input type="text" class="form-control" placeholder="Enter Your Email Address">
                        <span class="input-group-btn">
                            <button class="btn btn-main" type="button">Subscribe Now!</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- End section -->

<?php
require __DIR__ . '/footer.php';
?>