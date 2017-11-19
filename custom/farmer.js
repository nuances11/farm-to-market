$(document).ready(function() {

    $('#change-pass').click(function(event) {
        var form = $('#change-pass-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/change-pass.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(response) {

            console.log(response);

            if (!response.success) {

                if (response.errors.oldpass) {
                    $('.input-oldpass').addClass('has-error'); // add the error class to show red input
                    $('.input-oldpass').append('<div class="help-block">' + response.errors.oldpass + '</div>'); // add the actual error message under our input
                }
                if (response.errors.invalid) {
                    $('.input-oldpass').addClass('has-error'); // add the error class to show red input
                    $('.input-oldpass').append('<div class="help-block">' + response.errors.invalid + '</div>'); // add the actual error message under our input
                }
                if (response.errors.newpass) {
                    $('.input-newpass').addClass('has-error'); // add the error class to show red input
                    $('.input-newpass').append('<div class="help-block">' + response.errors.newpass + '</div>'); // add the actual error message under our input
                }
                if (response.errors.cpass) {
                    $('.input-cpass').addClass('has-error'); // add the error class to show red input
                    $('.input-cpass').append('<div class="help-block">' + response.errors.cpass + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Password Updated",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 1000);
            }

        })
        event.preventDefault();
    })

    $('#edit-profile').click(function(e) {
        var form = $('#edit-profile-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/edit-profile.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(response) {
            console.log(response);

            if (!response.success) {

                if (response.errors.username) {
                    $('.input-username').addClass('has-error'); // add the error class to show red input
                    $('.input-username').append('<div class="help-block">' + response.errors.username + '</div>'); // add the actual error message under our input
                }
                if (response.errors.email) {
                    $('.input-email').addClass('has-error'); // add the error class to show red input
                    $('.input-email').append('<div class="help-block">' + response.errors.email + '</div>'); // add the actual error message under our input
                }
                if (response.errors.firstname) {
                    $('.input-firstname').addClass('has-error'); // add the error class to show red input
                    $('.input-firstname').append('<div class="help-block">' + response.errors.firstname + '</div>'); // add the actual error message under our input
                }
                if (response.errors.middlename) {
                    $('.input-middlename').addClass('has-error'); // add the error class to show red input
                    $('.input-middlename').append('<div class="help-block">' + response.errors.middlename + '</div>'); // add the actual error message under our input
                }
                if (response.errors.lastname) {
                    $('.input-lastname').addClass('has-error'); // add the error class to show red input
                    $('.input-lastname').append('<div class="help-block">' + response.errors.lastname + '</div>'); // add the actual error message under our input
                }
                if (response.errors.contact) {
                    $('.input-contact').addClass('has-error'); // add the error class to show red input
                    $('.input-contact').append('<div class="help-block">' + response.errors.contact + '</div>'); // add the actual error message under our input
                }
                if (response.errors.street) {
                    $('.input-street').addClass('has-error'); // add the error class to show red input
                    $('.input-street').append('<div class="help-block">' + response.errors.street + '</div>'); // add the actual error message under our input
                }
                if (response.errors.barangay) {
                    $('.input-barangay').addClass('has-error'); // add the error class to show red input
                    $('.input-barangay').append('<div class="help-block">' + response.errors.barangay + '</div>'); // add the actual error message under our input
                }
                if (response.errors.city) {
                    $('.input-city').addClass('has-error'); // add the error class to show red input
                    $('.input-city').append('<div class="help-block">' + response.errors.city + '</div>'); // add the actual error message under our input
                }
                if (response.errors.province) {
                    $('.input-province').addClass('has-error'); // add the error class to show red input
                    $('.input-province').append('<div class="help-block">' + response.errors.province + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Profile Updated",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 1000);
            }

        })
        e.preventDefault();
    })

    $('#save-product').click(function(s) {

        var form = $('#product-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/add-product.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(data) {

            console.log(data);

            if (!data.success) {

                if (data.errors.name) {
                    $('.input-productname').addClass('has-error'); // add the error class to show red input
                    $('.input-productname').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                }
                if (data.errors.category) {
                    $('.input-productcategory').addClass('has-error'); // add the error class to show red input
                    $('.input-productcategory').append('<div class="help-block">' + data.errors.category + '</div>'); // add the actual error message under our input
                }
                if (data.errors.subcategory) {
                    $('.input-productsubcategory').addClass('has-error'); // add the error class to show red input
                    $('.input-productsubcategory').append('<div class="help-block">' + data.errors.subcategory + '</div>'); // add the actual error message under our input
                }
                if (data.errors.description) {
                    $('.input-productdescription').addClass('has-error'); // add the error class to show red input
                    $('.input-productdescription').append('<div class="help-block">' + data.errors.description + '</div>'); // add the actual error message under our input
                }
                if (data.errors.sku) {
                    $('.input-productsku').addClass('has-error'); // add the error class to show red input
                    $('.input-productsku').append('<div class="help-block">' + data.errors.sku + '</div>'); // add the actual error message under our input
                }
                if (data.errors.price) {
                    $('.input-productprice').addClass('has-error'); // add the error class to show red input
                    $('.input-productprice').append('<div class="help-block">' + data.errors.price + '</div>'); // add the actual error message under our input
                }
                if (data.errors.quantity) {
                    $('.input-productquantity').addClass('has-error'); // add the error class to show red input
                    $('.input-productquantity').append('<div class="help-block">' + data.errors.quantity + '</div>'); // add the actual error message under our input
                }
                if (data.errors.minquantity) {
                    $('.input-productminquantity').addClass('has-error'); // add the error class to show red input
                    $('.input-productminquantity').append('<div class="help-block">' + data.errors.minquantity + '</div>'); // add the actual error message under our input
                }
                if (data.errors.status) {
                    $('.input-productstatus').addClass('has-error'); // add the error class to show red input
                    $('.input-productstatus').append('<div class="help-block">' + data.errors.status + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Product Created",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    window.location.href = "product-list.php";
                }, 1000);
            }

        })
        s.preventDefault();
    })

    $('#update-product').click(function(event) {

        var form = $('#edit-product-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/edit-product.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(data) {

            console.log('yes');

            if (!data.success) {

                if (data.errors.name) {
                    $('.input-productname').addClass('has-error'); // add the error class to show red input
                    $('.input-productname').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                }
                if (data.errors.category) {
                    $('.input-productcategory').addClass('has-error'); // add the error class to show red input
                    $('.input-productcategory').append('<div class="help-block">' + data.errors.category + '</div>'); // add the actual error message under our input
                }
                if (data.errors.subcategory) {
                    $('.input-productsubcategory').addClass('has-error'); // add the error class to show red input
                    $('.input-productsubcategory').append('<div class="help-block">' + data.errors.subcategory + '</div>'); // add the actual error message under our input
                }
                if (data.errors.description) {
                    $('.input-productdescription').addClass('has-error'); // add the error class to show red input
                    $('.input-productdescription').append('<div class="help-block">' + data.errors.description + '</div>'); // add the actual error message under our input
                }
                if (data.errors.sku) {
                    $('.input-productsku').addClass('has-error'); // add the error class to show red input
                    $('.input-productsku').append('<div class="help-block">' + data.errors.sku + '</div>'); // add the actual error message under our input
                }
                if (data.errors.price) {
                    $('.input-productprice').addClass('has-error'); // add the error class to show red input
                    $('.input-productprice').append('<div class="help-block">' + data.errors.price + '</div>'); // add the actual error message under our input
                }
                if (data.errors.quantity) {
                    $('.input-productquantity').addClass('has-error'); // add the error class to show red input
                    $('.input-productquantity').append('<div class="help-block">' + data.errors.quantity + '</div>'); // add the actual error message under our input
                }
                if (data.errors.minquantity) {
                    $('.input-productminquantity').addClass('has-error'); // add the error class to show red input
                    $('.input-productminquantity').append('<div class="help-block">' + data.errors.minquantity + '</div>'); // add the actual error message under our input
                }
                if (data.errors.status) {
                    $('.input-productstatus').addClass('has-error'); // add the error class to show red input
                    $('.input-productstatus').append('<div class="help-block">' + data.errors.status + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Product Created",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    window.location.href = "product-list.php";
                }, 1000);
            }

        })
        event.preventDefault();
    })

})