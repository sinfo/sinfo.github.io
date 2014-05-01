$(document).ready(function() {

    //smooth scrolling
    $.localScroll({
        queue: true,
        duration: 1000,
        hash: true,
        offset: {
            top: parseInt($("header").css("height")) * -1,
            left: 0
        }
    });

    //navbar
    Ink.requireModules(['Ink.UI.Sticky_1'], function(Sticky) {
        new Sticky('header')
    });

    $("#nav").find("a").on("click", function(event) {
        $("#nav").find("li").removeClass("active");
        $(event.target).parent().addClass("active");
    });

    if ($(location).attr("hash")) {
        $("#nav").find("li").removeClass("active");
        $("#nav").find("a[href=" + $(location).attr("hash") + "]").parent().addClass("active");
    }

    //table
    var rows = $("tbody").find("tr").not(".prices");
    var infobox = $("#infobox");

    infobox.find(".info").hide();

    rows.first().addClass("selected");
    infobox.find("#" + rows.first()[0].id + "-info").show();

    rows.on("mouseenter", function(event) {
        rows.removeClass("selected");
        infobox.find(".info").hide();

        var row = $(event.target).parent();
        row.addClass("selected");
        infobox.find("#" + row[0].id + "-info").show();
    });
});
