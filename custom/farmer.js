$(document).ready(function() {

    $('#save-product').click(function(event) {

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
        event.preventDefault();
    })

})