    <div class="container-fluid sticky-top mb-3" style="background-color: rgb(19 25 33)">

        <div class="row pb-2 pt-1 align-items-center text-white">
            <div class="col-2 d-flex justify-content-start flex-fixed-width-item" style="padding-left: 0px;">
                <div class="buttonNoSelect ml-0 pl-0">
                    <img src="/webShop/assets/Header/logo.svg" width="auto" height="80">
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
                <form action="" class="flex-grow-1">
                    <div class="input-group">
                        <input id="searchInput" oninput="index.onchangedEvent()" type="text" class="form-control form-control-lg" placeholder="Suche nach Produkt">
                        <button  onclick="index.search(this.value)" class="input-group-text btn-success bg-danger">
                            <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <!-- <div class="col"></div> -->
            <div class="col-2 d-flex buttonNoSelect flex-fixed-width-item">Letzte Bestellung!?</div>
            <div class="col-2 d-flex buttonNoSelect flex-fixed-width-item">Warenkorb</div>
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

        <div class="row align-items-center bg-white border-bottom">
            <div class="col-5 d-flex justify-content-center">
                <span class="text-black">
                    1-24 von mehr als 30.000 Ergebnissen oder Vorschlägen für "hdmi kabel"
                </span>
            </div>

            <!-- Space -->
            <div class="col-4"></div>


            <div class="col d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Sortieren
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Nach Bewertung</a></li>
                        <li><a class="dropdown-item" href="#">Aufsteigend</a></li>
                        <li><a class="dropdown-item" href="#">Absteigend</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


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