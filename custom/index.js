$(document).ready(function() {

    // process the form
    $('#form-register').submit(function(event) {

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'username': $('#username').val(),
            'email': $('#email').val(),
            'password': $('#password').val(),
            'cpassword': $('#cpassword').val(),
            'remember': $('#remember').val()
        };

        // process the form
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'process/register.php', // the url where we want to POST
                data: formData, // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true
            })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {

                    // handle errors for name ---------------
                    if (data.errors.username) {
                        $('#username-input').addClass('has-error'); // add the error class to show red input
                        $('#username-input').append('<div class="help-block">' + data.errors.username + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for email ---------------
                    if (data.errors.email) {
                        $('#email-input').addClass('has-error'); // add the error class to show red input
                        $('#email-input').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for password ---------------
                    if (data.errors.password) {
                        $('#password-input').addClass('has-error'); // add the error class to show red input
                        $('#password-input').append('<div class="help-block">' + data.errors.password + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for cpassword ---------------
                    if (data.errors.cpassword) {
                        $('#cpassword-input').addClass('has-error'); // add the error class to show red input
                        $('#cpassword-input').append('<div class="help-block">' + data.errors.cpassword + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for remember me ---------------
                    if (data.errors.remember) {
                        $('#remember-input').addClass('has-error'); // add the error class to show red input
                        $('#remember-input').append('<div class="help-block">' + data.errors.remember + '</div>'); // add the actual error message under our input
                    }

                }
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});