 <!-- Plugins JS File -->
 <script src="{{ URL::asset('porto/') }}/assets/js/jquery.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/plugins.min.js"></script>
    <script src="{{ URL::asset('porto/') }}/assets/js/jquery.appear.min.js"></script>

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
