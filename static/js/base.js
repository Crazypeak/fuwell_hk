/**
 * Created by Mather on 2017-03-26.
 */
require.config({
    baseUrl: "/static/js",
    paths: {
        "DOM": "DOM",
        "main": "main"
    },
    waitSeconds: 15,
    shim: {}

});

requirejs(["DOM", "main"], function () {

});


