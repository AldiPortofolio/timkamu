<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('bootstrap/cdn/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/cdn/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/cdn/bootstrap.min.js') }}"></script>
<script 
      type="text/javascript"
      src="{{ ENV('MIDTRANS_JSURL') }}"
      data-client-key="{{ ENV('MIDTRANS_CK') }}"
    ></script>

<!-- feathericons -->
<script src="{{ asset('vendors/feathericons/feathericons.js') }}"></script>

<!-- scrollmagic -->
<!-- <script src="{{ asset('vendors/scrollmagic/TweenMax.min.js') }}"></script>
<script src="{{ asset('vendors/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('vendors/scrollmagic/animation.gsap.min.js') }}"></script> -->

<!-- custom scripts -->
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<!-- Scripts for ALL pages -->
<script type="text/javascript">
	$(document).ready(function() {

		// feather icons
		feather.replace();

		// tooltips
		$('[data-toggle="tooltip"]').tooltip();

		// various modal scripts
		initModalScripts();

		// desktop menu initiation
		initDesktopMenu();

		// for changing avatar
		initAvatarChangeViaModal();

		// mobile menu
		if($(window).width() <= 1330){

			// mobile menu initiation
			initMobileMenu();
		}
	});
</script>

<!-- Scripts for Signed-In pages -->
@auth
<script type="text/javascript">
	// for exp bar width
	initExpBarWidth();
	function initExpBarWidth(){
		@if($total_exp > $next_rank->value)
			var widthBar = 101;
		@else
			var widthBar = "{{ ((($total_exp - $current_rank->value)/($next_rank->value - $current_rank->value))*100) }}";
		@endif
		if(widthBar > 100) {
		    $('body').append('<style> .right:before, .area-exp-bar:before, .mb-exp-snap-exp-bar:before {width:100% !important;}</style>');
		} else {
		    $('body').append('<style>.exp-wrapper .right:before, .area-exp-bar:before, .mb-exp-snap-exp-bar:before {width:'+ widthBar +'% !important;}</style>');
		}
	}
</script>
@endauth

<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	function convertToRupiah(angka)
    {
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
        return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
    }

	function convertToDecimalFormat(angka)
	{
		var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
        return rupiah.split('',rupiah.length-1).reverse().join('');
	}

    function convertToAngka(rupiah)
    {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
	}

	$('.btn-recharge-lp').on('click', function(event) {
		event.preventDefault();
		
		window.open("{{ url('purchase/detail?name=lp') }}", "_blank");
	})

</script>