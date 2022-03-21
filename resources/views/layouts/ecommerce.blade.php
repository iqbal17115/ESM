<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
    @if ($companyInfo)
        {{ $companyInfo->name }}
    @endif
    </title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('porto/assets/images/icons/favicon.png') }}">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800',
                    'Segoe+Script:300,400,500,600,700,800', 'Lato:300,400,500,600,700,800'
                ]
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('porto/') }}/assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('porto/assets/css/style.min.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('porto/') }}/assets/css/demo40.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('porto/') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('porto/') }}/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="{{ asset('porto/assets/css/custom_style.css') }}">
<style>
.top-left {
  background-color: rgb(235, 43, 43);
  color: white;
  padding-left: 6px;
}
@media only screen and (min-width: 768px) {
    .categories{
        margin-left: 80px;
    }
}
</style>
</head>

<body>

    <!-- Scroll-top-end-->
    <div class="page-wrapper">
        <!-- header-area -->
        @include('ecommerce.header')
        <!-- header-area-end -->

        <!-- main-area -->

        @yield('content')
        <!-- main-area-end -->

    </div>

    <!-- Start Mobile Responseive Footer -->
    @include('ecommerce.mobile-responsive-footer')
    <!-- Start Mobile Responseive Footer -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{ URL::asset('porto/') }}/assets/js/jquery.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/optional/isotope.pkgd.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/plugins.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/jquery.plugin.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/jquery.appear.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ URL::asset('porto/') }}/assets/js/main.min.js"></script>
    <script>
        $.ajaxSetup({
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>

</html>
