@extends('layouts.ecommerce')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="icon-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Contact Us
                </li>
            </ol>
        </div>
    </nav>

    <div id="map"></div>

    <div class="container contact-us-container">
        <div class="contact-info">
            <div class="row">
                <div class="col-12">
                    <h2 class="ls-n-25 m-b-1">
                        Contact Info
                    </h2>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Sed imperdiet libero id nisi euismod, sed
                        porta est consectetur. Vestibulum auctor felis eget
                        orci semper vestibulum. Pellentesque ultricies nibh
                        gravida, accumsan libero luctus, molestie nunc.L
                        orem ipsum dolor sit amet, consectetur adipiscing
                        elit.
                    </p>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="sicon-location-pin"></i>
                        <div class="feature-box-content">
                            <h3>Address</h3>
                            <h5>
                                @if(isset($companyInfo->address))
                                   {{$companyInfo->address}}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="fa fa-mobile-alt"></i>
                        <div class="feature-box-content">
                            <h3>Phone Number</h3>
                            <h5>
                                @if(isset($companyInfo->phone))
                                   {{$companyInfo->phone}}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="far fa-envelope"></i>
                        <div class="feature-box-content">
                            <h3>E-mail Address</h3>
                            <h5>
                                @if(isset($companyInfo->email))
                                   {{$companyInfo->email}}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-8"></div>
</main>
@endsection
