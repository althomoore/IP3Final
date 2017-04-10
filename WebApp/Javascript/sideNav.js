$(function () {
    var wrapper = $(".wrapper"),
        toggle = $(".toggle"),
        table = $("#mainTable"),
        table2 = $("#distTable"),
        nav = $(".side-nav");
    toggle.on("click", function () {
        wrapper.toggleClass("nav-open");
        table.toggleClass("noShadow");
        table2.toggleClass("noShadow");
        // Change the font-awesome icons on click.
        toggle.toggleClass("fa-bars");
        toggle.toggleClass("fa-times");
    });
});