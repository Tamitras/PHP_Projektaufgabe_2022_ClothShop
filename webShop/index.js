/*
Mehr Informationen über Module Pattern:

    https://blog.mayflower.de/4392-JS-Module-Pattern.html
    https://javascript.plainenglish.io/data-hiding-with-javascript-module-pattern-62b71520bddd

*/

//
import {
    header as head,
    consoleHelper as helper
} from "./templates/header/header.js";

//
export const index = (function () {
    //
    const searchInput = document.getElementById('searchInput');

    // Async Callback
    const success = (response) => {
        helper.log(response);
    }

    const refreshContent = (response) => {
        $("#content").html(response);
    }

    const refreshHead = (response) => {
        console.log("refreshCard_HEAD", response);
        $("#cartHead").html(response);
    }
    // Async Callback
    const error = (msg) => {
        helper.log(msg, "error");
    }

    //
    const ajaxGet = (url, action = "", param1 = "", type = "shoes") => {

        if (url == null) {
            url = "service/mainservice.php";
        }

        if (action != null) {
            action = `?action=${action}`;
            if (param1) {
                param1 = `&param1=${param1}`;
            }
        }
        else {
            action = "";
            param1 = "";
        }

        url = url + action + param1;

        $.ajax({
            // url: "service/mainservice.php?action=" + `${action}` + "&param1=" + `${param1}`,
            url: url,
            type: "GET",
            success: function (response) {
                success(response);

                if (response == "1") {
                    refresh(type);
                }
            },
            error: function (msg) {
                helper.log(msg, error);
            }
        });
    }

    function addToCart(index) {
        ajaxGet("service/mainservice.php", "AddToCart", `${index}`, `cart`);
    }

    function refresh(type) {
        let url = "";
        switch (type) {
            case "shoes":
                url = "templates/content/shoes.php?action=ShowShoes";
                break;

            case "cart":
                url = "templates/content/cart.php?action=ShowCart";
                break;

            case "cartHead":
                url = "templates/content/cart.php?action=RefreshHeadCart";
                break;

            default:
                url = "templates/content/shoes.php?action=ShowShoes";
                break;
        }

        console.log("Url: ", url);

        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {

                console.log("RefreshByType", type);

                if (type == "cart") {
                    refresh("cartHead");
                }
                else if (type == "cartHead") {
                    refreshHead(response);
                }
                else {
                    refreshContent(response);
                }
            },
            error: function (msg) {
                helper.log(msg, error);
            }
        });
    }

    //
    function init() {
        helper.log("Initialize Webshop");

        // run Clock
        helper.log("Run Clock");
        head.startTime();

        // load initial data
        ajaxGet("service/mainservice.php", "GetTestData", ``, "shoes");
    }

    //
    function bodyLoaded() {
        init();
    }

    //
    function onchangedEvent() {
        if (searchInput && searchInput.value) {
            this.searchTerm = searchInput.value;
        }
    }

    //
    function search() {
        ajaxGet("service/mainservice.php", "GetTestData", `${this.searchTerm}`, "shoes");
    }
    //
    return {
        init: init,
        bodyLoaded: bodyLoaded,
        search: search,
        refresh: refresh,
        addToCart: addToCart,
        onchangedEvent: onchangedEvent,
        content: {
            searchTerm: "",
            shoes: [],
        }
    };
}());

// Add bodyLoaded Event to global window scope
window.addEventListener('load', index.bodyLoaded);

// add module variable to global window scope as main property
window.index = index;