@extends('layouts.ecommerce')
@section('content')
<main class="main">

            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="{{ route('category', ) }}">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accessories</li> -->
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 main-content">
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
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
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
                                    </div><!-- End .select-custom -->


                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div><!-- End .layout-modes -->
                            </div><!-- End .toolbox-right -->
                        </nav>

                        <div class="row products-group">
                            @foreach($data['products'] as $productId=>$product)
                            <div class="col-6 col-sm-4">
                                <div class="product-default left-details">
                                    <figure>
                                        <a href="{{route('product-details',['id'=>$product['id']])}}">
                                            <img src="{{ asset('storage/photo/'.$product['product_image_first']['image'])}}" id="ProductImage" alt="product"
                                                width="300" height="300">
                                            <img src="{{ asset('storage/photo/'.$product['product_image_last']['image'])}}" id="ProductImage"
                                                alt="product" width="300" height="300">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="{{ route('sub-category', ['id'=>$product['category']['id']]) }}" class="product-category">{{$product['category']['name']}}</a>
                                        </div>
                                        <h3 class="product-title"> <a href="{{route('product-details',['id'=>$product['id']])}}">{{$product['name']}}</a>
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
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                        aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            @foreach($categories as $category)
                                            <li>
                                                <a href="#widget-category-{{$category->id}}" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-{{$category->id}}">
                                                    {{$category->name}}<span class="products-count">({{count($category->Product)}})</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-{{$category->id}}">
                                                    <ul class="cat-sublist">
                                                        @foreach($category->SubCategory as $subCategory)
                                                        <li><a href="{{ route('shop', ['id' => $subCategory->id]) }}">{{$subCategory->name}}({{count($subCategory->Product)}})</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-brand">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-7" role="button" aria-expanded="true"
                                        aria-controls="widget-body-7">Brands</a>
                                </h3>

                                <div class="collapse show" id="widget-body-7">
                                    <div class="widget-body pb-0">
                                        <ul class="cat-list">
                                            @foreach($brands as $brand)
                                            <li><a href="#">{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- margin -->
        </main><!-- End .main -->
@endsection
