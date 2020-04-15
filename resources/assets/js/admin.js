/*
 * Copyright (c) 2020.  Rahul Singh - All Rights Reserved
 *  Unauthorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *  Author : Rahul Singh rahulsingh4041@gmail.com, @itxrahulsingh
 */

// For Admin Side Nav
(function ($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#Sidenav_nav .sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
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

// // Check Admin Current Password Valid or not Settings Change Password
// $(document).ready(function () {
//
//     $("#current_pwd").keyup(function () {
//         const current_pwd = $("#current_pwd").val();
//         // alert(current_pwd);
//         $.ajax({
//             type: 'post',
//             url: '/admin/check-currentPwd',
//             data: {current_pwd: current_pwd},
//             //success Response
//             success: function (resp) {
//
//                 // response is false
//                 if (resp == false) {
//                     $("#feedback").html("<font color=red>Password is incorrect</font>");
//                     $('#current_pwd').addClass('is-invalid');
//                     $('#current_pwd').removeClass('is-valid');
//
//                 // response is true
//                 } else if (resp == true) {
//                     $('#current_pwd').removeClass('is-invalid');
//                     $('#current_pwd').addClass('is-valid');
//                     $("#feedback").html("<font color=green>Password is correct</font>");
//                 }
//                 //Failed Response
//             }, error: function () {
//                 alert("not getting response from this route");
//             }
//         })
//     })
//
// });
