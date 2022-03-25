@extends('layouts.ecommerce')
@section('content')
<main class="main home">
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
    <div class="container-fluid p-0">
        <div class="row m-0">
            <!-- <div class="sidebar-overlay"></div> -->

            {{-- Start Aside --}}
            @include('ecommerce.aside')
            {{-- End Aside --}}

            <div class="col-lg-9">
                <div class="main-content">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav font2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('search-category-wise') }}">Product</a></li>
                        </ol>
                    </nav>

                    <div class="product-single-container product-single-default">
                        <div class="cart-message d-none">
                            @if($productDetails->name)
                                <strong class="single-cart-notice">{{$productDetails->name}}</strong>
                                <span>has been added to your cart.</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xl-5 col-md-6 product-single-gallery">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                        @foreach ($productDetails->ProductImages as $productImage)
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="{{ asset('storage/photo/'.$productImage->image) }}"
                                                data-zoom-image="{{ asset('storage/photo/'.$productImage->image) }}"
                                                width="468" height="468" alt="product" />
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>

                                <div class="prod-thumbnail owl-dots">
                                    @foreach ($productDetails->ProductImages as $productImage)
                                    <div class="owl-dot">
                                        <img src="{{ asset('storage/photo/'.$productImage->image) }}" width="110"
                                            height="110" alt="product-thumbnail" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End .product-single-gallery -->

                            <div class="col-xl-7 col-md-6 product-single-details">
                                <h1 class="product-title">
                                    @if(strlen($productDetails->name)>50)
                                    {{\Illuminate\Support\Str::limit($productDetails->name, 50).'...'}}
                                    @else
                                    {{ $productDetails->name }}
                                    @endif
                                </h1>

                                <div class="product-nav">
                                    <div class="product-prev">
                                        <a href="#">
                                            <span class="product-link"></span>

                                            <span class="product-popup">
                                                <span class="box-content">
                                                    <img alt="product" width="150" height="150"
                                                        src="assets/images/products/product-3.jpg"
                                                        style="padding-top: 0px;">

                                                    <span>Circled Ultimate 3D Speaker</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>

                                    <div class="product-next">
                                        <a href="#">
                                            <span class="product-link"></span>

                                            <span class="product-popup">
                                                <span class="box-content">
                                                    <img alt="product" width="150" height="150"
                                                        src="assets/images/products/product-4.jpg"
                                                        style="padding-top: 0px;">

                                                    <span>Blue Backpack for the Young</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <hr class="short-divider">

                                <div class="price-box">
                                    @if($productDetails->special_price)
                                    <span class="h3">
                                        {{ intval((($productDetails->regular_price - $productDetails->special_price) * 100)/$productDetails->regular_price) }}%
                                    </span>
                                    <br>
                                    <span class="old-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->regular_price }}
                                    </span>
                                    <span class="product-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->special_price }}
                                    </span>
                                    @else
                                    <span class="product-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->regular_price }}
                                    </span>
                                    @endif
                                    <br>
                                    <span class="product-price">
                                        <span style="font-size: 14px;">
                                          Total:
                                        </span>
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        <span id="product_subtotal_{{ $productDetails->id }}" class="product-subtotal" style="font-size: 14px;">
                                           {{ $productDetails->regular_price }}
                                        </span>
                                    </span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-desc ls-0 font2">
                                    <p>
                                        @if($productDetails->ProductInfo)
                                        {!! $productDetails->ProductInfo->long_description !!}
                                        @endif
                                    </p>
                                </div>
                                <!-- End .product-desc -->

                                <ul class="single-info-list font2">
                                    <li>
                                        CATEGORIES:
                                        <strong>
                                            <a href="{{ route('search-category-wise',['id'=>$productDetails->Category->id]) }}" class="product-category">
                                                {{$productDetails->Category->name}}
                                            </a>
                                        </strong>
                                    </li>
                                </ul>

                                <div class="product-action">
                                    <div class="product-single-qty product-quantity" data-product-id="{{ $productDetails->id }}">
                                        @php
                                            $productQuantity = isset($cardBadge['data']['products'][$productDetails->id]['quantity']) ? $cardBadge['data']['products'][$productDetails->id]['quantity'] : 0;
                                        @endphp
                                        {{-- <input
                                        class="horizontal-quantity form-control product_quantity"
                                        id="product_quantity_{{ $productDetails->id }}"
                                        data-minimum-quantity="{{ $productDetails->min_order_qty }}"
                                        value="{{ $productQuantity ? $productQuantity : $productDetails->min_order_qty }}"
                                        type="text"> --}}
                                        <div class="cart-plus float-right">
                                            <div class="cart-plus-minus" data-product-id="{{ $productDetails->id }}"
                                                data-device="desktop">
                                                {{-- <button class="dec qtybutton"
                                                    data-product-id="{{ $productDetails->id }}">-</button> --}}
                                                <input type="text" class="horizontal-quantity form-control product_quantity product-quantity-cart"
                                                    id="product_quantity_{{ $productDetails->id }}"
                                                        data-minimum-quantity="{{ $productDetails->min_order_qty }}"
                                                        value="{{ $productQuantity ? $productQuantity : $productDetails->min_order_qty }}">
                                                {{-- <button class="inc qtybutton" data-product-id="{{ $productDetails->id }}">+</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End .product-single-qty -->

                                    <a
                                    href="javascript:void(0);"
                                    class="btn btn-dark add-cart add-to-card buy-now buy-now-button mr-2"
                                    data-product-id="{{ $productDetails->id }}"
                                    title="Add to Cart">
                                        Add to Cart
                                    </a>

                                </div>
                                <!-- End .product-action -->

                                <hr class="divider mb-0 mt-0">

                                <div class="product-single-share icon-with-color mb-2 mt-2">
                                    <label class="sr-only">Share:</label>

                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook" target="_blank"
                                            title="Facebook">
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon social-linkedin" target="_blank"
                                            title="Linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                        <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                            <i class="icon-mail-alt"></i>
                                        </a>
                                    </div>
                                    <!-- End .social-icons -->
                                </div>
                                <!-- End .product single-share -->
                            </div>
                            <!-- End .product-single-details -->
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-single-container -->

                    <div class="product-single-tabs font2">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                    href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                                aria-labelledby="product-tab-desc">
                                <div class="product-desc-content">
                                    <p>{!! $productDetails->ProductInfo->short_description !!}</p>
                                    <p>{!! $productDetails->ProductInfo->long_description !!}</p>
                                    <p>{!! $productDetails->ProductInfo->meta_description !!}</p>
                                </div>
                                <!-- End .product-desc-content -->
                            </div>
                            <!-- End .tab-pane -->

                        </div>
                        <!-- End .tab-content -->
                    </div>
                    <!-- End .product-single-tabs -->

                    <div class="products-section pt-0">
                        <h2 class="section-title pb-3">Related Products</h2>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                            'dots': true,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 3
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '992': {
                                    'items': 4
                                },
                                '1500': {
                                    'items': 6
                                }
                            }
                        }">
                            @foreach ($data['products'] as $product)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$product['id']])}}">
                                        <img @if($product['product_image_first'])
                                            src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                                            @else src="{{ asset('image-not-available.jpg')}}" @endif
                                            width="205"
                                            height="205"
                                            id="ProductImage"
                                            alt="product">
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo40-shop.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">
                                            @if(strlen($product['name'])>50)
                                            {{\Illuminate\Support\Str::limit($product['name'], 50).'...'}}
                                            @else
                                            {{ $product['name'] }}
                                            @endif
                                        </a>
                                    </h3>

                                    <div class="price-box">
                                        @if($product['special_price'])
                                        <span class="old-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['regular_price'] }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['special_price'] }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['regular_price'] }}
                                        </span>
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <div class="product-action mt-1">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple product-type-simple-mobile add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}" style="background-color: #346aff; color: white; font-weight: bold;">
                                           <i class="icon-shopping-cart"></i><span>ADD TO CART</span>
                                    </a>
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </div>
                    <!-- End .products-section -->

                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- footer-area -->
                    @include('ecommerce.footer')
                    <!-- footer-area-end -->
                    <!-- End .footer -->
                </div>
            </div>
        </div>
    </div>
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
</main>
@endsection
