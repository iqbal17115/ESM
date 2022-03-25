@extends('layouts.ecommerce')
@section('content')
    <main class="main main-test">
        <div class="container checkout-container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{ route('cart') }}">Shopping Cart</a>
                </li>
                <li class="active">
                    <a href="{{ route('checkout') }}">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="#">Order Complete</a>
                </li>
            </ul>
            @if (!Auth::user())
                <div class="login-form-container">
                    <h4>Do You Have Account?
                        <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
                    </h4>

                    <div id="collapseOne" class="collapse">
                        <div class="login-section feature-box">
                            <div class="feature-box-content">
                                <form method="POST" action="{{ route('customer_sign_in') }}" id="login-form">
                                    @csrf
                                    <p>
                                        If you have shopped with us before, please enter your details below. If you are a
                                        new
                                        customer, please proceed to the Billing & Shipping section.
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Username or email <span
                                                        class="required">*</span></label>
                                                <input type="tel" name="mobile" id="mobile" class="form-control"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Password <span
                                                        class="required">*</span></label>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn">LOGIN</button>

                                    <div class="form-footer mb-1">
                                        <div class="custom-control custom-checkbox mb-0 mt-0">
                                            <input type="checkbox" class="custom-control-input" id="lost-password" />
                                            <label class="custom-control-label mb-0" for="lost-password">Remember
                                                me</label>
                                        </div>

                                        <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="checkout-discount">
                <h4>Have a coupon?
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
                </h4>

                <div id="collapseTwo" class="collapse">
                    <div class="feature-box">
                        <div class="feature-box-content">
                            <p>If you have a coupon code, please apply it below.</p>

                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm w-auto" placeholder="Coupon code"
                                        required="" />
                                    <div class="input-group-append">
                                        <button class="btn btn-sm mt-0" type="submit">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing details</h2>

                            <form method="POST" action="{{ route('confirm-order') }}" id="checkout-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="text"
                                                @if (Auth::user()) value="{{ Auth::user()->name }}" @endif
                                                name="fName" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="text" name="mobile"
                                                value="@if (Auth::user()) {{ Auth::user()->mobile }} @endif"
                                                class="form-control" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="select-custom">
                                    <label>Region
                                        <abbr class="required" title="required">*</abbr></label>
                                    <select name="division_id" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @foreach ($divisions as $division)
                                          <option @if(isset(Auth::user()->Contact)) @if (Auth::user()->Contact->division_id==$division->id) selected @endif  @endif value="{{ $division->id }}">{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-1 pb-2">
                                    <label>Shipping address
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="form-control" name="shipping_address"
                                        value="@if (Auth::user()) {{ Auth::user()->address }} @endif"
                                        name=placeholder="House number and street name" required />
                                </div>

                                <div class="form-group">
                                    <label class="order-comments">Order notes (optional)</label>
                                    <textarea class="form-control"
                                        placeholder="Notes about your order, e.g. special notes for delivery."
                                        ></textarea>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->

                <div class="col-lg-5">
                    <div class="order-summary">
                        <h3>YOUR ORDER</h3>

                        <table class="table table-mini-cart">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp
                                @if ($cardBadge['data']['products'])
                                    @php $totalPrice = $cardBadge['data']['total_price'] @endphp
                                @endif
                                @foreach ($cardBadge['data']['products'] as $productId => $product)
                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                @if (strlen($product['Info']['product_name']) > 50)
                                                    {{ \Illuminate\Support\Str::limit($product['Info']['product_name'], 50) . '...' }}
                                                @else
                                                    {{ $product['Info']['product_name'] }}
                                                @endif
                                                ×
                                                <span class="product-qty">
                                                    {{ $product['quantity'] }}
                                                </span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>
                                                @if ($currencySymbol)
                                                    {{ $currencySymbol->symbol }}
                                                @endif
                                                {{ $product['total_price'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>

                                    <td class="price-col">
                                        <span>
                                            @if ($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                            @endif
                                            {{ $totalPrice }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-shipping">
                                    <td class="text-left" colspan="2">
                                        <h4 class="m-b-sm">Discount</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio d-flex">
                                                @if ($currencySymbol)
                                                    {{ $currencySymbol->symbol }}
                                                @endif
                                                0
                                            </div>
                                            <!-- End .custom-checkbox -->
                                        </div>
                                        <!-- End .form-group -->

                                    </td>

                                </tr>

                                <tr class="order-total">
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <b class="total-price">
                                            <span>
                                                <span>
                                                    @if ($currencySymbol)
                                                        {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $totalPrice }}
                                                </span>
                                            </span>
                                        </b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        {{-- <div class="payment-methods">
                            <h4 class="">Payment methods</h4>
                            <div class="info-box with-icon p-0">
                                <p>
                                    Sorry, it seems that there are no available payment methods for your state. Please
                                    contact us if you require assistance or wish to make alternate arrangements.
                                </p>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                            Place order
                        </button>
                    </div>
                    <!-- End .cart-summary -->
                </div>
                <!-- End .col-lg-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->
@endsection
