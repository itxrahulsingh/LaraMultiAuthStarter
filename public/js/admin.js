/*
 * Copyright (c) 2020.  Rahul Singh - All Rights Reserved
 *  Unauthorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *  Author : Rahul Singh rahulsingh4041@gmail.com, @itxrahulsingh
 */

// For Admin Side Nav
(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#Sidenav_nav .sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
    });


})(jQuery);


// For Form Validation

(function () {
    "use strict";
    window.addEventListener("load", function () {
        const form = document.getElementById("needs-validation");
        form.addEventListener("submit", function (event) {
            if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    }, false);
}());

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


