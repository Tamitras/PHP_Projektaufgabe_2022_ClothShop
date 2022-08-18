
export const header = (function () {
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }

    return {
        startTime: startTime,
    };
}());

export const consoleHelper = (function () {

    function log(content, type = "normal") {

        let color = "";
        switch (type) {
            case "normal":
                color = "orange";
                break;
            case "special":
                color = "yellow";
                break;
            case "error":
                color = "red";
                break;
            default:
                color = "";
                break;
        }

        console.log(`%c${new Date().toLocaleTimeString()} - ${content}`, `color:${color}`);
    }

    return {
        log: log
    };
}());