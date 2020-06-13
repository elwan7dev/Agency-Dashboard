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

    
   /*  $("#client_form").validate({
        rules: {
            title: {
                required: true
            },
            phone: {
                required: true
            },
            status: {
                required: true
            },
            desc: {
                required: true
            },
            contract_start: {
                required: true
            },
            contract_end: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Please enter client's title"
            },
            phone: {
                required: "Please enter client's phone"
            },
            status: {
                required: "Please enter client's status"
            },
            desc: {
                required: "Please enter description"
            },
            contract_start: {
                required: "Please enter contract start date"
            },
            contract_end: {
                required: "Please enter contract end date"
            }
        }
    }); */
});
