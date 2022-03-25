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

                    <div class="row products-group">
                        @foreach ($categories as $category)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('sub-category', ['id'=> $category->id])}}">
                                        <img src="{{ asset('storage/photo/' .$category->image1) }}" width="205"
                                            height="205" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title">
                                        <a href="{{route('sub-category', ['id'=> $category->id])}}"> {{$category->name}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

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
