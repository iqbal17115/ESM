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
                    <h2 class="section-title text-center d-flex align-items-center">Featured Products
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

                        <div class="product-default left-details">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">clothing</a>,
                                    <a href="demo7-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Black Glasses</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$99.00 – $109.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-28%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">shoes</a>,
                                    <a href="demo7-shop.html" class="product-category">toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Jeans Pants</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$209.00 – $249.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-4.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-4-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">CLOTHING</a>,
                                    <a href="demo7-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Black Belt</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="demo7-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-6.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-6-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">T-shirts</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Gentle Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$1,999.00</span>
                                    <span class="product-price">$1,699.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-8.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-8-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">T-shirts</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Towel</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$1,999.00</span>
                                    <span class="product-price">$1,699.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
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
                        <div class="banner banner-image">
                            <a href="demo7-product.html">
                                <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/banners/cats/banner-1.jpg" width="272" height="231"
                                    alt="banner">
                            </a>
                            <div class="banner-layer banner-layer-middle">
                                <h3>DRESS</h3>
                                <span>2 PRODUCTS </span>
                            </div>
                        </div><!-- End .banner -->

                        <div class="banner banner-image">
                            <a href="demo7-product.html">
                                <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/banners/cats/banner-2.jpg" width="272" height="231"
                                    alt="banner">
                            </a>
                            <div class="banner-layer banner-layer-middle">
                                <h3>TOYS</h3>
                                <span>2 PRODUCTS </span>
                            </div>
                        </div><!-- End .banner -->

                        <div class="banner banner-image">
                            <a href="demo7-product.html">
                                <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/banners/cats/banner-3.jpg" width="272" height="231"
                                    alt="banner">
                            </a>
                            <div class="banner-layer banner-layer-middle">
                                <h3>SHOES</h3>
                                <span>2 PRODUCTS </span>
                            </div>
                        </div><!-- End .banner -->

                        <div class="banner banner-image">
                            <a href="demo7-shop.html">
                                <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/banners/cats/banner-4.jpg" width="272" height="231"
                                    alt="banner">
                            </a>
                            <div class="banner-layer banner-layer-middle">
                                <h3>WATCHES</h3>
                                <span>2 PRODUCTS </span>
                            </div>
                        </div><!-- End .banner -->

                        <div class="banner banner-image">
                            <a href="demo7-shop.html">
                                <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/banners/cats/banner-2.jpg" width="272" height="231"
                                    alt="banner">
                            </a>
                            <div class="banner-layer banner-layer-middle">
                                <h3>Dress</h3>
                                <span>2 Products </span>
                            </div>
                        </div><!-- End .banner -->
                    </div><!-- End .cat-carousel -->
                </div><!-- End .container -->
            </div><!-- End .banners-section -->

            <div class="arrival-products-section appear-animate" data-animation-name="fadeIn"
                data-animation-delay="100">
                <div class="container">
                    <h2 class="section-title text-center d-flex align-items-center">JUST ARRIVED
                    </h2>

                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Black Glasses</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Black Glasses</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-10.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-10-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Black Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-14.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-14-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Cap</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Brown Belt</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-6.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-6-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Gentle Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-4.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-4-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Black Belt</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Jeans Pants</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-3.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-3-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Jeans Trouser</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                            <div class="product-default left-details">
                                <figure>
                                    <a href="demo7-product.html">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7.jpg" alt="product"
                                            width="300" height="300">
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7-2.jpg" alt="product"
                                            width="300" height="300">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="demo7-shop.html" class="product-category">clothing</a>,
                                        <a href="demo7-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo7-product.html">Men Gray Cap</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$99.00 – $109.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    </div>

                    <hr class="mt-1 mb-4">
                </div>
            </div>

            <div class="container">
                <div class="product-widgets row pb-2 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-title border-0 text-left text-uppercase">Best Selling Products</h4>
                        <div class="heading-spacer"></div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-2-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">caps</a>,
                                    <a href="demo7-shop.html" class="product-category">fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">t-shirts</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Jeans Pants</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$69.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Shoes</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Sports Cap</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$39.00 – $108.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Shoes</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Black Glasses</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$39.00 – $108.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-title border-0 text-left text-uppercase">Top Rated Products</h4>
                        <div class="heading-spacer"></div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-3.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-3-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Jeana Trouser</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$199.00 – $209.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Electronics</a>,
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Watches</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Brown Belts</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-1-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">T-shirts</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>,
                                    <a href="demo7-shop.html" class="product-category">Trousers</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Black Glasses</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-title border-0 text-left text-uppercase">Featured Products</h4>
                        <div class="heading-spacer"></div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-7-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Shoes</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Sports Cap</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$39.00 – $108.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-13-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Shoes</a>,
                                    <a href="demo7-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Black Glasses</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$39.00 – $108.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="demo7-product.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5.jpg" width="175"
                                        height="175" alt="product" />
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/products/product-5-2.jpg" width="175"
                                        height="175" alt="product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="demo7-shop.html" class="product-category">Electronics</a>,
                                    <a href="demo7-shop.html" class="product-category">Fashion</a>,
                                    <a href="demo7-shop.html" class="product-category">Watches</a>
                                </div>
                                <h3 class="product-title"> <a href="demo7-product.html">Men Brown Belts</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div><!-- End .product-widgets -->

                <hr class="m-0" />

                <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                    data-animation-name="fadeIn" data-animation-delay="200" data-owl-options="{
					'margin': 0}">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand1.png" width="130" height="56" alt="brand">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand2.png" width="130" height="56" alt="brand">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand3.png" width="130" height="56" alt="brand">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand4.png" width="130" height="56" alt="brand">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand5.png" width="130" height="56" alt="brand">
                    <img src="{{ URL::asset('porto/') }}/assets/images/brands/small/brand6.png" width="130" height="56" alt="brand">
                </div><!-- End .brands-slider -->

                <hr class="m-0" />
            </div>

            <div class="container">
                <div class="blog-section row">
                    <div class="col-lg-6 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="300">
                        <h2 class="section-title text-center  border-0 d-flex align-items-center">LATEST NEWS
                        </h2>

                        <article class="post d-sm-flex align-items-center mb-2 mb-lg-0">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/blog/shop7_post1.jpg" width="280" height="209"
                                        alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div><!-- End .post-date -->
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Top Jeans Collection</a>
                                </h2>

                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi.
                                        Etiam non tellus sem. Aenean...</p>
                                </div><!-- End .post-content -->

                                <div class="post-meta">
                                    <i class="far fa-comments"></i>
                                    <a href="#" title="Comment on Top Jeans Collection">0 COMMENTS</a>
                                </div>
                            </div><!-- End .post-body -->
                        </article>
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="100">
                        <h2 class="section-title text-center  border-0  d-flex align-items-center">LATEST REVIEWS
                        </h2>

                        <div class="testimonials-slider mt-1">
                            <div class="testimonial">
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="{{ URL::asset('porto/') }}/assets/images/demoes/demo7/clients/client1.png" alt="client">
                                    </figure>

                                    <div>
                                        <h4 class="testimonial-title font1">john Smith</h4>
                                        <span class="font1 ls-n-10">CEO & Founder</span>
                                    </div>
                                </div><!-- End .testimonial-owner -->

                                <blockquote>
                                    <p>Hello, I want to thank you for creating a great template and for the excellent
                                        and quick support and help that you have been providing to me as I begin to work
                                        with it.</p>
                                </blockquote>
                            </div><!-- End .testimonial -->
                        </div><!-- End .testimonials-slider -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main>
@endsection
