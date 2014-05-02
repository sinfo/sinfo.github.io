$(document).ready(function() {

    //smooth scrolling
    $.localScroll({
        queue: true,
        duration: 1000,
        hash: true,
        offset: {
            top: parseInt($("#topbar").css("height")) * -1,
            left: 0
        }
    });

    //table
    var rows = $("tbody").find("tr").not(".prices");
    var infobox = $("#infobox");

    infobox.find(".info").hide();

    rows.first().addClass("selected");
    infobox.find("#" + rows.first()[0].id + "-info").show();

    var action = function(event) {
        rows.removeClass("selected");
        infobox.find(".info").hide();

        var row = $(event.target).parent();
        row.addClass("selected");
        infobox.find("#" + row[0].id + "-info").show();
    };

    rows.on("click", action);
    rows.on("mouseenter", action);
});
