<!doctype html>

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Porto - Bootstrap eCommerce Template</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Bootstrap eCommerce Template">
	<meta name="author" content="SW-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">


	<script>
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Shadows+Into+Light:400', 'Playfair+Display:900' ] }
		};
		( function ( d ) {
			var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
			wf.src = 'assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore( wf, s );
		} )( document );
	</script>

	<!-- Plugins CSS File -->

<!-- Plugins CSS File -->
<link rel="stylesheet" href="{{ URL::asset('porto/') }}/assets/css/bootstrap.min.css">

<!-- Main CSS File -->
<link rel="stylesheet" href="{{ URL::asset('porto/') }}/assets/css/style.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('porto/') }}/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('porto/') }}/assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body>


    <!-- Scroll-top-end-->
    <div class="page-wrapper">
    <!-- header-area -->
    @include('frontend.header_optional')
    <!-- header-area-end -->

    <!-- main-area -->

    @yield('content')
    <!-- main-area-end -->

    @include('frontend.footer_optional')
</div>

    <!-- Start Mobile Responseive Footer -->
    @include('frontend.mobile-responsive-footer')
    <!-- Start Mobile Responseive Footer -->
    {{-- Start Messenger Plugin --}}
         <!-- Messenger Chat plugin Code -->
    {{-- <div id="fb-root"></div> --}}

    <!-- Your Chat plugin code -->
    {{-- <div id="fb-customer-chat" class="fb-customerchat">
    </div> --}}




    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>


<!-- Plugins JS File -->
<script src="{{ URL::asset('porto/') }}/assets/js/jquery.min.js"></script>
<script src="{{ URL::asset('porto/') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::asset('porto/') }}/assets/js/plugins.min.js"></script>

<!-- Main JS File -->
<script src="{{ URL::asset('porto/') }}/assets/js/main.min.js"></script>

<!-- Google Map-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
<script src="{{ URL::asset('porto/') }}/assets/js/map.js"></script>

</body>

</html>
