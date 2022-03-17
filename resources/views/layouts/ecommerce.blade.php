<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@if($companyInfo) {{$companyInfo->name}} @endif</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('porto/') }}/assets/images/icons/favicon.png">

    @include('ecommerce.header-script')
</style>
</head>

<body>

<div class="page-wrapper">
     
        <!-- Start Header -->
        @include('ecommerce.header')
        <!-- End Header -->
       
          <!-- main-area -->
          @yield('content')
        <!-- main-area-end -->

        <!-- footer-area -->
          @include('ecommerce.footer')
        <!-- footer-area-end -->

    </div><!-- End .page-wrapper -->

    @include('ecommerce.loading-overlay')

    @include('ecommerce.mobile-menu')

    @include('ecommerce.sticky-navbar')

  
    @include('ecommerce.footer-script')
   
</body>

</html>
