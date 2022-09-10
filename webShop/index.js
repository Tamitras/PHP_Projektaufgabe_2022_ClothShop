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
    //
    const searchInput = document.getElementById('searchInput');
    $('#cartHead').click(function () {
        redirect("/cart.php");
    });

    function redirect(path) {
        if (!window.location.href.includes(path));
        {
            window.location.href = path;
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
            helper.log(msg, "normal");
        });
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
                    if (action.includes("Add")) {
                        refresh("cartHead");
                    }
                    else if (action.includes("Remove")) {
                        refresh("cartHead");
                        refresh("cart");
                    }
                    else {
                        refresh(type);
                    }
                }
            },
            error: function (msg) {
                helper.log(msg, error);
            }
        });
    }

    function addToCart(index) {
        // console.log("addToCart:", index);

        $.ajax({
            type: "POST",
            url: "service/mainservice.php",
            data: { action: 'AddToCart', param1: index },
            success: function (response) {
                helper.log(response, "special");

                if (response == "1") {
                    // Refresh
                    refreshHead();
                }
            },
            error: function (msg) {
                helper.log(msg, "error");
            }
        }).done(function (msg) {
            helper.log(msg, "normal");
        });
    }

    function removeFromCart(id) {
        console.log("removeFromCart:", id);
        ajaxGet("service/mainservice.php", "RemoveFromCart", `${id}`, `cart`);
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

            default:
                url = "templates/content/shoes.php?action=ShowShoes";
                break;
        }

        console.log("Url: ", url);

        $.ajax({
            url: url,
            type: "POST",
            success: function (response) {

                // console.log("RefreshByType", type);

                switch (type) {
                    case "shoes":
                        refreshContent(response);
                        refresh("cartHead");
                        break;

                    case "cart":
                        refreshContent(response);
                        break;

                    default:
                        break;
                }
            },
            error: function (msg) {
                helper.log(msg, error);
            }
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

    //
    function search() {
        // filter data
        ajaxGet("service/mainservice.php", "GetTestData", `${this.searchTerm}`, "shoes");
    }

    function getHome() {

        redirect("/home.php");
    }

    //
    return {
        bodyLoaded: bodyLoaded,
        search: search,
        getHome: getHome,
        refresh: refresh,
        redirect:redirect,
        addToCart: addToCart,
        removeFromCart: removeFromCart,
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