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

// import data0 from './plz/0xxxx.json';
// import data1 from './plz/1xxxx.json';
// import data2 from './plz/2xxxx.json';
// import data3 from './plz/3xxxx.json';
// import data4 from './plz/4xxxx.json';
// import data5 from './plz/5xxxx.json';
// import data6 from './plz/6xxxx.json';
// import data7 from './plz/7xxxx.json';

//
export const index = (function () {

    $('#cartHead').click(function () {
        redirect("cart.php");
    });

    // $('#plz').change(function () {
    //     alert("");
    // });

    $("#plz").on("input", function () {
        var value = $("#plz")[0].value;

        if (value.length > 4) {
            console.log("Suche nach Städten");

            var json = []

            fetch('./plz/0xxxx.json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error("HTTP error " + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    // console.log(data);

                    var city = data[value];
                    
                    if(city)
                    {
                        var cityName = city["PLZ-ONAME"];
                        $("#city").val(cityName)
                    }
                })
                .catch(function () {
                    this.dataError = true;
                })

        }
    });

    function redirect(path) {

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

            window.location.href = newPathName + path;
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