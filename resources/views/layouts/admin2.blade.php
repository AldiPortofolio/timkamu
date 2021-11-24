<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('admin2/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('admin2/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('admin2/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin2/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('admin2/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('admin2/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('admin2/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('admin2/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin2/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('admin2/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin2/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin2/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin2/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('admin2/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin2/bootstrap/css/bootstrap.min.css') }}">

    <!-- admin css -->
    <link rel="stylesheet" href="{{ asset('admin2/css/admin2.css?v=4') }}">

    <title>Timkamu Admin</title>
</head>
<body>
	@yield('content')

    @include('includes.admin2.modals')

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('admin2/vendors/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('admin2/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('admin2/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- feathericons -->
    <script src="{{ asset('admin2/vendors/feathericons/feathericons.js') }}"></script>

    <!-- Scripts for ALL pages -->
    <script type="text/javascript">

        // spinners
        function spinnerOnClick(obj,dbFunction,duration){
            obj.addClass('loading');
            setTimeout(function() {
                dbFunction();
                obj.removeClass('loading');
            }, duration);  
        }

        $(document).ready(function() {

            // feather icons
            feather.replace();

            // admin nav scripts
            $("body").on('click', '.sidebar-link.has-descendants > a', function(e) {
                e.preventDefault();

                obj1 = $(this).parents('.sidebar-link');
                obj2 = $('.sidebar-link.has-descendants');

                if (!obj1.hasClass('active')) {
                    obj2.removeClass('active');
                    obj1.addClass('active');
                } else {
                    obj2.removeClass('active');
                }
            });

            // table row behave as link
            $("body").on('click', '.as-link', function() {
                window.location = $(this).attr("href");
            });

            // first focus on page load
            $('.first-focus').focus();

            // modal focus first input
            $('.modal').on('shown.bs.modal', function () {
                $('.first-focus').focus();
            });

            // member quick stats modal
            $('#member-stats').on('shown.bs.modal', function () {
                $('.quick-stats-container').addClass('loading');
                $('.modal:not(.close-all)').modal('hide');
                setTimeout(function() {
                    $('.quick-stats-container').removeClass('loading');
                }, 1000);  
            });

            // username search modal
            $('body').on('keypress', '.search-by-username-modal-input',function(e) {
                if(e.which == 13) {
                    if($('.search-by-username-modal-input').length <= 3) {
                        return false;
                    }
                    $('.user-search-by-username-btn').click();
                }
            });
            $('body').on('click', '.user-search-by-username-btn', function () {
                spinnerOnClick($(this),searchUsernameModal,1000);
            });
            function searchUsernameModal(){
                // do db work here
                var username = $('.search-by-username-modal-input').val();
                // show table
                $('.user-result-table-container').removeClass('d-none');

                // refocus on input
                $('.search-by-username-modal-input').focus();
            }
        });
    </script>

    @yield('js')
</body>
</html>