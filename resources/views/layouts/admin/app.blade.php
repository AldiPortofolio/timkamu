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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin2/bootstrap/css/bootstrap.min.css') }}">

    <!-- admin css -->
    <link rel="stylesheet" href="{{ asset('admin2/css/admin2.css?v=7') }}">

    <title>Timkamu Admin</title>
</head>
<body>
    @include('includes.admin.sidebar')
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
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ',';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function convertToDecimalFormat(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ',';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function convertToAngka(rupiah) {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }

        // spinners
        function spinnerOnClick(obj,dbFunction,duration){
            obj.addClass('loading');
            setTimeout(function() {
                dbFunction(obj);
            }, duration);  
        }

        $(document).ready(function() {
            // ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // feather icons
            feather.replace();

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
            }) 

            $('body').on('click', '.btn-sbmt-epbyid', function(e) {
                e.preventDefault();
                var id = $('#ep_event_id').val();

                var urlString = "{{ url('admin-tkmu/reports') }}/" + id;
                location.href = urlString;
            })

            $('body').on('click', '.btn-sbmt-epbtrbyid', function(e) {
                e.preventDefault();
                var id = $('#ep_betters_event_id').val();

                var urlString = "{{ url('admin-tkmu/report-participants?event=') }}" + id;
                location.href = urlString;
            })   

            // username search modal
            $('body').on('keypress', '.search-by-username-modal-input',function(e) {
                if(e.which == 13) {
                    $('.user-search-by-username-btn').click();
                }
            });

            $('body').on('click', '.user-search-by-username-btn', function () {
                spinnerOnClick($(this),searchUsernameModal,1000);
            });

            function searchUsernameModal(obj){
                // do db work here
                var username = $('.search-by-username-modal-input').val();
                var type = $('.search-by-type-modal-input').val();
                $.ajax({
                    url: "{{ url('admin-tkmu/search?username=') }}"+username+"&type="+type,
                    method: 'get',
                    success: function(result) {
                        // show table
                        $('.user-result-table-container tbody').html(result.users)
                        $('.user-result-table-container').removeClass('d-none');

                        // refocus on input
                        $('.search-by-username-modal-input').focus();      
                    },
                    complete: function (data) {
                        obj.removeClass('loading');
                    }
                })
            }  

            // member quick stats modal
            var userId = '';
            $('#member-stats').on('shown.bs.modal', function () {
                $('.quick-stats-container').addClass('loading');
                $('.modal:not(.close-all)').modal('hide');
                
                setTimeout(function() {
                    $.ajax({
                        url: "{{ url('admin-tkmu/search-detail?user=') }}"+userId,
                        method: 'get',
                        success: function(result) {
                            console.log(result)
                            $('#member-stats #username').text(result.users.username);
                            $('#member-stats #win-rate').text(result.users.win_rate+'%');
                            $('#member-stats #total-slips').text(result.users.total_slips);
                            $('#member-stats #win-slip').text(result.users.win_slip);
                            $('#member-stats #regitration-date').text(result.users.registration_date);
                            $('#member-stats #user-phone').html(result.users.phone);
                            $('#member-stats #user-email').html(result.users.email);

                            $('#member-stats #count-lp-recharge').text(result.users.count_lp_recharge);
                            $('#member-stats #amt-lp-recharge').text(result.users.amount_lp_recharge);
                            $('#member-stats #amt-lp').text(result.users.total_lp);
                            $('#member-stats #amt-bp').text(result.users.total_bp);
                            $('#member-stats #amt-coin').text(result.users.total_coin);

                            $('#member-stats #view-page').attr('href', result.users.url_view_page);
                            $('#member-stats #view-lp-transactions').attr('href', result.users.url_view_lp_transactions);
                            $('#member-stats #view-all-bets').attr('href', result.users.url_view_all_bets);
                            $('#member-stats #view-all-topups').attr('href', result.users.url_view_all_topups);
                            $('#member-stats #view-historical').attr('href', result.users.url_view_historical);
                        },
                        complete: function (data) {
                            $('.quick-stats-container').removeClass('loading');
                        }
                    })
                }, 1000);  
            });

            $('body').on('click', '.user-detail-by-id-btn', function(e) {
                e.preventDefault();

                userId = $(this).attr('data-user');
            })
        });
    </script>

    @yield('js')
</body>
</html>