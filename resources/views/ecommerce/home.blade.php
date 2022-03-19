@extends('layouts.ecommerce')
@section('content')
<main class="main">
            <div class="home-top-container appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <!-- Start Slider -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      @php
        $i=0;
      @endphp
      @foreach($sliderImages as $sliderImage)
    <div class="carousel-item @if($i==0) active @endif">
      @php
        $i=1;
      @endphp
      <img class="d-block w-100" src="{{ asset('storage/photo/'.$sliderImage->image) }}" id="SliderImage" alt="First slide">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                            <!-- End Slider -->
                        </div>
                    </div><!-- End .col-lg-5 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="container">
                <section class="featured-products-section appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="100">
                    <h2 class="section-title text-center d-flex align-items-center">JUST ARRIVED
                    </h2>

                    <div class="owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                            'dots': true,
                            'margin': 20,
                            'nav': false,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '991': {
                                    'items': 4
                                }
                            }
                        }">
                        @foreach($data['new_products'] as $new_product)
                        <div class="product-default left-details">
                            <figure>
                                <a href="{{ route('product-details', ['id' => $new_product['id']]) }}">
                                    <img src="{{ asset('storage/photo/' . $new_product['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                        width="300" height="300">
                                    <img src="{{ asset('storage/photo/' . $new_product['product_image_last']['image']) }}" id="ProductImage" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="{{ route('sub-category', ['id'=>$new_product['category']['id']]) }}" class="product-category">
                                    {{ $new_product['category']['name'] }}
                                    </a>
                                </div>
                                <h3 class="product-title"> 
                                    <a href="{{ route('product-details', ['id' => $new_product['id']]) }}">
                                      {{ $new_product['name'] }}
                                    </a> 
                            </h3>
                                <div class="price-box">
                                    <span class="product-price">
                                    @if ($new_product['special_price'])
                                                    <span class="old-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $new_product['regular_price'] }}
                                                    </span>
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $new_product['special_price'] }}
                                                    </span>
                                                @else
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $new_product['regular_price'] }}
                                                    </span>
                                                @endif
                                    </span>
                                </div><!-- End .price-box -->
                                @php
                                    $minimumQuantity = $new_product['min_order_qty'];
                                    $orderQuantity = 0;
                                    if (isset($cardBadge['data']['products'][$new_product['id']])) {
                                        $minimumQuantity = $cardBadge['data']['products'][$new_product['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$new_product['id']]['quantity'];
                                    }
                                @endphp
                                <input type="hidden" class="product_quantity"
                                                    id="product_quantity_{{ $new_product['id'] }}"
                                                    data-minimum-quantity="{{ $minimumQuantity }}"
                                                    value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                <div class="product-action">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button" data-product-id="{{ $new_product['id'] }}"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="categories-section bg-primary">
                <div class="container">
                    <h2 class="section-title border-0 title-decorate text-center text-white d-flex align-items-center appear-animate"
                        data-animation-name="fadeInUpShorter">
                        <span>BROWSE
                            OUR
                            CATEGORIES</span></h2>
                    <div class="owl-carousel owl-theme appear-animate show-nav-hover"
                        data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                        'dots': false,
                        'margin': 20,
                        'loop': false,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                        'nav': true,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '991': {
                                'items': 4,
                                'nav': false
                            }
                        }
                    }">
                    @foreach($categories as $category)
                        <div class="banner banner-image">
                            <a href="{{ route('sub-category', ['id'=>$category->id]) }}">
                                <img src="{{ asset('storage/photo/'.$category->image1) }}" id="CategoryImage" class="rounded" width="272" height="231"
                                    alt="banner">
                            </a>
                            <!-- <div class="banner-layer banner-layer-middle">
                                <h3>DRESS</h3>
                                <span>2 PRODUCTS </span>
                            </div> -->
                        </div><!-- End .banner -->
                    @endforeach
                    </div><!-- End .cat-carousel -->
                </div><!-- End .container -->
            </div><!-- End .banners-section -->

            @if(count($data['trending_products'])>0)
            <div class="arrival-products-section appear-animate" data-animation-name="fadeIn"
                data-animation-delay="100">
                <div class="container">
                    <h2 class="section-title text-center d-flex align-items-center">Trending Product
                    </h2>

                    <div class="row">
                      @foreach($data['trending_products'] as $trending_product)
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="{{ route('product-details', ['id' => $trending_product['id']]) }}">
                                        <img src="{{ asset('storage/photo/' . $trending_product['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                            width="300" height="300">
                                        <img src="{{ asset('storage/photo/' . $trending_product['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="{{ route('sub-category', ['id'=>$trending_product['category']['id']]) }}" class="product-category">
                                        {{ $trending_product['category']['name'] }}
                                        </a>
                                    </div>
                                    <h3 class="product-title"> <a href="{{ route('product-details', ['id' => $trending_product['id']]) }}">
                                       {{ $trending_product['name'] }}
                                    </a> </h3>
                                    <div class="price-box">
                                    <span class="product-price">
                                    @if ($trending_product['special_price'])
                                                    <span class="old-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $trending_product['regular_price'] }}
                                                    </span>
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $trending_product['special_price'] }}
                                                    </span>
                                                @else
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $trending_product['regular_price'] }}
                                                    </span>
                                                @endif
                                    </span>
                                    </div><!-- End .price-box -->
                                    @php
                                    $minimumQuantity = $trending_product['min_order_qty'];
                                    $orderQuantity = 0;
                                    if (isset($cardBadge['data']['products'][$trending_product['id']])) {
                                        $minimumQuantity = $cardBadge['data']['products'][$trending_product['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$trending_product['id']]['quantity'];
                                    }
                                @endphp
                                <input type="hidden" class="product_quantity"
                                                    id="product_quantity_{{ $trending_product['id'] }}"
                                                    data-minimum-quantity="{{ $minimumQuantity }}"
                                                    value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                <div class="product-action">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button" data-product-id="{{ $trending_product['id'] }}"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                </div>
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                      @endforeach
                    </div>

                    <hr class="mt-1 mb-4">
                </div>
            </div>
            @endif

            @if(count($data['best_sellings'])>0)
            <div class="arrival-products-section appear-animate" data-animation-name="fadeIn"
                data-animation-delay="100">
                <div class="container">
                    <h2 class="section-title text-center d-flex align-items-center">Best Selling Product
                    </h2>

                    <div class="row">
                      @foreach($data['best_sellings'] as $best_selling)
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="{{ route('product-details', ['id' => $best_selling['id']]) }}">
                                        <img src="{{ asset('storage/photo/' . $best_selling['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                            width="300" height="300">
                                        <img src="{{ asset('storage/photo/' . $best_selling['product_image_first']['image']) }}" id="ProductImage" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="{{ route('sub-category', ['id'=>$best_selling['category']['id']]) }}" class="product-category">
                                        {{ $best_selling['category']['name'] }}
                                        </a>
                                    </div>
                                    <h3 class="product-title"> <a href="{{ route('product-details', ['id' => $best_selling['id']]) }}">
                                       {{ $best_selling['name'] }}
                                    </a> </h3>
                                    <div class="price-box">
                                    <span class="product-price">
                                    @if ($best_selling['special_price'])
                                                    <span class="old-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $best_selling['regular_price'] }}
                                                    </span>
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $best_selling['special_price'] }}
                                                    </span>
                                                @else
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $best_selling['regular_price'] }}
                                                    </span>
                                                @endif
                                    </span>
                                    </div><!-- End .price-box -->
                                    @php
                                    $minimumQuantity = $best_selling['min_order_qty'];
                                    $orderQuantity = 0;
                                    if (isset($cardBadge['data']['products'][$best_selling['id']])) {
                                        $minimumQuantity = $cardBadge['data']['products'][$best_selling['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$best_selling['id']]['quantity'];
                                    }
                                @endphp
                                <input type="hidden" class="product_quantity"
                                                    id="product_quantity_{{ $best_selling['id'] }}"
                                                    data-minimum-quantity="{{ $minimumQuantity }}"
                                                    value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                <div class="product-action">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button" data-product-id="{{ $best_selling['id'] }}"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                </div>
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                      @endforeach
                    </div>

                    <hr class="mt-1 mb-4">
                </div>
            </div>
            @endif

            <div class="container">

                <hr class="m-0" />

                <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                    data-animation-name="fadeIn" data-animation-delay="200" data-owl-options="{
					'margin': 0}">
                    @foreach($brands as $brand)
                    <img src="{{ asset('storage/photo/'.$brand->image) }}" width="130" height="56" style="width: 150px; height: 60px;" alt="brand">
                    @endforeach
                </div><!-- End .brands-slider -->

                <hr class="m-0" />
            </div>

        </main>
@endsection
