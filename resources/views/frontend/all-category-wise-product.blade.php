@extends('layouts.front_end')
@section('content')
<div>
    <style>
        .buy-now {
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 7px 22px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
        }

        .buy-now-button:hover {
            background: black;
            color: white;
            font-weight: bold;
        }
    </style>
    <x-slot name="title">
        Product View
    </x-slot>
    <x-slot name="header">
        Product View
    </x-slot>
    <!-- main-area -->
    <!-- main-area -->
    <main>


        <!-- shop-area -->
        <div class="shop-area gray-bg pt-20 pb-0">
            <div class="custom-container-two">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            @foreach ($categories as $category)
                            {{-- Start Category Show --}}
                            @if(count($category->Product)>0)
                            <div class="col-12">
                                <a href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                    <h4 class="text-center pt-1" style="color: #ff6000;">
                                        {{ $category->name }}
                                        <hr class="m-0 p-0">
                                    </h4>
                                </a>
                            </div>
                            @endif
                            {{-- End Category Show --}}
                            {{-- Start Product Show --}}
                            @foreach ($category->Product as $product)
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                                <div class="exclusive-item exclusive-item-three text-center mb-50">
                                    <div class="exclusive-item-thumb">
                                        <a href="{{route('product-details',['id'=>$product->id])}}">
                                            <img @if(isset($product->ProductImageFirst))
                                            src="{{ asset('storage/photo/'.$product->ProductImageFirst->image)}}"
                                            @else src="{{ asset('image-not-available.jpg')}}" @endif
                                            style="width: 100%;height: auto;" alt="{{$product->name}}">
                                        </a>
                                        @if($product['discount'])
                                        <span
                                            class="sd-meta">{{intval($product['discount'])}}@if($currencySymbol){{$currencySymbol->symbol}}@endif
                                            @if(isset($language->discount))
                                            {{$language->discount}}
                                            @else
                                            discount
                                            @endif
                                        </span>
                                        @endif
                                    </div>
                                    <div class="exclusive-item-content">
                                        <h5>
                                            <a href="{{route('product-details',['id'=>$product->id])}}"
                                                style="text-transform: capitalize; font-size: 12px;">
                                                @if(strlen($product->name)>50)
                                                {{ substr($product->name, 0,49).'...' }}
                                                @else
                                                {{ $product->name }}
                                                @endif
                                            </a>
                                        </h5>
                                        <div class="exclusive--item--price pb-10">
                                            <span class="new-price" style="color:#ff0000;">
                                                @if(!Auth::user())
                                                @if($currencySymbol)
                                                <span
                                                    style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product->special_price }}
                                                @else
                                                {{ $product->special_price }}
                                                @endif
                                                @elseif(isset(Auth::user()->Contact) && Auth::user()->Contact->contact_type=='Wholesale')
                                                @if($currencySymbol)
                                                <span
                                                    style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product->wholesale_price }}
                                                @else
                                                {{ $product->wholesale_price }}
                                                @endif
                                                @elseif(isset(Auth::user()->Contact) && Auth::user()->Contact->contact_type!='Wholesale')
                                                @if($currencySymbol)
                                                <span
                                                    style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product->special_price }}
                                                @else
                                                {{ $product->special_price }}
                                                @endif
                                                @endif
                                            </span>
                                            <del class="old-price">
                                                @if($currencySymbol)
                                                <span class="text-dark"><span
                                                        style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product->regular_price }}</span>
                                                @else
                                                {{ $product->regular_price }}
                                                @endif

                                            </del>
                                        </div>
                                        @php
                                        $minimumQuantity = $product->min_order_qty;
                                        $orderQuantity = 0;
                                        if(isset($cardBadge['data']['products'][$product->id])) {
                                        $minimumQuantity =
                                        $cardBadge['data']['products'][$product['id']]['minimum_order_quantity'];
                                        $orderQuantity = $cardBadge['data']['products'][$product->id]['quantity'];
                                        }
                                        @endphp
                                        <a href="javascript:void(0)"
                                            class="add-to-card buy-now buy-now-button cartModal"
                                            data-product-id="{{ $product->id }}" style="color: #ff5c00;">
                                            @if($product->in_stock=="Out of Stock")
                                            @if($language->sold_out_button_text)
                                            {{$language->sold_out_button_text}}
                                            @else
                                            Sold Out
                                            @endif
                                            @else
                                            @if(isset($language->sell_button_text))
                                            {{$language->sell_button_text}}
                                            @else
                                            Buy Now
                                            @endif
                                            @endif
                                        </a>
                                        <a href="javascript:void(0)"
                                            class=" buy-now buy-now-button cartModal1 btn-mobile-modal"
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->name }}"
                                            @if(Auth::user()) @if(Auth::user()->Contact->contact_type=='Wholesale') data-product-price="{{ $product['wholesale_price'] }}" @endif @else data-product-price="{{ $product['special_price'] }}" @endif
                                            data-product-quantity="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}"
                                            data-product-minimum-quantity="{{ $minimumQuantity }}"
                                            data-product-guarantee="{{ $product->guarantee }}"
                                            @if($product->ProductImageFirst)
                                            data-product-image="{{ asset('storage/photo/'.$product->ProductImageFirst->image) }}"
                                            @endif data-toggle="modal" data-target=".bd-example-modal-sm"
                                            style="color: #ff5c00;">
                                            @if($product['in_stock']=="Out of Stock")
                                            @if($language->sold_out_button_text)
                                            {{$language->sold_out_button_text}}
                                            @else
                                            Sold Out
                                            @endif
                                            @else
                                            @if(isset($language->sell_button_text))
                                            {{$language->sell_button_text}}
                                            @else
                                            Buy Now
                                            @endif
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- End Product Show --}}
                            @if(count($category->Product)>0)
                            <div class="col-12 pb-5">
                                <center>
                                    <a class="text-center buy-now-button p-2 buy-now" style="font-size: 12px;color:red;font-weight: bold;" href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                        @if(isset($language->more_products))
                                        {{$language->more_products}}...
                                        @else
                                        See More
                                        @endif
                                    </a>
                                </center>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div>
                            {{-- {{$data['products']->links('pagination::bootstrap-4')}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->

    </main>
    <!-- main-area-end -->
    <!-- main-area-end -->
</div>
@endsection
@push('scripts')

@endpush
