<html>

<head>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body onload="bodyLoaded()">

    <div>
        <!-- Header -->
        <div id="header"></div>
    </div>
    <div>
        <!-- Content -->
    </div>


</body>

</html>

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