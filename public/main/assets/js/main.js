/***************************************************
==================== JS INDEX ======================
****************************************************
01. theme-js
02. back-to-top
04. search form
05. magnificPopup video view
06. Date and time js
07. increment-dreckment-btn
08. tp-hero-quantity
09. tp-hero-quantity-toggle-2
10. tp-text-slider-slider
11. Masonary Js
12. magnificPopup img view
13. all toggle btn
14. data-width
15. Counter Js
16. jarallax Js
17. Parallax Js
18. tp-onepage-menu
19. tp-place-wishlist
20. tp-place-wishlist
21. Wow Js
22. PreLoader Js
23. youtube video
24. Password Toggle Js
25. tp_ecommerce
26. Nice Select Js
 ****************************************************/

(function ($) {
	"use strict";
	var windowOn = $(window)
	
	////////////////////////////////////////////////////
	// 01. theme-js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});
	
	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});


	// header-sticky
	windowOn.on('scroll', function () {
		var scroll = windowOn.scrollTop();
		if (scroll < 200) {
			$("#header-sticky").removeClass("header-sticky");
		} else {
			$("#header-sticky").addClass("header-sticky");
		}
	});

	if ($('.tp-header-height').length > 0) {
		var headerHeight = document.querySelector(".tp-header-height");      
		var setHeaderHeight = headerHeight.offsetHeight;	
		$(".tp-header-height").each(function () {
			$(this).css({
				'height' : $(this).height()
			});
		});
	}

	// mobile menu 
	var tpMenuWrap = $('.tp-mobile-menu-active > ul').clone();
	var tpSideMenu = $('.tp-offcanvas-menu nav');
	tpSideMenu.append(tpMenuWrap);
	if ($(tpSideMenu).find('.tp-submenu, .tp-mega-menu').length != 0) {
		$(tpSideMenu).find('.tp-submenu, .tp-mega-menu').parent().append
			('<button class="tp-menu-close"><i class="far fa-chevron-right"></i></button>');
	}
	var sideMenuList =
		$('.tp-offcanvas-menu nav > ul > li button.tp-menu-close, .tp-offcanvas-menu nav > ul li.has-dropdown > a');
	$(sideMenuList).on('click', function (e) {
		e.preventDefault();
		if (!($(this).parent().hasClass('active'))) {
			$(this).parent().addClass('active');
			$(this).siblings('.tp-submenu, .tp-mega-menu').slideDown();
		} else {
			$(this).siblings('.tp-submenu, .tp-mega-menu').slideUp();
			$(this).parent().removeClass('active');
		}
	});

	// offcanvas
	$(".tp-offcanvas-open-btn").on("click", function () {
		$(".tp-offcanvas-area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".tp-offcanvas-close-btn").on("click", function () {
		$(".tp-offcanvas-area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});

	// // 09. Body overlay Js
	$(".body-overlay").on("click", function () {
		$(".tp-offcanvas-area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 02. back-to-top
	var btn = $('#back_to_top');
	var btn_wrapper = $('.back-to-top-wrapper');

	windowOn.scroll(function() {
	if (windowOn.scrollTop() > 300) {
		btn_wrapper.addClass('back-to-top-btn-show');
	} else {
		btn_wrapper.removeClass('back-to-top-btn-show');
	}
	});

	btn.on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop:0}, '300');
	});

	if ($('.tp-header-height').length > 0) {
		var headerHeight = document.querySelector(".tp-header-height");      
		var setHeaderHeight = headerHeight.offsetHeight;	
		$(".tp-header-height").each(function () {
			$(this).css({
				'height' : $(this).height()
			});
		});
	}

	////////////////////////////////////////////////////
	// 03. all-toggle-btn-here
	
	if ($("#tp-header-usd-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-usd-toggle').contains(e.target)){
				$(".tp-usd-list").toggleClass("tp-usd-list-open");
			}
			else{
				$(".tp-usd-list").removeClass("tp-usd-list-open");
			}
		});
	}

	////////////////////////////////////////////////////
	// 04. search form
	$(".tp-search-click").on("click", function () {
		$(".tp-header-input-toggle,.input-body-overlay").addClass("active");
	});

	$(".input-body-overlay").on("click", function () {
		$(".tp-header-input-toggle,.input-body-overlay").removeClass("active");
	});
	

	////////////////////////////////////////////////////
	// 05. magnificPopup video view
	$(".popup-video").magnificPopup({
		type: "iframe",
	});

	////////////////////////////////////////////////////
	// 06. Date and time js
	flatpickr("input[name='datetime-local']", {
		dateFormat: "Y-m-d"
	});


	var $items = $('.tp-booking-active');
	if($items.length){
		$(".flatpickr-calendar").addClass("calender-active");
	}

	////////////////////////////////////////////////////
	// 07. increment-dreckment-btn
	$('.tp-increment').on('click', function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});

	$('.tp-dreckment').on('click', function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});

	
		$('.tp-hero-quantity-toggle').on('click', function (e) {
			e.stopPropagation(); // Prevent event from bubbling up to document click handler
			let toggle = $(this); // Scope toggle to this click event
			let container = toggle.parent('.tp-hero-quantity');

			// Toggle active class and dropdown visibility for this specific element
			if (toggle.hasClass('active')) {
					toggle.removeClass('active');
					toggle.next('.tp-hero-quantity-active').removeClass('tp-usd-list-open');
			} else {
					$('.tp-hero-quantity-toggle').removeClass('active');
					$('.tp-hero-quantity-active').removeClass('tp-usd-list-open');
					toggle.addClass('active');
					toggle.next('.tp-hero-quantity-active').addClass('tp-usd-list-open');
			}
	});

	$(document).on('click', function (e) {
			if (!$(e.target).closest('.tp-hero-quantity').length) {
					$('.tp-hero-quantity-toggle').removeClass('active');
					$('.tp-hero-quantity-active').removeClass('tp-usd-list-open');
			}
	});



	////////////////////////////////////////////////////
	// 11. Masonary Js
	$('.grid').imagesLoaded(function () {
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: '.grid-item',
			}
		});
		// filter items on button click
		$('.masonary-menu').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});

		//for menu active class
		$('.masonary-menu button').on('click', function (event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});
	});

	////////////////////////////////////////////////////
	// 12. magnificPopup img view
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		},
		mainClass: 'mfp-with-zoom',
		removalDelay: 500,
	});

	$('.popup-gmaps').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		preloader: false,
		fixedContentPos: false
	});

	////////////////////////////////////////////////////
	// 13. all toggle btn

	$('#show-more-content, #show-less').hide();


	$('#show-more').on('click', function () {
		$('#show-more-content').slideToggle(900);
		if ($(this).text() === "Read More") {
			$(this).text("Read Less");
		} else {
			$(this).text("Read More");
		}
	});



	////////////////////////////////////////////////////
	// 15. Counter Js
	new PureCounter();
	new PureCounter({
		filesizing: true,
		selector: ".filesizecount",
		pulse: 2,
	});

	////////////////////////////////////////////////////
	// 16. jarallax Js
	if ($('.jarallax').length > 0) {
		$('.jarallax').jarallax({
			speed: 0.2,
			imgWidth: 1200,
			imgHeight: 520,
		});
	};

		////////////////////////////////////////////////////
	// 17. Parallax Js
	if ($('.scene').length > 0) {
		$('.scene').parallax({
			scalarX: 10.0,
			scalarY: 15.0,
		});
	};
	
	if ($('.scene-2').length > 0) {
		$('.scene-2').parallax({
			scalarX: 15.0,
			scalarY: 15.0,
		});
	};

	////////////////////////////////////////////////////
	// 18. tp-onepage-menu
	function scrollNav() {
		$('.tp-onepage-menu li a').click(function(){
		  $(".tp-onepage-menu li a.active").removeClass("active");     
		  $(this).addClass("active");
		  
		  $('html, body').stop().animate({
			scrollTop: $($(this).attr('href')).offset().top - 120
		  }, 300);
		  return false;
		});
	  }
	scrollNav();

	////////////////////////////////////////////////////
	// 21. Wow Js
	new WOW().init();

	////////////////////////////////////////////////////
	// 22. PreLoader Js
	
	windowOn.on('load', function () {
		$("#loading").fadeOut(500);
	});

	////////////////////////////////////////////////////
	// 23. youtube video

	$('.youtube-bg').YTPlayer({

		videoURL: "hNN9Q3GuWEM",

		containment: '.youtube-bg',

		autoPlay: true,

		loop: true,

		mute: true

	});


	////////////////////////////////////////////////////
	// 24. Password Toggle Js
	if($('.password-show-toggle').length > 0){

		var showBtn = $('.password-show-toggle');

		showBtn.each(function (e) {
			$(this).on('click', function(x){
				let inputField = $(this).parent().find('input');
				if(inputField.attr('type') === "password"){
					inputField.attr('type', 'text')
					$(this).children('.open-eye-icon').css({
						'display' : 'block'
					})
					$(this).children('.close-eye-icon').css({
						'display' : 'none'
					})
				}else{
					inputField.attr('type', 'password')
					$(this).children('.open-eye-icon').css({
						'display' : 'none'
					})
					$(this).children('.close-eye-icon').css({
						'display' : 'block'
					})
				}
			})
		})
	}

	////////////////////////////////////////////////////
	// 25. tp_ecommerce
	function tp_ecommerce() {
		$('.tp-cart-minus').on('click', function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
	
		$('.tp-cart-plus').on('click', function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});

		$('#showlogin').on('click', function () {
			$('#checkout-login').slideToggle(900);
		});


		$('#showcoupon').on('click', function () {
			$('#checkout_coupon').slideToggle(900);
		});


		$('#cbox').on('click', function () {
			$('#cbox_info').slideToggle(900);
		});

		$('#ship-box').on('click', function () {
			$('#ship-box-info').slideToggle(1000);
		});
	}
	tp_ecommerce();

	////////////////////////////////////////////////////
	// 26. Nice Select Js
	$('.select').niceSelect();
	$('.tp-header-search-category select').niceSelect();

})(jQuery);
