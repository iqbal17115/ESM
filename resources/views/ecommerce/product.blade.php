@extends('layouts.ecommerce')
@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>

                                    <div class="product-label label-sale">
                                        -16%
                                    </div>
                                </div>

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                 @foreach ($productDetails->ProductImages as $productImage)
                                    <div class="product-item">
                                        <img class="product-single-image"
                                            src="{{ asset('storage/photo/'.$productImage->image) }}"
                                            data-zoom-image="{{ asset('storage/photo/'.$productImage->image) }}" width="468"
                                            height="468" alt="product" />
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
                                    <img src="{{ asset('storage/photo/'.$productImage->image) }}" width="110" height="110"
                                        alt="product-thumbnail" />
                                </div>
                            @endforeach
                            </div>
                        </div><!-- End .product-single-gallery -->

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">{{$productDetails->name}}</h1>

                            <div class="product-nav">
                                <div class="product-prev">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="{{ asset('storage/photo/'.$productDetails->ProductImageLast->image) }}"
                                                    style="padding-top: 0px;">

                                                <span>{{$productDetails->name}}</span>
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
                                                    src="{{ asset('storage/photo/'.$productDetails->ProductImageFirst->image) }}"
                                                    style="padding-top: 0px;">

                                                <span>{{$productDetails->name}}</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:60%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>

                                <a href="#" class="rating-link">( 6 Reviews )</a>
                            </div> -->

                            <hr class="short-divider">

                            <div class="price-box">
                            <span class="product-price">
                                                @if ($productDetails->special_price)
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
                                    </span>
                            </div><!-- End .price-box -->

                            <div class="product-desc">
                                <p>
                                    {{$productDetails->short_description}}
                                </p>
                            </div><!-- End .product-desc -->

                            <ul class="single-info-list">

                                <li>
                                    SKU: <strong>{{$productDetails->code}}</strong>
                                </li>

                                <li>
                                    CATEGORY: <strong><a href="#" class="product-category">
                                    {{$productDetails->Category->name}}
                                    </a></strong>
                                </li>

                                <li>
                                    TAGs: <strong><a href="#" class="product-category">
                                    {{$productDetails->Category->name}}
                                    </a></strong>,
                                    <strong><a href="#" class="product-category">
                                    @if($productDetails->SubCategory)
                                       {{$productDetails->SubCategory->name}}
                                    @endif
                                    </a></strong>
                                </li>
                            </ul>

                            <div class="product-filters-container">
                                <!-- <div class="product-single-filter select-custom">
                                    <label>COLOR:</label>
                                    <select name="orderby" class="form-control">
                                        <option value="" selected="selected">CHOOSE AN OPTION
                                        </option>
                                        <option value="1">BLACK</option>
                                        <option value="2">BLUE</option>
                                        <option value="3">INDEGO</option>
                                        <option value="4">RIGHT-BLUE</option>
                                        <option value="5">RED</option>
                                    </select>
                                </div>

                                <div class="product-single-filter select-custom">
                                    <label>SIZE:</label>
                                    <select name="orderby" class="form-control">
                                        <option value="" selected="selected">CHOOSE AN OPTION
                                        </option>
                                        <option value="1">EXTRA LARGE</option>
                                        <option value="2">LARGE</option>
                                        <option value="3">MEDIUM</option>
                                        <option value="4">SMALL</option>
                                    </select>
                                </div>

                                <div class="product-single-filter">
                                    <label></label>
                                    <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                </div> -->
                                <!---->
                            </div>

                            <div class="product-action">
                                <!-- <div class="price-box product-filtered-price">
                                    <span class="product-price">$245.00</span>
                                </div> -->

                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div><!-- End .product-single-qty -->

                                <a href="javascript:;" class="btn btn-dark add-cart add-to-card buy-now buy-now-button mr-2" data-product-id="{{ $productDetails->id }}" title="Add to Cart">Add to
                                    Cart</a>

                                <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div><!-- End .product-action -->

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                        title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                        title="Mail"></a>
                                </div><!-- End .social-icons -->

                            </div><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs">
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
                                <p>
                                   {!!$productDetails->long_description!!}
                                </p>
                                <p>
                                   {!!$productDetails->short_description!!}
                                </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->

                <div class="products-section pt-0">
                    <h2 class="section-title pb-3">Related Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    @foreach ($data['products'] as $product)
                        <div class="product-default left-details">
                            <figure>
                                <a href="{{route('product-details',['id'=>$product['id']])}}">
                                    <img src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                        width="300" height="300">
                                    <img src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" id="ProductImage" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">{{ $product['category']['name'] }}</a>
                                    @if(isset($product['sub_category']))
                                    ,<a href="demo7-shop.html" class="product-category">{{ $product['sub_category']['name'] }}</a>
                                    @endif
                                </div>
                                <h3 class="product-title">
                                    <a href="demo7-product.html">
                                    @if(strlen($product['name'])>50)
                                        {{\Illuminate\Support\Str::limit($product['name'], 50).'...'}}
                                    @else
                                        {{ $product['name'] }}
                                    @endif
                                    </a>
                                </h3>
                                <div class="price-box">
                                    <span class="product-price">
                                    @if ($product['special_price'])
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
                                    </span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    @endforeach
                    </div><!-- End .products-slider -->
                </div><!-- End .products-section -->

            </div><!-- End .container -->
        </main><!-- End .main -->
@endsection
