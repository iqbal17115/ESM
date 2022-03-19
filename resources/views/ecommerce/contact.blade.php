@extends('layouts.ecommerce')
@section('content')
<main class="main contact-two">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row ">
                    <div class="col-md-6">
                        <h2 class="mb-1 pb-2"><strong>Contact Us</strong></h2>

                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="contact-name">Your name</label>
                                        <input type="text" class="form-control" id="contact-name" name="contact-name"
                                            required>
                                    </div><!-- End .form-group -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="contact-email">Your email address</label>
                                        <input type="email" class="form-control" id="contact-email" name="contact-email"
                                            required>
                                    </div><!-- End .form-group -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact-subject">Subject</label>
                                <input type="text" class="form-control" id="contact-subject" name="contact-subject">
                            </div><!-- End .form-group -->

                            <div class="form-group mb-0">
                                <label for="contact-message">Your Message</label>
                                <textarea cols="30" rows="1" id="contact-message" class="form-control"
                                    name="contact-message" required></textarea>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary ls-10">Send Message</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-8 -->

                    <div class="col-md-6">

                        <div class="contact-info mb-2">
                            <h2 class="contact-title"><strong>The Office</strong></h2>

                            <div class="porto-sicon-box d-flex align-items-center">
                                <div class="porto-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h3 class="porto-sicon-title">
                                    <strong>Address:</strong> 
                                @if(isset($companyInfo->address))
                                   {{$companyInfo->address}}
                                @endif
                                </h3>
                            </div>
                            <div class="porto-sicon-box  d-flex align-items-center">
                                <div class="porto-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h3 class="porto-sicon-title">
                                    <strong>Phone:</strong> 
                                @if(isset($companyInfo->phone))
                                   {{$companyInfo->phone}}
                                @endif
                                </h3>
                            </div>
                            @if(isset($companyInfo->email))
                            <div class="porto-sicon-box  d-flex align-items-center">
                                <div class="porto-icon">
                                    <i class="fa fa-envelope"></i></div>
                                <h3 class="porto-sicon-title">
                                    <strong>Email:</strong> 
                                   {{$companyInfo->email}}
                                </h3>
                            </div>
                            @endif
                        </div><!-- End .contact-info -->

                        <hr class="mt-1 mb-0" />

                        <div class="contact-time">
                            <h2 class="contact-title"><strong>Business Hours</strong></h2>

                            <div class="porto-sicon-box d-flex align-items-center">
                                <div class="porto-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <h3 class="porto-sicon-title">24/7</h3>
                            </div>

                        </div>
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main><!-- End .main -->
@endsection
