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
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Men</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                        </ol>
                    </nav>

                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                    viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path
                                        d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                    </path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>Filter</span>
                            </a>

                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->


                            </div>
                            <!-- End .toolbox-item -->
                        </div>
                        <!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">18</option>
                                        <option value="24">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <div class="toolbox-item layout-modes">
                                <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="category-list.html" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                            <!-- End .layout-modes -->
                        </div>
                        <!-- End .toolbox-right -->
                    </nav>

                    <div class="row products-group">
                        @foreach ($data['products'] as $productId=>$product)
                        <div class="col-4 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$product['id']])}}">
                                        <img
                                        @if(isset($product->ProductImageFirst))
                                          src="{{ asset('storage/photo/'.$product->ProductImageFirst->image)}}"
                                        @else
                                          src="{{ asset('image-not-available.jpg')}}"
                                        @endif width="205" height="205" id="ProductImage" alt="product">
                                    </a>
                                    {{-- Start Cart --}}
                                    <div class="btn-icon-group">
                                        @php
                                        $minimumQuantity = $product['min_order_qty'];
                                        $orderQuantity = 0;
                                        if(isset($cardBadge['data']['products'][$product['id']])) {
                                        $minimumQuantity =
                                        $cardBadge['data']['products'][$product['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$product['id']]['quantity'];
                                        }
                                        @endphp
                                        <input type="hidden" class="product_quantity"
                                            id="product_quantity_{{ $product['id'] }}"
                                            data-minimum-quantity="{{ $minimumQuantity }}"
                                            value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                                        {{-- <a href="javascript:void(0)" data-product-id="{{ $product['id'] }}"
                                            class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button cartModal"><i
                                                class="icon-shopping-cart"></i></a> --}}
                                    </div>
                                    {{-- End Cart --}}
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="{{ route('search-category-wise',['id'=>$product->Category->id]) }}" class="product-category">{{ $product->Category->name }}</a>
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
                                            {{ intval($product['regular_price']) }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ intval($product['special_price']) }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ intval($product['regular_price']) }}
                                        </span>
                                        @endif
                                    </div>
                                 
                                    <!-- End .price-box -->
                                </div>
                                <div class="product-action mt-1">
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple product-type-simple-mobile add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}" style="background-color: #eae5ef;">
                                           <i class="icon-shopping-cart"></i><span>ADD TO CART</span>
                                    </a>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .col-sm-4 -->
                        @endforeach
                    </div>
                    <!-- End .row -->

                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">18</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <ul class="pagination toolbox-item">
                            {{$data['products']->links('pagination::bootstrap-4')}}
                        </ul>
                    </nav>
                    <!-- footer-area -->
                    @include('ecommerce.footer')
                    <!-- footer-area-end -->
                    <!-- End .footer -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
