$(document).ready(function() {

    $('#login-form').submit(function(event) {
        var loginForm = $('#login-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: 'process/login-user.php',
            data: loginForm.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(data) {
            console.log(data);

            if (!data.success) {

                if (data.errors.username) {
                    $('.input-username').addClass('has-error'); // add the error class to show red input
                    $('.input-username').append('<div class="help-block">' + data.errors.username + '</div>'); // add the actual error message under our input
                }

                if (data.errors.password) {
                    $('.input-password').addClass('has-error'); // add the error class to show red input
                    $('.input-password').append('<div class="help-block">' + data.errors.password + '</div>'); // add the actual error message under our input
                }

                if (data.errors.login) {
                    swal({
                        title: "Login Failed!",
                        text: data.errors.login,
                        type: "error",
                        confirmButtonClass: "btn-raised btn-danger",
                        confirmButtonText: "OK"
                    })
                }
            } else {
                if (data.user == 'Farmer') {
                    window.location.href = "farmer/index.php";
                }
                if (data.user == 'Owner') {
                    window.location.href = "owner/index.php";
                }
            }
        })
        event.preventDefault();

    })

    // process the form
    $('#registration-form').submit(function(event) {

        var form = $('#registration-form')

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // process the form
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'process/register-user.php', // the url where we want to POST
                data: form.serialize(), // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true
            })
            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data);
                // here we will handle errors and validation messages
                if (!data.success) {

                    if (data.errors.user_type) {
                        $('.input-usertype').addClass('has-error'); // add the error class to show red input
                        $('.input-usertype').append('<div class="help-block">' + data.errors.user_type + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for name ---------------
                    if (data.errors.username) {
                        $('.input-username').addClass('has-error'); // add the error class to show red input
                        $('.input-username').append('<div class="help-block">' + data.errors.username + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.usernameduplicate) {
                        $('.input-username').addClass('has-error'); // add the error class to show red input
                        $('.input-username').append('<div class="help-block">' + data.errors.usernameduplicate + '</div>'); // add the actual error message under our input
                        swal({
                            title: "Username Already Exist",
                            text: "Please select another one",
                            type: "error",
                            confirmButtonClass: "btn-raised btn-warning",
                            confirmButtonText: "OK"
                        })
                    }

                    // handle errors for email ---------------
                    if (data.errors.email) {
                        $('.input-email').addClass('has-error'); // add the error class to show red input
                        $('.input-email').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.emailduplicate) {
                        $('.input-email').addClass('has-error'); // add the error class to show red input
                        $('.input-email').append('<div class="help-block">' + data.errors.emailduplicate + '</div>'); // add the actual error message under our input
                        swal({
                            title: "Email Already Exist",
                            text: "Please select another one",
                            type: "error",
                            confirmButtonClass: "btn-raised btn-warning",
                            confirmButtonText: "OK"
                        })
                    }

                    // handle errors for password ---------------
                    if (data.errors.password) {
                        $('.input-password').addClass('has-error'); // add the error class to show red input
                        $('.input-password').append('<div class="help-block">' + data.errors.password + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for cpassword ---------------
                    if (data.errors.cpassword) {
                        $('.input-cpassword').addClass('has-error'); // add the error class to show red input
                        $('.input-cpassword').append('<div class="help-block">' + data.errors.cpassword + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for remember me ---------------
                    if (data.errors.terms) {
                        $('.input-terms').addClass('has-error'); // add the error class to show red input
                        $('.input-terms').append('<div class="help-block">' + data.errors.terms + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.fname) {
                        $('.input-fname').addClass('has-error'); // add the error class to show red input
                        $('.input-fname').append('<div class="help-block">' + data.errors.fname + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.lname) {
                        $('.input-lname').addClass('has-error'); // add the error class to show red input
                        $('.input-lname').append('<div class="help-block">' + data.errors.lname + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.gender) {
                        $('.input-gender').addClass('has-error'); // add the error class to show red input
                        $('.input-gender').append('<div class="help-block">' + data.errors.gender + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.birthday) {
                        $('.input-birthday').addClass('has-error'); // add the error class to show red input
                        $('.input-birthday').append('<div class="help-block">' + data.errors.birthday + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.contact) {
                        $('.input-contact').addClass('has-error'); // add the error class to show red input
                        $('.input-contact').append('<div class="help-block">' + data.errors.contact + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.barangay) {
                        $('.input-barangay').addClass('has-error'); // add the error class to show red input
                        $('.input-barangay').append('<div class="help-block">' + data.errors.barangay + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.city) {
                        $('.input-city').addClass('has-error'); // add the error class to show red input
                        $('.input-city').append('<div class="help-block">' + data.errors.city + '</div>'); // add the actual error message under our input
                    }

                    if (data.errors.province) {
                        $('.input-province').addClass('has-error'); // add the error class to show red input
                        $('.input-province').append('<div class="help-block">' + data.errors.province + '</div>'); // add the actual error message under our input
                    }

                } else {
                    // sweetAlert({
                    //     title: "Oops!",
                    //     text: "Something went wrong on the page!",
                    //     type: "error"
                    // })
                    // setTimeout(function() {
                    //     window.location.href = "index.php";
                    // }, 2000);
                    swal({
                        title: 'Registration Successful',
                        type: 'success',
                        html: 'This page will redirect to Login Page after 5 seconds.<br>Or click this ' +
                            '<a href="index.php">link</a> ' +
                            '<br>Thank You',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                    })
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 5000);

                }
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});