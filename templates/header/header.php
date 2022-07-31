<html>

<body>
    <div class="container">
        <div>

        </div>
        <div class="logo">
            <!-- logo -->
            <img src="/../img/Header/passt_oder_passt_nicht_logo.jpg" alt="">
        </div>
        <div class="head_right_side">

            <div class="search2">
                <form  class="search" method="get" action="/index.php/de/artikelsuche">
                    <input type="hidden" name="ProdSearch" value="1">
                    <input name="Search_free" id="_freeb_middle" autocomplete="off" placeholder="Produkt suchen">
                    <button type="submit" alt="Suche starten" title="Suche starten" id="doSearch" name="doSearch">
                        <span class="faicon fa fa-search"></span>
                    </button>
                </form>
            </div>

            <div class="warenkorb">
                <!-- Warenkorb -->
                Warenkorb
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://use.fontawesome.com/43573797bc.js"></script>

<style>
    .logo {}

    .head_right_side {
        align-self: flex-end;
        border: solid red 1px;

    }

    .search {
        display: grid;
        border: 1px solid black;
        grid-template-columns: 85% 15%;
        grid-column-gap: 1px;
        margin-bottom: 20px;
    }

    .warenkorb {}

    .container {
        display: grid;
        border: 1px solid black;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 5px;
        /* e.g. 
      1fr 1fr
      minmax(10px, 1fr) 3fr
      repeat(5, 1fr)
      50px auto 100px 1fr
  */
        grid-template-rows: 1fr
            /* e.g. 
      min-content 1fr min-content
      100px 1fr max-content
  */
    }
</style>