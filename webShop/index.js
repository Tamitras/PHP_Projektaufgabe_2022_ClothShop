
/*
Mehr Informationen über Module Pattern:

    https://blog.mayflower.de/4392-JS-Module-Pattern.html
    https://javascript.plainenglish.io/data-hiding-with-javascript-module-pattern-62b71520bddd

*/

//
import { header as head, consoleHelper as helper } from "./templates/header/header.js";

//
export const index = (function () {
    //
    const searchInput = document.getElementById('searchInput');

    // Async Callback
    const success = (response) => {
        helper.log(response);
    }
    // Async Callback
    const error = (msg) => {
        helper.log(msg, "error");
    }

    //
    const ajaxGet = (action, param1) => {

        $.ajax({
            url: "service/mainservice.php?action=" + `${action}` + "&param1=" + `${param1}`,
            type: "GET",
            success: function (response) {
                success(response);
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
        ajaxGet("GetTestData", `${this.searchTerm}`);
    }
    //
    return {
        init: init,
        bodyLoaded: bodyLoaded,
        search: search,
        onchangedEvent: onchangedEvent,
        content:
        {
            searchTerm: "",
            shoes: []
        }
    };
}());

// Add bodyLoaded Event to global window scope
window.addEventListener('load', index.bodyLoaded);

// add module variable to global window scope as main property
window.index = index;