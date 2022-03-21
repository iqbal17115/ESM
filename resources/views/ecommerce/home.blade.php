@extends('layouts.ecommerce')
@section('content')
    <main class="main home">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>

                {{-- Start Aside --}}
                @include('ecommerce.aside')
                {{-- End Aside --}}

                <div class="col-lg-9">
                    <div class="main-content">
                        <section class="home-section home-section-slider">
                            <div class="row">

                                {{-- deleted --}}
                                {{-- col-xl-8--}}

                                <div class="col-md-12 col-xl-12 col-lg-12 mb-xl-0 mb-2">
                                    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover dot-inside nav-big h-100 text-uppercase"
                                        data-owl-options="{
                                                            'loop': false,
                                                            'nav' : false,
                                                            'dots' : false
                                                        }">

                                        @foreach ($sliderImages as $sliderImage)
                                            <div class="home-slide home-slide1 banner">
                                                <img class="slide-bg"
                                                    src="{{ asset('storage/photo/' . $sliderImage->image) }}"
                                                    alt="slider image" id="MainSliderImage"
                                                    style="background-color: #c0e1f2;">
                                                <div class="container d-flex align-items-center">
                                                    <div class="banner-layer d-flex flex-column">
                                                        <h2 class="text-transform-none appear-animate"
                                                            data-animation-name="fadeInUpShorter"
                                                            data-animation-delay="600">
                                                            {{ $sliderImage->title }}
                                                        </h2>
                                                    </div>
                                                    <!-- End .banner-layer -->
                                                </div>
                                            </div>
                                            <!-- End .home-slide -->
                                        @endforeach

                                    </div>
                                    <!-- End .home-slider -->
                                </div>
                                {{-- <div class="col-md-12 col-xl-4 col-lg-12 d-sm-flex d-xl-block">

                                    @foreach ($sliderImageDesc as $sliderImage)
                                        <div class="banner banner1 mb-2 pr-sm-3 pr-0 pr-xl-0" id="SecondSliderImage">
                                            <img class="slide-bg"
                                                src="{{ asset('storage/photo/' . $sliderImage->image) }}"
                                                alt="slider image" style="background-color: #d9e2e1;">
                                            <div class="container d-flex align-items-center">
                                                <div class="banner-layer d-flex flex-column pt-0">
                                                    <h2 class="text-transform-none appear-animate"
                                                        data-animation-name="fadeInUpShorter" data-animation-delay="600">
                                                        {{ $sliderImage->title }}
                                                    </h2>
                                                </div>
                                                <!-- End .banner-layer -->
                                            </div>
                                        </div>
                                        <!-- End .home-slide -->
                                    @endforeach

                                </div> --}}
                            </div>
                        </section>

                        {{-- <div class="info-boxes-slider owl-carousel owl-theme appear-animate"
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
                        </div> --}}
                        <!-- End .info-boxes-slider -->


                        <section class="categories-section appear-animate mt-md-5" data-animation-name="fadeInUpShorter"
                            data-animation-delay="15">
                            {{-- <div class="heading d-flex align-items-center flex-column flex-lg-row border-0 mb-0">
                                <h2 class="text-transform-none mb-0">Popular Departments</h2>
                            </div> --}}
                            <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="200" data-owl-options="{
                                                'dots': false,
                                                'margin': 20,
                                                'nav': true,
                                                'loop': true,
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
                                                        'items': 6
                                                    }
                                                }
                                            }">
                                @foreach ($categories as $category)
                                    <div class="banner banner-image font2">
                                        <a href="{{ route('search-category-wise', ['id' => $category->id]) }}">
                                            <center>
                                                <img
                                                @if($category->image1)
                                                   src="{{ asset('storage/photo/' . $category->image1) }}"
                                                @else
                                                   src="{{ asset('image-not-available.jpg') }}"
                                                @endif
                                                 width="374"
                                                height="200" alt="banner" id="CategoryImage"
                                                style="border-radius: 50%;">
                                            </center>
                                        </a>
                                        <div class="">
                                            {{-- <h3>
                                                <center>
                                                    {{ $category->name }}
                                                </center>
                                            </h3> --}}
                                            {{-- <span>{{ count($category->CountProduct) }} Products </span> --}}
                                        </div>
                                    </div>
                                    <!-- End .banner -->
                                @endforeach
                            </div>
                            <!-- End .cat-carousel -->
                        </section>
                        <!-- End .banners-section -->

                        @foreach($features as $feature)
                        @if(count($feature->Product)>0)
                        <section class="products-container">
                            <div class="heading d-flex align-items-center appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="150">
                                <h2 class="text-transform-none mb-0">{{$feature->name}}</h2>
                                <a class="d-block view-all ml-auto" href="#">View All<i
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
                                                @php
                                                   $featured = str_replace(' ', '_', $feature->name);
                                                @endphp
                                @foreach ($data[$featured] as $FeaturedProduct)
                                    <div class="product-default inner-quickview inner-icon">

                                        <figure>
                                            <a href="{{ route('product-details', ['id' => $FeaturedProduct['id']]) }}">
                                                <img
                                                @if($FeaturedProduct['product_image_first']['image'])
                                                src="{{ asset('storage/photo/' . $FeaturedProduct['product_image_first']['image']) }}"
                                                @else
                                                   src="{{ asset('image-not-available.jpg') }}"
                                                @endif
                                                    width="205" height="205" id="ProductImage" style="position: relative;" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                @php
                                                    $minimumQuantity = $FeaturedProduct['min_order_qty'];
                                                    $orderQuantity = 0;
                                                    if (isset($cardBadge['data']['products'][$FeaturedProduct['id']])) {
                                                        $minimumQuantity = $cardBadge['data']['products'][$FeaturedProduct['id']]['minimum_order_quantity'];
                                                        $orderQuantity = $cardBadge['data']['products'][$FeaturedProduct['id']]['quantity'];
                                                    }
                                                @endphp
                                                <input type="hidden" class="product_quantity"
                                                    id="product_quantity_{{ $FeaturedProduct['id'] }}"
                                                    data-minimum-quantity="{{ $minimumQuantity }}"
                                                    value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                                <a href="javascript:void(0)"
                                                    data-product-id="{{ $FeaturedProduct['id'] }}"
                                                    class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button cartModal"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                </div>
                                            </div>
                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product-details', ['id' => $FeaturedProduct['id']]) }}">
                                                    @if (strlen($FeaturedProduct['name']) > 50)
                                                        {{ \Illuminate\Support\Str::limit($FeaturedProduct['name'], 50) . '...' }}
                                                    @else
                                                        {{ $FeaturedProduct['name'] }}
                                                    @endif
                                                </a>
                                            </h3>

                                            <div class="price-box">
                                                @if ($FeaturedProduct['special_price'])
                                                    <span class="old-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $FeaturedProduct['regular_price'] }}
                                                    </span>
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $FeaturedProduct['special_price'] }}
                                                    </span>
                                                @else
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $FeaturedProduct['regular_price'] }}
                                                    </span>
                                                @endif
                                            </div>
                                            @if($FeaturedProduct['special_price'])
                                                    <div class="top-left" style="width: 83px;">
                                                        -{{ intval((($FeaturedProduct['regular_price'] - $FeaturedProduct['special_price']) * 100)/$FeaturedProduct['regular_price']) }}% OFF
                                                    </div>
                                            @endif
                                            <!-- End .price-box -->
                                        </div>
                                        <div class="product-action mt-1">
                                            <center>
                                            <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple product-type-simple-mobile add-to-card buy-now buy-now-button" data-product-id="{{ $FeaturedProduct['id'] }}" style="background-color: #346aff; color: white; font-weight: bold;">
                                                   <i class="icon-shopping-cart"></i><span>ADD TO CART</span>
                                            </a>
                                            </center>
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                @endforeach

                            </div>
                            <!-- End .products-slider -->
                        </section>
                        @endif
                        @endforeach
                        <section class="products-container products-section-with-border appear-animate"
                            data-animation-name="fadeIn" data-animation-delay="100">
                            <div class="heading d-flex align-items-center">
                                <h2 class="d-flex align-items-center text-transform-none mb-0"><i></i>Special Offers
                                </h2>
                                <a class="d-block view-all ml-auto mt-0" href="#">View All<i
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
                                            <a href="{{ $offer->link }}">
                                                <img
                                                @if($offer->image)
                                                   src="{{ asset('storage/photo/' . $offer->image) }}"
                                                @else
                                                   src="{{ asset('image-not-available.jpg') }}"
                                                @endif
                                                 width="205"
                                                    height="205" id="ProductImage" alt="product">
                                            </a>

                                            {{-- <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div> --}}
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="demo40-shop.html"
                                                        class="product-category">{{ $offer->title }}</a>
                                                </div>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="demo40-product.html">{{ $offer->description }}</a>
                                            </h3>


                                            <div class="price-box">
                                                @if ($offer->discount_percent)
                                                    {{ $offer->discount_percent }}%
                                                @else
                                                    @if ($currencySymbol)
                                                        <span
                                                            style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                    @endif
                                                    {{ $offer->discount }}
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
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- footer-area -->
                        @include('ecommerce.footer')
                        <!-- footer-area-end -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
