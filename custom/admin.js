$(document).ready(function() {

    $('#upload').click(function() {
        var form = $('#upload-img-form');

        console.log(form);
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
                    window.location.href = "products.php";
                }, 1000);
            }

        })
        event.preventDefault();
    })

    $('#order-decline').click(function() {
        var product = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../process/decline-order.php?id=' + product,
            dataType: 'json',
            encode: true
        }).done(function(response) {
            swal({
                title: "Success",
                text: "Order Declined",
                type: "warning",
                showCloseButton: false,
                showConfirmButton: false,
                showCancelButton: false,
                focusConfirm: false,
            })
            setTimeout(function() {
                window.location.href = "orders.php";
            }, 1000);
        })

    })

    $('#order-approved').click(function() {
        var product = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../process/approve-order.php?id=' + product,
            dataType: 'json',
            encode: true
        }).done(function(response) {

            swal({
                title: "Success",
                text: "Order Approved",
                type: "success",
                showCloseButton: false,
                showConfirmButton: false,
                showCancelButton: false,
                focusConfirm: false,
            })
            setTimeout(function() {
                window.location.href = "orders.php";
            }, 1000);
        })

    })

    $('#delete-user').click(function() {
        user = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../process/delete-user.php?id=' + user,
            dataType: 'json',
            encode: true
        }).done(function(response) {
            swal({
                title: "Success",
                text: "Profile Deleted",
                type: "success",
                showCloseButton: false,
                showConfirmButton: false,
                showCancelButton: false,
                focusConfirm: false,
            })
            setTimeout(function() {
                window.location.href = "index.php";
            }, 1000);
        })
    })

    $('#edit-profile').click(function(e) {
        var form = $('#edit-profile-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/admin-edit-user.php',
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

    $('#add-category').click(function() {

        var form = $('#add-cat-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/add-categories.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(response) {

            console.log(response);

            if (!response.success) {

                if (response.errors.catname) {
                    $('.input-cat-name').addClass('has-error'); // add the error class to show red input
                    $('.input-cat-name').append('<div class="help-block">' + response.errors.catname + '</div>'); // add the actual error message under our input
                }
                if (response.errors.identifier) {
                    $('.input-identifier').addClass('has-error'); // add the error class to show red input
                    $('.input-identifier').append('<div class="help-block">' + response.errors.identifier + '</div>'); // add the actual error message under our input
                }
                if (response.errors.duplicate) {
                    $('.input-identifier').addClass('has-error'); // add the error class to show red input
                    $('.input-identifier').append('<div class="help-block">' + response.errors.duplicate + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Category Added",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }

        })
        event.preventDefault();
    })

    $('#add-sub-category').click(function() {

        var form = $('#add-subcat-form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../process/add-sub-categories.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(response) {

            console.log(response);

            if (!response.success) {

                if (response.errors.category) {
                    $('.input-category').addClass('has-error'); // add the error class to show red input
                    $('.input-category').append('<div class="help-block">' + response.errors.category + '</div>'); // add the actual error message under our input
                }
                if (response.errors.subcatname) {
                    $('.input-subcatname').addClass('has-error'); // add the error class to show red input
                    $('.input-subcatname').append('<div class="help-block">' + response.errors.subcatname + '</div>'); // add the actual error message under our input
                }
                if (response.errors.identifier) {
                    $('.input-identifier').addClass('has-error'); // add the error class to show red input
                    $('.input-identifier').append('<div class="help-block">' + response.errors.identifier + '</div>'); // add the actual error message under our input
                }
                if (response.errors.duplicate) {
                    $('.input-identifier').addClass('has-error'); // add the error class to show red input
                    $('.input-identifier').append('<div class="help-block">' + response.errors.duplicate + '</div>'); // add the actual error message under our input
                }

            } else {
                swal({
                    title: "Success",
                    text: "Sub Category Added",
                    type: "success",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }

        })
        event.preventDefault();
    })

})