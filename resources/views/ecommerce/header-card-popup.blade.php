    <div class="dropdown-cart-products">
        @foreach ($cardBadge['data']['products'] as $productId => $product)
            <div class="product"  id="li_row_{{ $productId }}">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="{{ route('product-details', ['id' => $productId]) }}">
                            @if (strlen($product['Info']['product_name']) > 20)
                                {{ substr($product['Info']['product_name'], 0, 19) . '...' }}
                            @else
                                {{ $product['Info']['product_name'] }}
                            @endif
                        </a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{ $product['quantity'] }}</span> × {{ $product['unit_price'] }}
                    </span>
                </div>
                <!-- End .product-details -->

                <figure class="product-image-container">
                    <a href="{{ route('product-details', ['id' => $productId]) }}" class="product-image">
                        <img @if ($product['Info']['image']) src="{{ asset('storage/photo/' . $product['Info']['image']) }}" @endif alt="product" width="80" height="80">
                    </a>

                    <a href="javascript:void(0);" class="btn-remove btn-product-delete" data-product-id="{{ $productId }}" title="Remove Product"><span>×</span></a>
                </figure>
            </div>
            <!-- End .product -->
        @endforeach
    </div>
    <!-- End .cart-product -->

    <div class="dropdown-cart-total">
        <span>SUBTOTAL:</span>

        <span class="cart-total-price float-right" id="total_mini_cart_amount">
            @if ($currencySymbol)
                {{ $currencySymbol->symbol }}
            @endif
            {{ $cardBadge['data']['total_price'] }}
        </span>
    </div>
    <!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="{{ route('cart') }}" class="btn btn-gray btn-block view-cart">View
            Cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-dark btn-block">Checkout</a>
    </div>
    <!-- End .dropdown-cart-totalhhfhjdfhjdfhdf -->

@include('ecommerce.optional_js')
