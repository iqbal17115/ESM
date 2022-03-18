<div class="dropdown-cart-products">
@foreach ($cardBadge['data']['products'] as $productId => $product)
            <div class="product"  id="li_row_{{ $productId }}">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="product.html">
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
                    <a href="#" class="product-image">
                        <img @if ($product['Info']['image']) src="{{ asset('storage/photo/' . $product['Info']['image']) }}" @endif alt="product" width="80" height="80">
                    </a>

                    <a href="javascript:void(0);" class="btn-remove btn-product-delete" data-product-id="{{ $productId }}" title="Remove Product"><span>×</span></a>
                </figure>
            </div>
            <!-- End .product -->
        @endforeach
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ route('cart') }}" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                    @include('ecommerce.frontend_js')