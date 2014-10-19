var components = {
    "packages": [
        {
            "name": "bootstrap",
            "main": "bootstrap-built.js"
        },
        {
            "name": "foundation",
            "main": "foundation-built.js"
        },
        {
            "name": "jquery",
            "main": "jquery-built.js"
        },
        {
            "name": "modernizr",
            "main": "modernizr-built.js"
        },
        {
            "name": "typeaheadjs",
            "main": "typeaheadjs-built.js"
        },
        {
            "name": "select2",
            "main": "select2-built.js"
        }
    ],
    "shim": {
        "bootstrap": {
            "deps": [
                "jquery"
            ]
        },
        "foundation": {
            "exports": "window.Foundation",
            "deps": [
                "jquery",
                "modernizr"
            ]
        },
        "modernizr": {
            "exports": "window.Modernizr"
        }
    },
    "baseUrl": "components"
};
if (typeof require !== "undefined" && require.config) {
    require.config(components);
} else {
    var require = components;
}
if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = components;
}