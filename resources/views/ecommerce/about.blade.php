@extends('layouts.ecommerce')
@section('content')
<main class="main about">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="about-section">
                <div class="container">
                    <h2 class="title">ABOUT US</h2>
                    @if ($companyInfo)
                       {!! $companyInfo->about_us !!}
                    @endif
                </div><!-- End .container -->
            </div><!-- End .about-section -->
        </main><!-- End .main -->
@endsection
