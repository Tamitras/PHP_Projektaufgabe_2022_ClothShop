<?php
require "Models/Shoe.php";
require __DIR__ . '/head.php';

//  TestDataSection
$_SESSION["shoes"] = array();
$_SESSION["cart"] = array();

array_push(
    $_SESSION["shoes"],
    new Shoe(1, "Schuh1", 19.99, "Schuh der nicht passen wird", "views\images\shoes\blue.svg"),
    new Shoe(2, "Schuh2", 24.99, "Schmerzt schon beim Ansehen", "views/images/shoes/green.svg"),
    new Shoe(3, "Schuh3", 18.99, "Schmerzt schon beim Ansehen", "views/images\shoes\blue.svg"),
    new Shoe(4, "Schuh4", 14.95, "Schmerzt schon beim Ansehen", "views/images/shoes/pink.svg"),
    new Shoe(5, "Schuh5", 99.99, "Schmerzt schon beim Ansehen", "views/images/shoes/blue.svg"),
);

?>

<body id="body">
    <section>
        <div class="container-fluid sticky-top mb-3" style="background-color: rgb(19 25 33)">

            <div class="row pb-2 pt-1 align-items-center text-white">
                <div id="mainLogo" onclick="index.search(this.value)" class="col-2 d-flex justify-content-start flex-fixed-width-item" style="padding-left: 0px;">
                    <div class="buttonNoSelect ml-0 pl-0">
                        <img src="views/images/logo.svg" width="auto" height="80">
                    </div>
                </div>
                <div class="col-2 col-offset-2 d-flex justify-content-center buttonNoSelect flex-fixed-width-item">
                    <!-- <div class="text-white" id="clock"></div> -->
                    <div class="row">
                        <div class="col-12">Aktuelle Uhrzeit</div>
                        <div id="clock" class="col-12 clock text-white"></div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <!-- Searchbar -->
                    <div class="flex-grow-1">
                        <div class="input-group">
                            <input id="searchInput" oninput="index.onchangedEvent()" type="text" class="form-control form-control-lg" placeholder="Suche nach Produkt">
                            <button onclick="index.search(this.value)" class="input-group-text btn-success bg-danger">
                                <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>

                <div id="cartHead" class="col-3 p-n1 me-2 d-flex flex-fixed-width-item"></div>
            </div>

            <div id="navBar" class="row align-items-center text-white pt-1 pb-1" style="background-color: rgb(35 47 62); height:41px;">
                <div id="NavBarHerren" class="col-1 d-flex justify-content-center pt-1 pb-1">
                    <a class="text-white text-decoration-none">Herren</a>
                </div>
                <div id="NavBarDamen" class="col-1 d-flex justify-content-center pt-1 pb-1">
                    <a class="text-white text-decoration-none">Damen</a>
                </div>
                <div id="NavBarKids" class="col-1 d-flex justify-content-center pt-1 pb-1">
                    <a class="text-white text-decoration-none">Kids</a>
                </div>
                <div id="NavBarAccessoires" class="col-1 d-flex justify-content-center pt-1 pb-1">
                    <a class="text-white text-decoration-none">Accessoires</a>
                </div>

                <!-- Space -->
                <div class="col-4"></div>


                <div id="NavBarExplore" class="col d-flex justify-content-center pt-1 pb-1">
                    <a class="text-white text-decoration-none"><b>Entdecke unsere Vielfalt | WomanShoe</b></a>
                </div>
            </div>
        </div>

    </section>
</body>

<script>
    const mainLogoEl = $("#mainLogo");

    mainLogoEl.mouseover(function() {
        mainLogoEl.css("cursor", "pointer");
    });
    mainLogoEl.mouseout(function() {
        mainLogoEl.css("border", "").css("cursor", "");
    });
</script>

<script aria-details="cartHead">
    const elCart = $("#cartHead");
    elCart.mouseover(function() {
        elCart.css("border", "1px solid white").css("cursor", "pointer");
    });
    elCart.mouseout(function() {
        elCart.css("border", "").css("cursor", "");
    });

    elCart.click(() => {
        // Bei Click auf elCart
        // Zeige den kompletten Warenkorb im Content an
        // Ajax call an php
        index.refresh("cart");
    });
</script>

<script aria-details="NavBarHerren">
    const elHerren = $("#NavBarHerren");

    elHerren.mouseover(function() {
        elHerren.css("border", "1px solid white").css("cursor", "pointer");
    });
    elHerren.mouseout(function() {
        elHerren.css("border", "").css("cursor", "");
    });
</script>
<script aria-details="NavBarDamen">
    const elDamen = $("#NavBarDamen");

    elDamen.mouseover(function() {
        elDamen.css("border", "1px solid white").css("cursor", "pointer");
    });
    elDamen.mouseout(function() {
        elDamen.css("border", "").css("cursor", "");
    });
</script>

<script aria-details="NavBarKids">
    const elKids = $("#NavBarKids");

    elKids.mouseover(function() {
        elKids.css("border", "1px solid white").css("cursor", "pointer");
    });
    elKids.mouseout(function() {
        elKids.css("border", "").css("cursor", "");
    });
</script>

<script aria-details="NavBarAccessoires">
    const elAccessoires = $("#NavBarAccessoires");

    elAccessoires.mouseover(function() {
        elAccessoires.css("border", "1px solid white").css("cursor", "pointer");
    });
    elAccessoires.mouseout(function() {
        elAccessoires.css("border", "").css("cursor", "");
    });
</script>

<script aria-details="NavBarExplore">
    const elExplore = $("#NavBarExplore");

    elExplore.mouseover(function() {
        elExplore.css("border", "1px solid white").css("cursor", "pointer");
    });
    elExplore.mouseout(function() {
        elExplore.css("border", "").css("cursor", "");
    });
</script>

<style>
    #navBar>.col>a:hover {
        /* border: 1px solid white; */
        /* cursor: pointer; */
    }

    .clock {
        /* position: relative; */
        /* top: 50%; */
        /* left: 50%; */
        /* transform: translateX(-50%) translateY(-50%); */
        /* color: #17D4FE !important; */
        font-size: 30px;
        font-family: Orbitron;
        letter-spacing: 7px;
    }

    .flex-fixed-width-item {
        flex: 0 0 120px;
    }
</style>