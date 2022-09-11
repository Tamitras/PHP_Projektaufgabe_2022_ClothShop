<?php

require __DIR__ . '/head.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
?>

<body id="body">
    <section>
        <div class="container-fluid sticky-top mb-3" style="background-color: rgb(19 25 33)">

            <div class="row pb-2 pt-1 align-items-center text-white" style="height: 120px;">
                <div id="mainLogo" onclick="index.getHome()" class="col-2 d-flex justify-content-start flex-fixed-width-item" style="padding-left: 0px;">
                    <div class="buttonNoSelect ml-0 pl-0">
                        <img src="views/images/logo.svg" width="auto" height="80">
                    </div>
                </div>
                <div class="col-2 col-offset-2 d-flex justify-content-center buttonNoSelect flex-fixed-width-item">
                    <div class="row">
                        <div class="col-12">Aktuelle Uhrzeit</div>
                        <div id="clock" class="col-12 clock text-white"></div>
                    </div>
                </div>

                <!-- Searchbar -->
                <div class="col d-flex justify-content-center">
                    <div class="flex-grow-1">
                        <div class="input-group">
                            <input id="searchInput" oninput="index.onchangedEvent()" type="text" class="form-control form-control-lg" placeholder="Suche nach Produkt">
                            <button onclick="index.search(this.value)" class="input-group-text btn-success bg-danger">
                                <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>

                <!-- ShoppingCart -->
                <div id="cartHead" class="p-2 m-1 me-2 d-flex flex-fixed-width-item">
                    <?php include 'cartHead.php'; ?>
                </div>
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

            <div class="box">
                <img class="bgimg" src="./views/images/bgIMG.jpg">
            </div>
        </div>

    </section>
</body>

<script>
    //Jquery hover effects

    //MainLogo
    $("#mainLogo").mouseover(function() {
        $("#mainLogo").css("cursor", "pointer");
    }).mouseout(function() {
        $("#mainLogo").css("border", "").css("cursor", "");
    });

    //cartHead
    $("#cartHead").mouseover(function() {
        $("#cartHead").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#cartHead").css("border", "").css("cursor", "");
    });

    //NavBarHerren
    $("#NavBarHerren").mouseover(function() {
        $("#NavBarHerren").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#NavBarHerren").css("border", "").css("cursor", "");
    });

    //NavBarDamen
    $("#NavBarDamen").mouseover(function() {
        $("#NavBarDamen").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#NavBarDamen").css("border", "").css("cursor", "");
    });

    //NavBarKids
    $("#NavBarKids").mouseover(function() {
        $("#NavBarKids").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#NavBarKids").css("border", "").css("cursor", "");
    });

    //NavBarAccessoires
    $("#NavBarAccessoires").mouseover(function() {
        $("#NavBarAccessoires").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#NavBarAccessoires").css("border", "").css("cursor", "");
    });

    //NavBarExplore
    $("#NavBarExplore").mouseover(function() {
        $("#NavBarExplore").css("border", "1px solid white").css("cursor", "pointer");
    }).mouseout(function() {
        $("#NavBarExplore").css("border", "").css("cursor", "");
    });
</script>

<style>
    .clock {
        font-size: 30px;
        font-family: Orbitron;
        letter-spacing: 7px;
    }

    .flex-fixed-width-item {
        flex: 0 0 160px;
    }
</style>

<style type="text/css">
    .bgimg {
        /* max-width: 100%;
        max-height: 100%;
        display: block; */
        width: inherit;
        /* remove extra space below image */
    }
    .box
    {
        width: inherit;
    }
</style>