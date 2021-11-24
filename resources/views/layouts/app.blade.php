<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png?v=2') }}">
	<link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png?v=2">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <title>Timkamu.com</title> --}}
	

	@if(Request::is('events/*'))
		<title>{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com</title>
		<meta name="keywords" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
		<meta name="description" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
		
		<meta property="og:url" content="https://www.timkamu.com/events/detail/{{ $event->id}}" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }}" />
		<meta property="og:description" content="TimKamu - Tempat nongkrongnya anak e-sports" />
	@else
		<title>@yield('page_title') {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com</title>
		<meta name="keywords" content="TimKamu - Tempat nongkrongnya anak e-sports" />
		<meta name="description" content="TimKamu - Tempat nongkrongnya anak e-sports" />
	@endif


    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap/cdn/bootstrap.min.css') }}">

	<!-- fullpagejs -->
	<link rel="stylesheet" href="{{ asset('vendors/fullpagejs/fullpage.css') }}">

	<!-- Common CSS -->
	<link rel="stylesheet" href="{{ asset('css/layers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/common.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css?v=2') }}">

	<!-- components -->
	<link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/member.css') }}">
	<link rel="stylesheet" href="{{ asset('css/modals.css') }}">
</head>
<body class="@yield('body_class')">
    @yield('content')

	@include('includes.modal')
	@include('includes.script')
	@yield('js')

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		// only run this script above 992 viewport width
		const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
		if (+vw > 992){
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5f44fef2cc6a6a5947ae9ec1/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
			})();
		}
	</script>
	<!--End of Tawk.to Script-->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177302264-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-177302264-1');
	</script>

	<!-- Modal Finish Event-->
	<div id="event-finish" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Event Telah Berakhir</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p></p>
                    </div>
                </div>
                <div class="nwcls">
					<a href="#" data-dismiss="modal">Okay</a>
					<a href="#" class="ctagp btn-goto-system-mail">Go to System Mail</a>
                </div>
            </div>
        </div>
    </div>

	@auth
	<script>
		$(document).ready(function() {
			var idEvent = '';
			var abc = setInterval(
				function(){
					$.ajax({
						url: "{{ url('ajax/check-event-finish') }}/",
						method: 'get',
						success: function(result) {
							idEvent = result.id

							if(result.message !== 'no new finish event') {
								$('#event-finish .message p').html(result.message);
								$('#event-finish').modal('show')

								$('.menu-system-mail').addClass('new');
								clearInterval(abc);

								$.ajax({
									url: "{{ url('ajax/system-mail') }}/" + idEvent,
									method: 'get',
									success: function(result) {
										// 
									}
								})
							}
						}
					})
				}, 3000
			);

			$('.btn-goto-system-mail').on('click', function(e) {
				e.preventDefault();

				var urlString = "{{ url('profile/system-mail') }}";
				location.href = urlString;
			})
		})
	</script>
	@endauth
</body>
</html>
