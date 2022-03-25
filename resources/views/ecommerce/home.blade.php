@extends('layouts.ecommerce')
@section('content')
    <main class="main home">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <!-- <div class="sidebar-overlay"></div> -->

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
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
      @php
       $i=0;
      @endphp
    @foreach ($sliderImages as $sliderImage)
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

                                    <!-- End .home-slider -->
                            
                            </div>
                        </section>



                        <section class="categories-section appear-animate " data-animation-name="fadeInUpShorter"
                            data-animation-delay="15">
                            <br>
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
                                    <div class="banner banner-image font2 mt-md-8">
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
                                                style="border-radius: 5%;">
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
                                                <!-- <a href="javascript:void(0)"
                                                    data-product-id="{{ $FeaturedProduct['id'] }}"
                                                    class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button cartModal"><i
                                                        class="icon-shopping-cart"></i></a> -->
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
                                                       @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                    <span class="old-price">
                                                        
                                                        {{ intval($FeaturedProduct['regular_price']) }}
                                                    </span>
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ intval($FeaturedProduct['special_price']) }}
                                                    </span>
                                                @else
                                                    <span class="product-price">
                                                        @if (isset($currencySymbol->symbol))
                                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ intval($FeaturedProduct['regular_price']) }}
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <!-- End .price-box -->
                                        </div>
                                        <div class="product-action">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple product-type-simple-mobile add-to-card buy-now buy-now-button" data-product-id="{{ $FeaturedProduct['id'] }}" style="background-color: #eae5ef;">
                                           <i class="icon-shopping-cart"></i><span>ADD TO CART</span>
                                    </a>
                                </div>
                                        <!-- End .product-details -->
                                    </div>
                                @endforeach

                            </div>
                            <!-- End .products-slider -->
                        </section>
                        @endif
                        @endforeach
                       
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
