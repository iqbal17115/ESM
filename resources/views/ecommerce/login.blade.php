@extends('layouts.ecommerce')
@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('search-category-wise') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                My Account
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>My Account</h1>
            </div>
        </div>

        <div class="container login-container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading mb-1">
                                <h2 class="title">Login</h2>
                            </div>

                            <form method="POST" action="{{ route('customer_sign_in') }}">
                                @csrf
                                <label for="login-email">
                                    Username or email address
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-input form-wide" name="mobile" id="mobile" required />

                                <label for="login-password">
                                    Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" class="form-input form-wide" name="password" id="password"
                                    required />

                                <div class="form-footer">
                                    <div class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Remember
                                            me</label>
                                    </div>

                                    <a href="forgot-password.html"
                                        class="forget-password text-dark form-footer-right">Forgot
                                        Password?</a>
                                </div>
                                <button type="submit" class="btn btn-dark btn-md w-100">
                                    LOGIN
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="heading mb-1">
                                <h2 class="title">Register</h2>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <label for="name">
                                    Name
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-input form-wide" id="name" name="name" required />

                                <label for="business_name">
                                    Business Name
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-input form-wide" id="business_name" name="business_name"
                                    required />

                                <label for="business_name">
                                    Mobile
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-input form-wide" id="mobile" name="mobile" required />

                                <label for="address">
                                    Address
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-input form-wide" id="address" name="address" required />

                                <label for="register-email">
                                    Email address
                                    <span class="required">*</span>
                                </label>
                                <input type="email" class="form-input form-wide" id="email" name="email" required />

                                <label for="password">
                                    Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" class="form-input form-wide" id="password" name="password"
                                    required />

                                <label for="password_confirmation">
                                    Confirm Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" class="form-input form-wide" id="password_confirmation" name="password_confirmation"
                                    required />

                                <div class="form-footer mb-2">
                                    <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End .main -->
@endsection
