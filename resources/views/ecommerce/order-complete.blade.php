@extends('layouts.ecommerce')
@section('content')
<main class="main">
    <div class="container cta">

        <div class="mt-5">

            <div class="cta-border cta-bg red mt-6">
                <div class="row cta-simple">
                    <div class="col-md-9">
                        @if(isset($orderCode))
                        <h3 class="font-weight-normal"> Your Order No: <b>{{$orderCode}}</b> !</h3>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('home') }}">
                            <div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- End .container -->

    <div class="section-elements" style="background: #f4f4f4;">
        <div class="container">
            <h2 class="elements">
                @if ($companyInfo)
                   {{ $companyInfo->name }}
                @endif
            </h2>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ route('home') }}" class="icon-box">
                        <i class="fa fa-bars"></i>
                        <h5 class="porto-sicon-title">Home</h5>
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ route('search-category-wise') }}" class="icon-box">
                        <i class="fa fa-cart-arrow-down"></i>
                        <h5 class="porto-sicon-title">Products</h5>
                        <i class="fa fa-cart-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@endsection
