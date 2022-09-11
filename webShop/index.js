/*
Mehr Informationen über Module Pattern:
    https://blog.mayflower.de/4392-JS-Module-Pattern.html
    https://javascript.plainenglish.io/data-hiding-with-javascript-module-pattern-62b71520bddd

*/

//
import {
    header as head,
    consoleHelper as helper
} from "./js/header.js";

//
export const index = (function () {

    $('#cartHead').click(function () {
        redirect("cart.php");
    });

    function checkout() {
        // const value = $("#checkoutValue")[0].value;

        var el = $('#checkoutValue')

        if (el.length > 0) {


            if (el[0].name.trim()) {
                redirect("confirmation.php", true);
            }
            else {
                redirect("contact.php");
            }
        }
        else{
            redirect("contact.php");
        }
    }


    $("#plz").on("input", function () {
        const value = $("#plz")[0].value;

        if (value.length > 4) {
            console.log("Suche nach Städten");
            const startNumber = value[0];

            let json = []

            fetch(`./plz/${startNumber}xxxx.json`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("HTTP error " + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    var cityObject = data[value];

                    if (cityObject) {
                        var cityName = cityObject["PLZ-ONAME"];
                        $("#city").val(cityName)
                    }
                })
                .catch(function () {
                    this.dataError = true;
                })
        }
        else {
            $("#city").val("");
        }
    });

    function redirect(path, newTab = false) {

        if (window.location.href[window.location.href.length - 1].includes("/")) {
            window.location.href += path;
        }
        else {

            var substrings = window.location.href.split("/");
            var newPathName = "";
            substrings.forEach((element, index) => {
                if (index != substrings.length - 1) {
                    newPathName += element + "/";
                }
            });

            if (newTab) {
                window.open(newPathName + path, "_blank");
            }
            else {

                window.location.href = newPathName + path;
            }
        }
    }

    const refreshHead = () => {
        $.ajax({
            type: "POST",
            url: "service/mainservice.php",
            data: { action: 'RefreshHeadCart' },
            success: function (response) {
                $("#cartHead").html(response);
            },
            error: function (msg) {
                helper.log(msg, "error");
            }
        }).done(function (msg) {
            //helper.log(msg, "normal");
        });
    }

    function addOrRemoveCartItem(index, type = "RemoveFromCart") {

        $.ajax({
            type: "POST",
            url: "service/mainservice.php",
            data: { action: type, param1: index },
            success: function (response) {
                // helper.log(response, "special");

                if (response == "1") {
                    // Refresh
                    refreshHead();

                    if (type == "RemoveFromCart") {
                        redirect("cart.php");
                    }
                }
            },
            error: function (msg) {
                helper.log(msg, "error");
            }
        }).done(function (msg) {
            helper.log(msg, "normal");
        });
    }


    //
    function bodyLoaded() {
        // Initialize
        helper.log("Initialize Webshop");

        // run Clock
        helper.log("Run Clock");
        head.startTime();
    }

    //
    function onchangedEvent() {
        if (searchInput && searchInput.value) {
            this.searchTerm = searchInput.value;
        }
    }

    function getHome() {
        redirect("home.php");
    }

    //
    return {
        bodyLoaded: bodyLoaded,
        getHome: getHome,
        redirect: redirect,
        checkout: checkout,
        addOrRemoveCartItem: addOrRemoveCartItem,
        onchangedEvent: onchangedEvent,
        content: {
            searchTerm: "",
        }
    };
}());

// Add bodyLoaded Event to global window scope
window.addEventListener('load', index.bodyLoaded);

// add module variable to global window scope as main property
window.index = index;