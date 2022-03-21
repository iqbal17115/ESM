@extends('layouts.ecommerce')
@section('content')
    <main class="main">
        <style>
            .product-quantity {
                margin-top: 17px;
                width: 90px;
                padding: 8px 8px;
                border-radius: 10px;
                font-size: 12px;
                display: flex;
                justify-content: space-between;
            }

        </style>
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li class="active">
                    <a href="{{ route('cart') }}">Shopping Cart</a>
                </li>
                <li>
                    <a href="{{ route('checkout') }}">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="{{ route('cart') }}">Order Complete</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col"></th>
                                    <th class="product-col">Product</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Quantity</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp
                                @if ($cardBadge['data']['products'])
                                    @php $totalPrice = $cardBadge['data']['total_price'] @endphp
                                @endif
                                @foreach ($cardBadge['data']['products'] as $productId => $product)
                                    <tr id="row_{{ $productId }}" class="product-row">
                                        <td>
                                            <figure class="product-image-container">
                                                <a href="{{ route('product-details', ['id' => $productId]) }}" class="product-image">
                                                    <img @if ($product['Info']['image']) src="{{ asset('storage/photo/' . $product['Info']['image']) }}" @endif
                                                        alt="product">
                                                </a>

                                                <a href="javascript:void(0);" class="btn-remove icon-cancel btn-product-delete" data-product-id="{{ $productId }}" title="Remove Product"></a>
                                            </figure>
                                        </td>
                                        <td class="product-col">
                                            <h5 class="product-title">
                                                <a href="product.html">

                                                    @if (strlen($product['Info']['product_name']) > 50)
                                                        {{ \Illuminate\Support\Str::limit($product['Info']['product_name'], 50) . '...' }}
                                                    @else
                                                        {{ $product['Info']['product_name'] }}
                                                    @endif

                                                </a>
                                            </h5>
                                        </td>
                                        <td>
                                            {{ $product['unit_price'] }}
                                        </td>
                                        <td data-label="সংখ্যা" class="product-quantity" style="color: black;">
                                            <div class="cart-plus float-right">
                                                <div class="cart-plus-minus input-group" data-product-id="{{ $productId }}"
                                                    data-device="desktop" style="width: 100px;">
                                                    <button class="dec qtybutton"
                                                        data-product-id="{{ $productId }}">-</button>
                                                    <input type="number" class="product_quantity product-quantity-cart form-control"
                                                        id="product_quantity_{{ $productId }}"
                                                        data-product-id="{{ $productId }}"
                                                        data-minimum-quantity="{{ $product['minimum_order_quantity'] }}"
                                                        value="{{ $product['quantity'] }}" style="width: 30px;">
                                                    <button class="inc qtybutton" data-product-id="{{ $productId }}">+</button>
                                                </div>
                                            </div>
                                            <br>
                                        </td>
                                        <td class="text-right">
                                            <span id="product_subtotal_{{ $productId }}" class="subtotal-price product-subtotal">
                                                {{ $product['total_price'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="clearfix">
                                        <div class="float-left">
                                            <div class="cart-discount">
                                                <form action="#">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Coupon Code" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-sm" type="submit">Apply
                                                                Coupon</button>
                                                        </div>
                                                    </div><!-- End .input-group -->
                                                </form>
                                            </div>
                                        </div><!-- End .float-left -->

                                        <div class="float-right">
                                            <button type="submit" class="btn btn-shop btn-update-cart">
                                                Update Cart
                                            </button>
                                        </div><!-- End .float-right -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>CART TOTALS</h3>

                        <table class="table table-totals">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>
                                        @if ($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                        @endif
                                        <span class="cart-total-price">
                                        {{ $totalPrice }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>
                                        @if ($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                        @endif
                                        0
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td>
                                        @if ($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                        @endif
                                        <span class="cart-total-price">
                                           {{ $totalPrice }}
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{ route('checkout') }}" class="btn btn-block btn-dark">Proceed to Checkout
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
        <script>
            $(".inc.qtybutton").click(function() {
                var productId = $(this).attr('data-product-id');
                var quantity = $('#product_quantity_'+productId).val();
                quantity++;
                $('#product_quantity_'+productId).val(quantity);
            });

            $(".dec.qtybutton").click(function() {
                var productId = $(this).attr('data-product-id');
                var quantity = $('#product_quantity_'+productId).val();
                quantity--;
                $('#product_quantity_'+productId).val(quantity);
            });

        </script>
    </main><!-- End .main -->
@endsection
