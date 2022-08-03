<html>

<head>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body onload="bodyLoaded()">

    <div class="MainContainer">

        <!-- Header -->
        <div id="header"></div>
        <!-- Content -->
        <div class="content"></div>
    </div>

</body>

</html>

<style>
    body {
        /* overrides the default 8px margin  */
        margin: 0 !important;
        background-color: rgb(41, 37, 44);
    }

    .MainContainer {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr
    }

    .content
    {
        background-color: rgb(41, 37, 44);
    }
</style>

<script>
    // Rendert den Header (Logo, Warenkorb etc)
    $(function() {
        $("#header").load("/../templates/header/header.php");
    });

    function bodyLoaded() {

        // /../ --> navigates one level back or up 
        // in this case from /index to /root(htdocs)
        let url = "/../service/mainservice.php?action=test";

        $.ajax({
            url: url,
            type: "GET",
            // data: "test",
            // contentType: false,
            // cache: false,
            // processData: false,
            success: function(response) {
                // alert(response);
                console.log("url", url);
            }
        });

    }
</script>