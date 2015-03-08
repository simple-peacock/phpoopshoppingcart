/**
 * main.js
 * Our main JavaScript file
 */


function postData(action, id) {

    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: {action: action, id: id},
        dataType: 'text',
        success: function(response) {

            // for debugging
            // console.log(response);

            location.reload();
        },
        error: function() {
            console.log('There was an error in this request');
        }
    });
}

$(document).ready(function () {

    $(".alert").delay(700).fadeOut();

});