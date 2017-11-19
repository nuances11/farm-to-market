$(document).ready(function() {

    $('#place-orders').click(function() {
        $.ajax({
            type: 'POST',
            url: 'transact.php',
            dataType: 'json',
            encode: true
        }).done(function(data) {
            if (data.success) {
                swal({
                    title: 'Transaction Successful',
                    type: 'success',
                    html: 'Thank you for ordering, please wait for 2-5 days. <br>Or click this ' +
                        '<a href="invoice.php?id=' + data.trans_id + '">link</a> to view your invoice' +
                        '<br><small>After 10 seconds it will redirect to your dashboard.</small>',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 10000);
            }
        })
    })

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

    $('.update-item').click(function() {
        var targetId = $(this).data('id');

        $('span[data-id=' + targetId + ']').addClass('hidden');
        $('div[data-id=' + targetId + ']').removeClass('hidden');

        console.log(targetId);
        /* $('#prod_val').addClass('hidden');
        $('.update-form').removeClass('hidden'); */
    })


    $('#item-minus').click(function() {
        var qty = parseInt($('#product_qty').val());
        var total_qty = 0;
        if (qty > 1) {
            total_qty = qty - 1;
            $('#product_qty').val(total_qty);
            console.log(total_qty);
        }

    })
    $('#item-plus').click(function() {
        var qty = parseInt($('#product_qty').val());
        var total_qty = 0;
        var limit = $('#product_qty').data('limit');
        console.log(limit);
        if (qty < limit) {
            total_qty = qty + 1;
            $('#product_qty').val(total_qty);
        } else {
            swal({
                title: "Stock Limit",
                text: "You can't order more that the product's stock quantity!",
                type: "warning",
                showCloseButton: false,
                showConfirmButton: true,
                showCancelButton: false,
                focusConfirm: false,
            })
            return;
        }
    })

    $('#add-to-cart').submit(function(event) {
        var cart = $('#add-to-cart');
        console.log(cart);

        $.ajax({
            type: 'POST',
            url: 'addtocart.php',
            data: cart.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(data) {
            console.log(data);
            if (!data.success) {
                alert('Error adding products');
            } else {
                location.reload();
            }
        })

        event.preventDefault();
    })

    $('#itemslider').carousel({ interval: 3000 });

    $('.carousel-showmanymoveone .item').each(function() {
        var itemToClone = $(this);

        for (var i = 1; i < 6; i++) {
            itemToClone = itemToClone.next();

            if (!itemToClone.length) {
                itemToClone = $(this).siblings(':first');
            }

            itemToClone.children(':first-child').clone()
                .addClass("cloneditem-" + (i))
                .appendTo($(this));
        }
    });

    //Product Grid
    // Lift card and show stats on Mouseover
    $('#product-card').hover(function() {
        $(this).addClass('animate');
        $('div.carouselNext, div.carouselPrev').addClass('visible');
    }, function() {
        $(this).removeClass('animate');
        $('div.carouselNext, div.carouselPrev').removeClass('visible');
    });

    // Flip card to the back side
    $('#view_details').click(function() {
        $('div.carouselNext, div.carouselPrev').removeClass('visible');
        $('#product-card').addClass('flip-10');
        setTimeout(function() {
            $('#product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo(80, 1, function() {
                $('#product-front, #product-front div.shadow').hide();
            });
        }, 50);

        setTimeout(function() {
            $('#product-card').removeClass('flip90').addClass('flip190');
            $('#product-back').show().find('div.shadow').show().fadeTo(90, 0);
            setTimeout(function() {
                $('#product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
                setTimeout(function() {
                    $('#product-card').css('transition', '100ms ease-out');
                    $('#cx, #cy').addClass('s1');
                    setTimeout(function() { $('#cx, #cy').addClass('s2'); }, 100);
                    setTimeout(function() { $('#cx, #cy').addClass('s3'); }, 200);
                    $('div.carouselNext, div.carouselPrev').addClass('visible');
                }, 100);
            }, 100);
        }, 150);
    });

    // Flip card back to the front side
    $('#flip-back').click(function() {

        $('#product-card').removeClass('flip180').addClass('flip190');
        setTimeout(function() {
            $('#product-card').removeClass('flip190').addClass('flip90');

            $('#product-back div.shadow').css('opacity', 0).fadeTo(100, 1, function() {
                $('#product-back, #product-back div.shadow').hide();
                $('#product-front, #product-front div.shadow').show();
            });
        }, 50);

        setTimeout(function() {
            $('#product-card').removeClass('flip90').addClass('flip-10');
            $('#product-front div.shadow').show().fadeTo(100, 0);
            setTimeout(function() {
                $('#product-front div.shadow').hide();
                $('#product-card').removeClass('flip-10').css('transition', '100ms ease-out');
                $('#cx, #cy').removeClass('s1 s2 s3');
            }, 100);
        }, 150);

    });


    /* ----  Image Gallery Carousel   ---- */

    var carousel = $('#carousel ul');
    var carouselSlideWidth = 335;
    var carouselWidth = 0;
    var isAnimating = false;

    // building the width of the casousel
    $('#carousel li').each(function() {
        carouselWidth += carouselSlideWidth;
    });
    $(carousel).css('width', carouselWidth);

    // Load Next Image
    $('div.carouselNext').on('click', function() {
        var currentLeft = Math.abs(parseInt($(carousel).css("left")));
        var newLeft = currentLeft + carouselSlideWidth;
        if (newLeft == carouselWidth || isAnimating === true) { return; }
        $('#carousel ul').css({
            'left': "-" + newLeft + "px",
            "transition": "300ms ease-out"
        });
        isAnimating = true;
        setTimeout(function() { isAnimating = false; }, 300);
    });

    // Load Previous Image
    $('div.carouselPrev').on('click', function() {
        var currentLeft = Math.abs(parseInt($(carousel).css("left")));
        var newLeft = currentLeft - carouselSlideWidth;
        if (newLeft < 0 || isAnimating === true) { return; }
        $('#carousel ul').css({
            'left': "-" + newLeft + "px",
            "transition": "300ms ease-out"
        });
        isAnimating = true;
        setTimeout(function() { isAnimating = false; }, 300);
    });
});