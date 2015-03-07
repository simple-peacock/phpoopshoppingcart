/**
 * main.js
 * Our main JavaScript file
 */

// jQuery function to fade out the alert message when items are added to cart
//$(document).ready(function () {
//
//    $(".alert").delay(700).fadeOut();
//
//});

$(document).ready(function() {
    if (window.location.hash) {
        $('#alert_placeholder').html('<div class="alert alert-success" role="alert">Product has been added!</div>').delay(700).fadeOut();
    }

});



function postData(action, id) {

    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: {action: action, id: id},
        dataType: 'text',
        success: function(response) {
            console.log(response);

            window.location = window.location + "#success";

            // window.location.reload();

            // $('#alert_placeholder').html('<div class="alert alert-success" role="alert">Product has been added!</div>').delay(700).fadeOut();



        },
        error: function() {
            console.log('There was an error sending the message');
        }
    });

}