$(function() {
    "use strict";

    // Confirmation Message on Button
    $(".confirm").click(function() {
        return confirm("Are You Sure?");
    });

    
   /*  // dynamic active cals
    $("#topheader .navbar-nav a").on( 'click', function() {
        $("#topheader .navbar-nav")
            .find("li.active")
            .removeClass("active");
        $(this)
            .parent("li")
            .addClass("active");
    }); */
    
});
