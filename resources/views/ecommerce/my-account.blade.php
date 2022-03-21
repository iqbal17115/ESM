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

        <div class="container account-container custom-account-container">
            <div class="row">
                <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                    <h2 class="text-uppercase">My Account</h2>
                    <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                aria-controls="dashboard" aria-selected="true">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                                aria-controls="order" aria-selected="true">Orders</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                                aria-controls="address" aria-selected="false">Addresses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                aria-controls="edit" aria-selected="false">Account
                                details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                        <div class="dashboard-content">
                            <p>
                                Hello <strong class="text-dark">{{ Auth::user()->name}}</strong> (not
                                <strong class="text-dark">
                                    {{ Auth::user()->name}}
                                </strong>?
                                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-link ">Log out</a>)
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </p>

                            <p>
                                From your account dashboard you can view your
                                <a class="btn btn-link link-to-tab" href="#order">recent orders</a>,
                                manage your
                                <a class="btn btn-link link-to-tab" href="#address">shipping and billing
                                    addresses</a>, and
                                <a class="btn btn-link link-to-tab" href="#edit">edit your password and account
                                    details.</a>
                            </p>

                            <div class="mb-4"></div>

                            <div class="row row-lg">
                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#order" class="link-to-tab"><i class="sicon-social-dropbox"></i></a>
                                        <div class="feature-box-content">
                                            <h3>ORDERS</h3>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#address" class="link-to-tab"><i class="sicon-location-pin"></i></a>
                                        <div class="feature-box-content">
                                            <h3>ADDRESSES</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="login.html"><i class="sicon-logout"></i></a>
                                        <div class="feature-box-content">
                                            <h3>LOGOUT</h3>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .row -->
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="order" role="tabpanel">
                        <div class="order-content">
                            <h3 class="account-sub-title d-none d-md-block"><i
                                    class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
                            <div class="order-table-container text-center">
                                <table class="table table-order text-left">
                                    <thead>
                                        <tr>
                                            <th class="order-serial">#</th>
                                            <th class="order-id">ORDER</th>
                                            <th class="order-date">DATE</th>
                                            <th class="order-status">STATUS</th>
                                            <th class="order-price">TOTAL</th>
                                            <th class="order-action">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if (isset($contact->Order))
                                            @foreach ($contact->Order as $order)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $order->code }}</td>
                                                    <td>
                                                        {{ date('d F Y', strtotime($order->order_date)) }}
                                                    </td>
                                                    <td>
                                                        @if ($currencySymbol)
                                                            <span
                                                                style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                        @endif
                                                        {{ $order->total_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $order->status }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('order-details', ['id' => $order->id]) }}"
                                                            class="btn btn-info"
                                                            style="background-color: #ff5c00;;margin-top:5px;padding:0.35em 1.2em;border:0.1em solid #FFFFFF;font-weight:300;color:#FFFFFF;text-align:center;font-weight:bold;"><i
                                                                class="fa fa-eye font-size-18" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center p-0" colspan="5">
                                                    <p class="mb-5 mt-5">
                                                        No Order has been made yet.
                                                    </p>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <hr class="mt-0 mb-3 pb-2" />

                                <a href="{{ route('search-category-wise') }}" class="btn btn-dark">Go Shop</a>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <h3 class="account-sub-title d-none d-md-block mb-1"><i
                                class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
                        <div class="addresses-content">
                            <p class="mb-4">
                                {{-- The following addresses will be used on the checkout page by
                                default. --}}
                                @if(Auth::user() && Auth::user()->Contact)<b>{{Auth::user()->Contact->address}}</b>@endif
                            </p>

                            <div class="row">
                                <div class="address col-md-6">
                                    <div class="heading d-flex">
                                        <h4 class="text-dark mb-0">Billing address</h4>
                                    </div>

                                    <div class="address-box">
                                        You have not set up this type of address yet.
                                    </div>

                                    {{-- <a href="#billing" class="btn btn-default address-action link-to-tab">Add
                                        Address</a> --}}
                                </div>

                                <div class="address col-md-6 mt-5 mt-md-0">
                                    <div class="heading d-flex">
                                        <h4 class="text-dark mb-0">
                                            Shipping address
                                        </h4>
                                    </div>
                                    <p>
                                        @if(Auth::user() && Auth::user()->Contact)<b>{{Auth::user()->Contact->shipping_address}}</b>@endif
                                    </p>

                                    {{-- <div class="address-box">
                                        You have not set up this type of address yet.
                                    </div> --}}

                                    {{-- <a href="#shipping" class="btn btn-default address-action link-to-tab">Add
                                        Address</a> --}}
                                </div>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                    {{-- <div class="tab-pane fade" id="billing" role="tabpanel">
                        <div class="address account-content mt-0 pt-2">
                            <h4 class="title">Billing address</h4>

                            <form class="mb-2" action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First name <span class="required">*</span></label>
                                            <input type="text" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name <span class="required">*</span></label>
                                            <input type="text" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company </label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="select-custom">
                                    <label>Country / Region <span class="required">*</span></label>
                                    <select name="orderby" class="form-control">
                                        <option value="" selected="selected">British Indian Ocean Territory
                                        </option>
                                        <option value="1">Brunei</option>
                                        <option value="2">Bulgaria</option>
                                        <option value="3">Burkina Faso</option>
                                        <option value="4">Burundi</option>
                                        <option value="5">Cameroon</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Street address <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="House number and street name"
                                        required />
                                    <input type="text" class="form-control"
                                        placeholder="Apartment, suite, unit, etc. (optional)" required />
                                </div>

                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>State / Country <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Postcode / ZIP <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group mb-3">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="number" class="form-control" required />
                                </div>

                                <div class="form-group mb-3">
                                    <label>Email address <span class="required">*</span></label>
                                    <input type="email" class="form-control" placeholder="editor@gmail.com" required />
                                </div>

                                <div class="form-footer mb-0">
                                    <div class="form-footer-right">
                                        <button type="submit" class="btn btn-dark py-4">
                                            Save Address
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End .tab-pane --> --}}

                    {{-- <div class="tab-pane fade" id="shipping" role="tabpanel">
                        <div class="address account-content mt-0 pt-2">
                            <h4 class="title mb-3">Shipping Address</h4>

                            <form class="mb-2" action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First name <span class="required">*</span></label>
                                            <input type="text" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name <span class="required">*</span></label>
                                            <input type="text" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company </label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="select-custom">
                                    <label>Country / Region <span class="required">*</span></label>
                                    <select name="orderby" class="form-control">
                                        <option value="" selected="selected">British Indian Ocean Territory
                                        </option>
                                        <option value="1">Brunei</option>
                                        <option value="2">Bulgaria</option>
                                        <option value="3">Burkina Faso</option>
                                        <option value="4">Burundi</option>
                                        <option value="5">Cameroon</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Street address <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="House number and street name"
                                        required />
                                    <input type="text" class="form-control"
                                        placeholder="Apartment, suite, unit, etc. (optional)" required />
                                </div>

                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>State / Country <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Postcode / ZIP <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-footer mb-0">
                                    <div class="form-footer-right">
                                        <button type="submit" class="btn btn-dark py-4">
                                            Save Address
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End .tab-pane --> --}}
                </div><!-- End .tab-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
