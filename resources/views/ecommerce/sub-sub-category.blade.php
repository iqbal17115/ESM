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

                    <div class="row products-group">
                        @foreach ($subsubcategories as $subsubcategory)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('search-subSubCategory-wise', ['id'=> $subsubcategory->id])}}">
                                        <img src="{{ asset('storage/photo/' .$subsubcategory->image) }}" width="205"
                                            height="205" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title">
                                        <a href="{{route('search-subSubCategory-wise', ['id'=> $subsubcategory->id])}}"> {{$subsubcategory->name}}</a>
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
