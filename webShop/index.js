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
    // Async Callback
    const error = (msg) => {
        helper.log(msg, "error");
    }

    //
    const ajaxGet = (url, action = "", param1 = "") => {

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

                if(response != "")
                {
                    refresh();
                }
            },
            error: function (msg) {
                helper.log(msg, error);
            }
        });
    }

    const refresh = () => 
    {
        $.ajax({
            url: "templates/content/shoes.php?action=ShowShoes",
            type: "GET",
            success: function (response) {
                refreshContent(response);
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

        refresh();
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
        // 1. Action
        // 2. Param
        // helper.log(`${this.searchTerm}`);
        ajaxGet("service/mainservice.php", "GetTestData", `${this.searchTerm}`);

    }
    //
    return {
        init: init,
        bodyLoaded: bodyLoaded,
        search: search,
        onchangedEvent: onchangedEvent,
        content: {
            searchTerm: "",
            shoes: []
        }
    };
}());

// Add bodyLoaded Event to global window scope
window.addEventListener('load', index.bodyLoaded);

// add module variable to global window scope as main property
window.index = index;