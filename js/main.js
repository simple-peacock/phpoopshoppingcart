/**
 * Created by Peter on 4/03/2015.
 */

// jQuery function to fade out the alert message when items are added to cart
$(document).ready(function () {

    $(".alert").delay(700).fadeOut();

});



function postData(action, id) {

    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: {action: action, id: id},
        dataType: 'text',
        success: function(response) {
            console.log(response);

        },
        error: function() {
            console.log('There was an error sending the message');
        }
    });

    // $('#myModal').modal('hide');
}