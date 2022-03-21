@extends('layouts.ecommerce')
@section('content')
<main class="main home">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>

            {{-- Start Aside --}}
            @include('frontend.aside')
            {{-- End Aside --}}

            <div class="col-lg-9">
                <div class="main-content">
                    <section class="home-section mb-2">
                        <div class="row">
                            <div class="col-md-12 col-xl-8 col-lg-12 mb-xl-0 mb-2">
                                <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover dot-inside nav-big h-100 text-uppercase"
                                    data-owl-options="{
                                            'loop': false,
                                            'nav' : false,
                                            'dots' : true
                                        }">

                                    @foreach ($sliderImages as $sliderImage)
                                    <div class="home-slide home-slide1 banner">
                                        <img class="slide-bg" src="{{ asset('storage/photo/'.$sliderImage->image) }}"
                                            alt="slider image" style="background-color: #c0e1f2;">
                                        <div class="container d-flex align-items-center">
                                            <div class="banner-layer d-flex flex-column">
                                                <h6 class="text-transform-none appear-animate"
                                                    data-animation-name="fadeInDownShorter" data-animation-delay="100">
                                                    Exclusive Product New Arrival
                                                </h6>
                                                <h2 class="text-transform-none appear-animate"
                                                    data-animation-name="fadeInUpShorter" data-animation-delay="600">
                                                    Condensed Milk</h2>
                                                <h3 class=" appear-animate" data-animation-name="fadeInRightShorter"
                                                    data-animation-delay="1100">NATURAL PRODUCT</h3>
                                                <span class="custom-font text-transform-none appear-animate"
                                                    data-animation-name="fadeInRightShorter"
                                                    data-animation-delay="1100"><span>Extra!</span></span>
                                                <h5 class=" appear-animate" data-animation-name="fadeInUpShorter"
                                                    data-animation-delay="1400">BREAKFAST PRODUCTS ON SALE</h5>
                                                <h4 class="d-inline-block appear-animate"
                                                    data-animation-name="fadeInRightShorter"
                                                    data-animation-delay="1800">
                                                    <sup>UP TO</sup>
                                                    <b class="coupon-sale-text ls-10 text-white align-middle">50%</b>
                                                </h4>
                                            </div>
                                            <!-- End .banner-layer -->
                                        </div>
                                    </div>
                                    <!-- End .home-slide -->
                                    @endforeach

                                </div>
                                <!-- End .home-slider -->
                            </div>
                            <div class="col-md-12 col-xl-4 col-lg-12 d-sm-flex d-xl-block">

                                @foreach ($sliderImageDesc as $sliderImage)

                                <div class="banner banner1 mb-2 pr-sm-3 pr-0 pr-xl-0">
                                    <img class="slide-bg" src="{{ asset('storage/photo/'.$sliderImage->image) }}"
                                        alt="slider image" style="background-color: #d9e2e1;">
                                    <div class="container d-flex align-items-center">
                                        <div class="banner-layer d-flex flex-column pt-0">
                                            <h6 class="text-transform-none mb-1 appear-animate"
                                                data-animation-name="fadeInDownShorter" data-animation-delay="100">
                                                Exclusive Product New Arrival
                                            </h6>
                                            <h2 class="text-transform-none appear-animate"
                                                data-animation-name="fadeInUpShorter" data-animation-delay="600">Organic
                                                Coffee</h2>
                                            <h3 class=" appear-animate" data-animation-name="fadeInRightShorter"
                                                data-animation-delay="1100">SPECIAL BLEND</h3>
                                            <span class="custom-font text-transform-none appear-animate"
                                                data-animation-name="fadeInRightShorter"
                                                data-animation-delay="1100"><span>Fresh!</span></span>
                                        </div>
                                        <!-- End .banner-layer -->
                                    </div>
                                </div>
                                <!-- End .home-slide -->
                                @endforeach

                            </div>
                        </div>
                    </section>

                    <div class="info-boxes-slider owl-carousel owl-theme appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                        'dots': false,
                        'loop': false,
                        'responsive': {
                            '576': {
                                'items': 2
                            },
                            '992': {
                                'items': 2
                            },
                            '1200': {
                                'items': 3
                            }
                        }
                    }">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-shipping mr-3 pr-2"></i>

                            <div class="info-box-content">
                                <h4 class="pt-1">Free Shipping and Returns</h4>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-money"></i>

                            <div class="info-box-content">
                                <h4 class="ls-n-15">Money Back Guarantee</h4>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-support mr-3 pr-2"></i>

                            <div class="info-box-content">
                                <h4>Online Support 24/7</h4>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                    </div>
                    <!-- End .info-boxes-slider -->



                    <section class="categories-section appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="150">
                        <div class="heading d-flex align-items-center flex-column flex-lg-row border-0 mb-0">
                            <h2 class="text-transform-none mb-0">Popular Departments</h2>
                        </div>
                        <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="200" data-owl-options="{
                                'dots': false,
                                'margin': 20,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '991': {
                                        'items': 3
                                    },
                                    '1200': {
                                        'items': 4
                                    }
                                }
                            }">
                            @foreach ($categories as $category)
                            <div class="banner banner-image font2">
                                <a href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                    <img src="{{ asset('storage/photo/'.$category->image1) }}" width="374" height="200"
                                        alt="banner" style="background-color: #f4f4f4;">
                                </a>
                                <div class="banner-layer banner-layer-middle">
                                    <h3>{{$category->name}}</h3>
                                    <span>2 Products </span>
                                </div>
                            </div>
                            <!-- End .banner -->
                            @endforeach
                        </div>
                        <!-- End .cat-carousel -->
                    </section>
                    <!-- End .banners-section -->

                    <section class="products-container">
                        <div class="heading d-flex align-items-center appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="150">
                            <h2 class="text-transform-none mb-0">Fresh Vegetables</h2>
                            <a class="d-block view-all ml-auto" href="demo40-shop.html">View All<i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="products-slider owl-carousel owl-theme  appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                    'margin': 20,
                                    'dots': false,
                                    'nav': false,
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
                            @foreach ($data['fresh_vegetables'] as $FreshVegetable)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$FreshVegetable['id']])}}">
                                        <img src="{{ asset('storage/photo/'.$FreshVegetable['product_image_first']['image']) }}"
                                            width="205" height="205" alt="product">
                                    </a>

                                    <div class="btn-icon-group">
                                        @php
                                        $minimumQuantity = $FreshVegetable['min_order_qty'];
                                        $orderQuantity = 0;
                                        if(isset($cardBadge['data']['products'][$FreshVegetable['id']])) {
                                        $minimumQuantity =
                                        $cardBadge['data']['products'][$FreshVegetable['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$FreshVegetable['id']]['quantity'];
                                        }
                                        @endphp
                                        <input type="hidden" class="product_quantity"
                                            id="product_quantity_{{ $FreshVegetable['id'] }}"
                                            data-minimum-quantity="{{ $minimumQuantity }}"
                                            value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                        <a href="javascript:void(0)" data-product-id="{{ $FreshVegetable['id'] }}"
                                            class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button cartModal"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo40-shop.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">
                                            @if(strlen($FreshVegetable['name'])>50)
                                            {{\Illuminate\Support\Str::limit($FreshVegetable['name'], 50).'...'}}
                                            @else
                                            {{ $FreshVegetable['name'] }}
                                            @endif
                                        </a>
                                    </h3>

                                    <div class="price-box">
                                        @if($FreshVegetable['special_price'])
                                        <span class="old-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshVegetable['regular_price'] }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshVegetable['special_price'] }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshVegetable['regular_price'] }}
                                        </span>
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </section>

                    <section class="products-container pt-0">
                        <div class="heading d-flex align-items-center appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            <h2 class="text-transform-none mb-0">Fresh Fruits</h2>
                            <a class="d-block view-all ml-auto" href="demo40-shop.html">View All<i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="products-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
                            data-animation-delay="100" data-owl-options="{
                                    'margin': 20,
                                    'dots': false,
                                    'nav': false,
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
                            @foreach ($data['fresh_fruits'] as $FreshFruit)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$FreshFruit['id']])}}">
                                        <img src="{{ asset('storage/photo/'.$FreshFruit['product_image_first']['image']) }}"
                                            width="205" height="205" alt="product">
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo40-shop.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">
                                            @if(strlen($FreshFruit['name'])>50)
                                            {{\Illuminate\Support\Str::limit($FreshFruit['name'], 50).'...'}}
                                            @else
                                            {{ $FreshFruit['name'] }}
                                            @endif
                                        </a>
                                    </h3>

                                    <div class="price-box">
                                        @if($FreshFruit['special_price'])
                                        <span class="old-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshFruit['regular_price'] }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshFruit['special_price'] }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $FreshFruit['regular_price'] }}
                                        </span>
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </section>

                    <section class="products-container pt-0">
                        <div class="heading d-flex align-items-center appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            <h2 class="text-transform-none mb-0">Meat & Seafood</h2>
                            <a class="d-block view-all ml-auto" href="demo40-shop.html">View All<i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="products-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
                            data-animation-delay="100" data-owl-options="{
                                    'margin': 20,
                                    'dots': false,
                                    'nav': false,
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
                            @foreach ($data['meat_and_sea_food'] as $MeatAndSeaFood)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$MeatAndSeaFood['id']])}}">
                                        <img src="{{ asset('storage/photo/'.$MeatAndSeaFood['product_image_first']['image']) }}"
                                            width="205" height="205" alt="product">
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo40-shop.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">
                                            @if(strlen($MeatAndSeaFood['name'])>50)
                                            {{\Illuminate\Support\Str::limit($MeatAndSeaFood['name'], 50).'...'}}
                                            @else
                                            {{ $MeatAndSeaFood['name'] }}
                                            @endif
                                        </a>
                                    </h3>

                                    <div class="price-box">
                                        @if($MeatAndSeaFood['special_price'])
                                        <span class="old-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $MeatAndSeaFood['regular_price'] }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $MeatAndSeaFood['special_price'] }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $MeatAndSeaFood['regular_price'] }}
                                        </span>
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </section>

                    <section class="products-container products-section-with-border appear-animate"
                        data-animation-name="fadeIn" data-animation-delay="100">
                        <div class="heading d-flex align-items-center">
                            <h2 class="d-flex align-items-center text-transform-none mb-0"><i></i>Special Offers
                            </h2>
                            <a class="d-block view-all ml-auto mt-0" href="demo40-shop.html">View All<i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                    'margin': 20,
                                    'dots': false,
                                    'nav': false,
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

                            @foreach ($offers as $offer)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{$offer->link}}">
                                        <img src="{{ asset('storage/photo/'.$offer->image) }}" width="205" height="205"
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
                                            <a href="demo40-shop.html" class="product-category">{{$offer->title}}</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">{{$offer->description}}</a>
                                    </h3>


                                    <div class="price-box">
                                        @if($offer->discount_percent)
                                        {{$offer->discount_percent}}%
                                        @else
                                        @if($currencySymbol)
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{$offer->discount}}
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </section>
                    <!-- footer-area -->
                    @include('frontend.footer')
                    <!-- footer-area-end -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
