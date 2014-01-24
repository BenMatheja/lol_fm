// grab an element
var myelem = document.querySelector("header");

// construct an instance of Headroom, passing the element
var headroom = new Headroom(myelem, {
    "tolerance": 5,
    "offset": 205,
    "classes": {
        "initial": "animated",
        "pinned": "slideDown",
        "unpinned": "slideUp"
    }
});;

// initialise
headroom.init();