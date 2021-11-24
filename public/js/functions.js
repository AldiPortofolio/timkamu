function initModalScripts() {
	$('.modal').on('shown.bs.modal', function () {
        $(this).find('#focusfirst').focus()
    });

    $('.modal.splash').modal('show');
}

function manaUiMobileMenu(){

	// nav
	$('body').on('click', '.mobile-menu-button', function() {
		$('.site-overlay').addClass('active');
		$('#nav-tray').addClass('active');
		$('#nav-tray').scrollTop(0);
		e.stopPropagation();
	});
	$('body').on('click', '.nav-tray-close', function() {
		$('.site-overlay').removeClass('active');
		$('#nav-tray').removeClass('active');
	});
	$('body').on('click', '.my-profile-modal-trigger', function() {
		$('.site-overlay').removeClass('active');
		$('#nav-tray').removeClass('active');
	});

	// video nav
	$('body').on('click', '.video-menu-button', function(e) {
		$('.site-overlay').addClass('active');
		$('#games-tray').addClass('active');
		$('#games-tray').scrollTop(0);
		e.stopPropagation();
	});
	$('body').on('click', '.games-nav-tray-close', function() {
		$('.site-overlay').removeClass('active');
		$('#games-tray').removeClass('active');
	});

	// match info
	$('body').on('click', '.view-match-info', function(e) {
		$('.site-overlay').addClass('active');
		$('#match-info').addClass('active');
		$('#match-info').scrollTop(0);
		e.stopPropagation();
	});
	$('body').on('click', '.tray-close-top', function() {
		$('.site-overlay').removeClass('active');
		$('#match-info').removeClass('active');
	});

	// game event selector
	$('body').on('click', '.view-game-categories', function(e) {
		$('.site-overlay').addClass('active');
		$('#event-category').addClass('active');
		$('#event-category').scrollTop(0);
		e.stopPropagation();
	});
	$('body').on('click', '.tray-close-top-category', function() {
		$('.site-overlay').removeClass('active');
		$('#event-category').removeClass('active');
	});
	$('body').on('click', '.select-game-category', function(e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = loc1.find('img').attr('src');
		var loc3 = loc1.find('.title').html();

		var loc4 = $('.game-event-select');

		loc1.addClass('loading');

		setTimeout(function() {

			loc4.find('img').attr('src',loc2);
			loc4.find('.title-replace').html(loc3);

		    $('.site-overlay').removeClass('active');
			$('#event-category').removeClass('active');
		}, 500);  

		setTimeout(function() {
			loc1.removeClass('loading');
		}, 1000);  
	});
	$('body').on('click', '.event-view-btn', function(e) {
		e.preventDefault();

		var loc1 = $(this);

		loc1.addClass('loading'); 
	});
	$('body').on('click', '.close-match-info', function(e) {
		e.preventDefault();
		$('.site-overlay').removeClass('active');
		$('#match-info').removeClass('active'); 
	});

	// scrolled nav 
	$('body').on('click', '.scrolled-match-btn', function() {
		$('.video-menu-button').click();
	});
	$('body').on('click', '.scrolled-menu-btn', function() {
		$('.mobile-menu-button').click();
	});

	// link game events opens featured matches
	
	$('body').on('click', '.nav-match-trigger', function() {
		$('.nav-tray-close').click();
		$('.video-menu-button').click();
	});

	// general
	$('body').on('click', '.site-overlay', function() {
		$('.site-overlay').removeClass('active');
		$('#nav-tray').removeClass('active');
		$('#games-tray').removeClass('active');
		$('#match-info').removeClass('active');
		$('#event-category').removeClass('active');
	});

	// scroll and show
	var controller = new ScrollMagic.Controller();
	new ScrollMagic.Scene({
		offset: 150
	})
		.setClassToggle("#scrolled-nav","active")
		.addTo(controller);
}

function initDesktopMenu(){
	$('.desktop-profile-menu-trigger').on('click', function(e) {
		e.preventDefault();
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('.main-nav-submenu-overlay, .main-nav-submenu').removeClass('active');
		} else {
			$(this).addClass('active');
			$('.main-nav-submenu-overlay, .main-nav-submenu').addClass('active');
		}
		e.stopPropagation();
	});
	$('.main-nav-submenu-overlay').on('click', function() {
		$('.main-nav-submenu-overlay, .main-nav-submenu, .desktop-profile-menu-trigger').removeClass('active');
	});
}

function initMobileMenu(){
	$('.hamburger').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--main').addClass('active');
		$('.main-nav-submenu-overlay, .main-nav-submenu, .desktop-profile-menu-trigger').removeClass('active');
		
		// close event mobile bottom nav
		$('.mb-right-panel .mb-event-close').click();
	});

	$('.tray--close').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .mbtray').removeClass('active');
	});

	$('.tray--trigger').on('click', function(e) {
		e.preventDefault();
		var tgt = $(this).attr('data-target');
		$('.mbtray').removeClass('active');
		$('.'+tgt).addClass('active');
	});
}

// profile page submenu selector
function mobileProfileSubmenu(){
	$('.mobile--profile--area-selector').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--profile-submenu').addClass('active');
		e.stopPropagation();
	});
}

// games event page submenus
function mobileEventsSubmenu(){
	$('.mobile-event-index .mobile-games-selector.trigger').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--event-filter-games').addClass('active');
	});
	$('.tray--event-filter-games .mobile-games-selector a').on('click', function(e) {
		e.preventDefault();
		var gameName = $(this).attr('data-name');
		var gameClass = $(this).attr('data-class');
		$('.mobile-games-selector.trigger a').removeClass().addClass(gameClass).html(gameName);
		$('.mboverlay, .tray--event-filter-games').removeClass('active');
	});
	$('.mobile-event-index .mobile--profile--area-selector.mth-filter').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--event-filter-submenu-mth').addClass('active');
	});
	$('.mobile-event-index .mobile--profile--area-selector.past-filter').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--event-filter-submenu-past').addClass('active');
	});
}

// teams/detail page submenu selector
function mobileTeamsSubmenu(){
	$('.mobile--teams--area-selector').on('click', function(e) {
		e.preventDefault();
		$('.mboverlay, .tray--teams-submenu').addClass('active');
		e.stopPropagation();
	});
	$('.mobile-team-submenu-trigger').on('click', function(e) {
		e.preventDefault();
		var tgt = $(this).attr('data-target');
		var replaceNavText = $(this).attr('data-info');
		$('.mboverlay, .tray--teams-submenu, .mobile-team-section').removeClass('active');
		$('.'+tgt).addClass('active');
		$('.mobile--teams--area-selector span').html(replaceNavText);
		e.stopPropagation();
	});
}

function convertToRupiah(angka) {
	var rupiah = '';
	var angkarev = angka.toString().split('').reverse().join('');
	for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ',';
	return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
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

$('.btn-recharge-lp').on('click', function (event) {
	event.preventDefault();

	window.open("{{ url('purchase/detail?name=lp') }}", "_blank");
})

// scripts for top up pages
function initTopUpScripts(){
	// nominal button
	$('body').on('click', '.nominal-choice-btn', function(e) {
		e.preventDefault();

		target = $(this);
		target2 = $('.nominal-choice-btn');

		target2.removeClass('active');
		target.addClass('active');
	});

	// pg button
	$('body').on('click', '.pg-choice-btn', function(e) {
		e.preventDefault();

		target = $(this);
		target2 = $('.pg-choice-btn');

		target2.removeClass('active');
		target.addClass('active');
	});

	// beli button
	// $('body').on('click', '.buy-diamond-btn', function(e) {
	// 	e.preventDefault();

	// 	var target = $(this);

	// 	// show spinner
	// 	$(this).addClass('loading');
	// });
}

// scripts for top up pages
function initCopyToClipboard(){
	// copy referral code
	$('body').on('click', '#copy-referral', function () {
		var copyText = document.getElementById("copy-referral-input");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999);

		/* Copy the text inside the text field */
		document.execCommand("copy");

		$('.modal').modal('hide');
		$('#referral-code-copied').modal('show');
	});

	$('body').on('click', '#copy-referral-profile', function () {
		var copyText = document.getElementById("copy-referral-input-profile");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999);

		/* Copy the text inside the text field */
		document.execCommand("copy");

		$('.modal').modal('hide');
		$('#referral-code-copied').modal('show');
	});
}


