<div class="dropdownmenu-wrapper custom-scrollbar">
    <div class="dropdown-cart-header">Shopping Cart</div>
    <!-- End .dropdown-cart-header -->

    <div class="dropdown-cart-products">
        <div class="product">
            <div class="product-details">
                <h4 class="product-title">
                    <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                </h4>

                <span class="cart-product-info">
                    <span class="cart-product-qty">1</span> × $99.00
                </span>
            </div>
            <!-- End .product-details -->

            <figure class="product-image-container">
                <a href="product.html" class="product-image">
                    <img src="{{ asset('porto/assets/images/products/product-1.jpg') }}" alt="product" width="80" height="80">
                </a>

                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
            </figure>
        </div>
        <!-- End .product -->

        <div class="product">
            <div class="product-details">
                <h4 class="product-title">
                    <a href="product.html">Brown Women Casual HandBag</a>
                </h4>

                <span class="cart-product-info">
                    <span class="cart-product-qty">1</span> × $35.00
                </span>
            </div>
            <!-- End .product-details -->

            <figure class="product-image-container">
                <a href="product.html" class="product-image">
                    <img src="{{ asset('porto/assets/images/products/product-2.jpg') }}" alt="product" width="80" height="80">
                </a>

                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
            </figure>
        </div>
        <!-- End .product -->

        <div class="product">
            <div class="product-details">
                <h4 class="product-title">
                    <a href="product.html">Circled Ultimate 3D Speaker</a>
                </h4>

                <span class="cart-product-info">
                    <span class="cart-product-qty">1</span> × $35.00
                </span>
            </div>
            <!-- End .product-details -->

            <figure class="product-image-container">
                <a href="product.html" class="product-image">
                    <img src="{{ asset('porto/assets/images/products/product-3.jpg') }}" alt="product" width="80" height="80">
                </a>
                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
            </figure>
        </div>
        <!-- End .product -->
    </div>
    <!-- End .cart-product -->

    <div class="dropdown-cart-total">
        <span>SUBTOTAL:</span>

        <span class="cart-total-price float-right">$134.00</span>
    </div>
    <!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="cart.html" class="btn btn-gray btn-block view-cart">View
            Cart</a>
        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
    </div>
    <!-- End .dropdown-cart-total -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        /*$('.btn-product-delete').on('click', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDeleteMiniCart(productId)
        });*/

        $(".btn-mobile-modal").on('click', function (){

            $('.mobile-modal img').attr('src', '');
            $("#mobile-modal-product-name").html('');
            $(".mobile-modal-product-price").html('');

            var productId = $(this).attr('data-product-id');
            var productName = $(this).attr('data-product-name');
            var productPrice = $(this).attr('data-product-price');
            var productImg = $(this).attr('data-product-image');
            var productMinQty = $(this).attr('data-product-minimum-quantity');
            var productGuarantee = $(this).attr('data-product-guarantee');
            var productOrderQty = $(this).attr('data-product-quantity');
            var requestQty = productOrderQty;
            if(! productOrderQty) {
                requestQty = productMinQty;
            }

            var grandTotal = (parseFloat(requestQty) * parseFloat(productPrice))

            $('.mobile-modal img').attr('src', productImg);
            $("#mobile-modal-product-name").html(productName);
            $(".mobile-modal-product-unit-price").html(productPrice);
            $(".mobile-modal-product-quantity").val(requestQty);
            $(".mobile-modal-product-price").html(grandTotal);
            $(".mobile-modal-product-min_qty").html(productMinQty);
            $(".mobile-modal-product-gurantee").html(productGuarantee);
            $(".mobile-modal-product-quantity-label").html(requestQty);
            $(".mobile-modal-product-quantity").attr('id', 'mobile_modal_product_quantity_'+productId)
            $(".mobile-modal-product-quantity").attr('data-product-id', productId)
            $(".mobile-modal-product-quantity").attr('data-minimum-quantity', productMinQty)
            $(".mobile-modal-add-to-card").attr('data-product-id', productId)
            $(".mobile-modal-cart-plus-minus").attr('data-product-id', productId)

        })

        $(document).on('click','.btn-product-delete', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDeleteMiniCart(productId)
        });

        $(document).on('click', '.add-to-card', function () {
            // alert($(this).attr('data-product-id'))
            // Start Notification Sound
            var obj = document.createElement("audio");
            obj.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/success.mp3";
            obj.volume = 1;
            obj.autoPlay = false;
            obj.preLoad = true;
            obj.controls = true;

            // $(".add-to-card").click(function() {
              obj.play();
            // });
            // End Notification Sound
            var productId = $(this).attr('data-product-id');
            var productQuantity = 1;
            if ($("#product_quantity_"+productId).length) {
                productQuantity = parseFloat($("#product_quantity_"+productId).val());
            }

            $('.cart-total-price').html('');
            $('.cart-count').html('');
            loaderStart();
            $.ajax({
                method:'POST',
                url: '{{ route('ajax-add-to-card-store') }}',
                data: {
                    "product_id": productId,
                    "product_quantity" : productQuantity
                },
                success: function (result, text) {
                    if(result.errorStatus) {
                        alert(result.message);
                        if (result.data.hasOwnProperty('quantity')) {
                            if ($("#product_quantity_"+productId).length) {
                                $("#product_quantity_"+productId).val(result.data.quantity);
                            }
                        }
                        return false;
                    }

                    $('#total_mini_cart_amount').html(result.data.total_price)
                    $('.cart-total-price').html(result.data.total_price)
                    $('.cart-count').html(result.data.number_of_product)
                    //$("#clone_mini_cart").clone().appendTo(".minicart");
                    cloneMiniCart(result.data);
                    loaderEnd();
                },
                error: function (request, status, error) {
                    var responseText = JSON.parse(request.responseText);
                    //console.log(responseText.message)
                    var errorText = '';
                    $.each(responseText.errors, function(key, item) {
                        //console.log(key+' ---- ' +item);
                        errorText += item +'\n';
                    });

                    alert(errorText)
                }
            })
        })

        $(document).on('click', '.mobile-modal-add-to-card', function () {
            // alert($(this).attr('data-product-id'))
            // Start Notification Sound
            var obj = document.createElement("audio");
            obj.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/success.mp3";
            obj.volume = 1;
            obj.autoPlay = false;
            obj.preLoad = true;
            obj.controls = true;

            // $(".add-to-card").click(function() {
              obj.play();
            // });
            // End Notification Sound
            var productId = $(this).attr('data-product-id');
            var productQuantity = 1;
            if ($("#mobile_modal_product_quantity_"+productId).length) {
                productQuantity = parseFloat($("#mobile_modal_product_quantity_"+productId).val());
            }

            $('.cart-total-price').html('');
            $('.cart-count').html('');
            loaderStart();
            $.ajax({
                method:'POST',
                url: '{{ route('ajax-add-to-card-store') }}',
                data: {
                    "product_id": productId,
                    "product_quantity" : productQuantity
                },
                success: function (result, text) {
                    if(result.errorStatus) {
                        alert(result.message);
                        if (result.data.hasOwnProperty('quantity')) {
                            if ($("#product_quantity_"+productId).length) {
                                $("#product_quantity_"+productId).val(result.data.quantity);
                            }
                        }
                        return false;
                    }

                    $('#total_mini_cart_amount').html(result.data.total_price)
                    $('.cart-total-price').html(result.data.total_price)
                    $('.mobile-modal-product-quantity-label').html(result.data.product_card.quantity)
                    $('.mobile-modal-product-price').html(result.data.product_card.total_price)
                    $('.cart-count').html(result.data.number_of_product)
                    //$("#clone_mini_cart").clone().appendTo(".minicart");
                    cloneMiniCart(result.data)
                    loaderEnd();
                },
                error: function (request, status, error) {
                    var responseText = JSON.parse(request.responseText);
                    //console.log(responseText.message)
                    var errorText = '';
                    $.each(responseText.errors, function(key, item) {
                        //console.log(key+' ---- ' +item);
                        errorText += item +'\n';
                    });

                    alert(errorText)
                }
            })
        })

        $(document).on('blur', '.product-quantity-cart', function (){
            var productId = $(this).attr('data-product-id');
            var minOrderQty = parseFloat($(this).attr('data-minimum-quantity'))
            var productQuantity = 1;
            if ($("#product_quantity_"+productId).length) {
                productQuantity = parseFloat($("#product_quantity_"+productId).val());
            }

            if(!(productQuantity>0)){
                alert('Input minimum one quantity');
                return false;
            }

            if(!(productQuantity >= minOrderQty)){
                alert("You have to order minimum "+minOrderQty+" quantity");

                $(this).val(minOrderQty)
                productQuantity = minOrderQty;
                //return false;
            }

            $('.cart-total-price').html('');
            $('.cart-count').html('');
            loaderStart();
            $.ajax({
                method:'POST',
                url: '{{ route('ajax-add-to-card-store') }}',
                data: {
                    "product_id": productId,
                    "product_quantity" : productQuantity
                },
                success: function (result, text) {
                    if(result.errorStatus) {
                        alert(result.message);
                        if (result.data.hasOwnProperty('quantity')) {
                            if ($("#product_quantity_"+productId).length) {
                                $("#product_quantity_"+productId).val(result.data.quantity);
                            }
                        }
                        return false;
                    }

                    $('#product_subtotal_'+productId).html(result.data.product_card.total_price)
                    $('#total_mini_cart_amount').html(result.data.total_price)
                    $('.cart-total-price').html(result.data.total_price)
                    $('.cart-count').html(result.data.number_of_product)
                    //$("#clone_mini_cart").clone().appendTo(".minicart");
                    cloneMiniCart(result.data)
                    loaderEnd();
                },
                error: function (request, status, error) {
                    var responseText = JSON.parse(request.responseText);
                    //console.log(responseText.message)
                    var errorText = '';
                    $.each(responseText.errors, function(key, item) {
                        //console.log(key+' ---- ' +item);
                        errorText += item +'\n';
                    });

                    alert(errorText)
                }
            })
        });

        $('.inc.qtybutton').on('click', function () {
            // Start Notification Sound
            var obj = document.createElement("audio");
            obj.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/success.mp3";
            obj.volume = 1;
            obj.autoPlay = false;
            obj.preLoad = true;
            obj.controls = true;

            // $(".add-to-card").click(function() {
              obj.play();
            // });
            // End Notification Sound
            var productId = $(this).parent('.cart-plus-minus').attr('data-product-id');
            var device = $(this).parent('.cart-plus-minus').attr('data-device');
            //console.log($(this).parent('.cart-plus-minus').attr('data-device')) //data-device
            quantityUpdate('increase', productId, device)
        });

        $('.dec.qtybutton').on('click', function () {
            // Start Notification Sound
            var obj = document.createElement("audio");
            obj.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/success.mp3";
            obj.volume = 1;
            obj.autoPlay = false;
            obj.preLoad = true;
            obj.controls = true;

            // $(".add-to-card").click(function() {
              obj.play();
            // });
            // End Notification Sound
            var productId = $(this).parent('.cart-plus-minus').attr('data-product-id');
            var device = $(this).parent('.cart-plus-minus').attr('data-device');
            //console.log($('#product_quantity_'+productId).val())
            quantityUpdate('decrease', productId, device)
        });

        $('.wishlist-remove').on('click', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDeleteCart(productId)
        });
    })

    function cloneMiniCart(data){
        const obj = JSON.parse(data.product_card.data);

        if ($('#li_row_'+data.product_card.product_id).length > 0) {
            $('#quantity_'+data.product_card.product_id).html('');
            $('#quantity_'+data.product_card.product_id).html(+data.product_card.quantity+' X '+data.product_card.unit_price+' = '+data.product_card.total_price);
        } else {
            $(".minicart").prepend('<li class="d-flex align-items-start" id="li_row_'+data.product_card.product_id+'">' +
                '<div class="cart-img"><a href="#"><img src="{{ asset('storage/photo') }}/'+obj.image+'" alt=""></a></div>' +
                '<div class="cart-content"><h4><a href="#">'+obj.product_name+'</a></h4><div class="cart-price"><span class="new">'+obj.special_price+'</span><span><del>'+obj.regular_price+'</del></span></div><div id="quantity_'+data.product_card.product_id+'">'+data.product_card.quantity+' X '+data.product_card.unit_price+' = '+data.product_card.total_price+'</div></div>' +
                '<div class="del-icon" ><a href="javascript:void(0)" class="btn-product-delete"  data-product-id="'+data.product_card.product_id+'"><i class="far fa-trash-alt"></i></a></div>'
            );
        }
    }

    function productDeleteMiniCart(productId) {
        loaderStart();
        $.ajax({
            method:'POST',
            url: '{{ route('ajax-add-to-card-product-delete') }}',
            data: {
                "product_id" : productId
            },
            success: function (result, text) {
                if(result.errorStatus) {
                    alert(result.message);

                    return false;
                }

                $('#row_'+productId).remove();
                $('#li_row_'+productId).remove();
                $('#total_mini_cart_amount').html(result.data.data.total_price)
                $('.cart-total-price').html(result.data.data.total_price)
                $('.cart-count').html(result.data.data.number_of_product)
                loaderEnd();
            },
            error: function (request, status, error) {
                var responseText = JSON.parse(request.responseText);
                //console.log(responseText.message)
                var errorText = '';
                $.each(responseText.errors, function(key, item) {
                    //console.log(key+' ---- ' +item);
                    errorText += item +'\n';
                });

                alert(errorText)
            }
        })
    }

    function quantityUpdate(type, productId, device) {
        var productQuantity = 1;
        if(device === 'desktop') {
            if ($("#product_quantity_"+productId).length) {
                productQuantity = parseFloat($("#product_quantity_"+productId).val());
            }
        } else if (device === 'mobile') {
            if ($("#mobile_modal_product_quantity_"+productId).length) {
                productQuantity = parseFloat($("#mobile_modal_product_quantity_"+productId).val());
            }
        }
        loaderStart()
        $.ajax({
            method:'POST',
            url: '{{ route('ajax-add-to-card-quantity-update') }}',
            data: {
                "state" : type,
                "product_id" : productId,
                "quantity": productQuantity
            },
            success: function (result, text) {
                if(result.errorStatus) {
                    alert(result.message);
                    // $('#product_quantity_'+productId).val(result.data.quantity)
                    if(device == 'desktop') {
                        if ($("#product_quantity_"+productId).length) {
                            $("#product_quantity_"+productId).val(result.data.quantity);
                        }
                    } else if (device == 'mobile') {
                        if ($("#mobile_modal_product_quantity_"+productId).length) {
                            $("#mobile_modal_product_quantity_"+productId).val(result.data.quantity);
                        }
                    }
                    return false;
                }

                $('#product_subtotal_'+productId).html(result.data.product_card.total_price)
                $('.cart-total-price').html(result.data.total_price)
                $('.mobile-modal-product-quantity-label').html(result.data.product_card.quantity)
                $('.mobile-modal-product-price').html(result.data.product_card.total_price)
                $('.cart-count').html(result.data.number_of_product)
                cloneMiniCart(result.data)
                loaderEnd()
            },
            error: function (request, status, error) {
                var responseText = JSON.parse(request.responseText);
                //console.log(responseText.message)
                var errorText = '';
                $.each(responseText.errors, function(key, item) {
                    //console.log(key+' ---- ' +item);
                    errorText += item +'\n';
                });

                alert(errorText)
            }
        })
    }

    function productDeleteCart(productId) {
        loaderStart();
        $.ajax({
            method:'POST',
            url: '{{ route('ajax-add-to-card-product-delete') }}',
            data: {
                "product_id" : productId
            },
            success: function (result, text) {
                if(result.errorStatus) {
                    alert(result.message);

                    return false;
                }

                $('#row_'+productId).remove();
                $('#li_row_'+productId).remove();
                $('#total_mini_cart_amount').html(result.data.data.total_price)
                $('.cart-total-price').html(result.data.data.total_price)
                $('.cart-count').html(result.data.data.number_of_product)
                loaderEnd();
            },
            error: function (request, status, error) {
                var responseText = JSON.parse(request.responseText);
                //console.log(responseText.message)
                var errorText = '';
                $.each(responseText.errors, function(key, item) {
                    //console.log(key+' ---- ' +item);
                    errorText += item +'\n';
                });

                alert(errorText)
            }
        })
    }

    function loaderStart() {
        // alert('request start');
        $('#loader').addClass("hide-loader");
    }

    function loaderEnd() {
        // alert('request end');
        $('#loader').addClass("hide-loader");
        // console.log(true);
    }

</script>
