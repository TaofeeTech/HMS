/***************************************************
==================== JS INDEX ======================
****************************************************
01. tp-hero-slider-active
02. tp-testimonial-slide
03. tp-gallery-slide
04. tp-testimonial-active
05. tp-destinations-slide
06. tp-testimonial-active-2
07. tp-gallery-slide
08. tp-postboxSlider-slide
09. tp-rooom-details-slide
****************************************************/

(function ($) {
	"use strict";
	
	////////////////////////////////////////////////////
	// 01. tp-hero-slider-active
	var gallery = new Swiper('.tp-hero-slider-active', {
		slidesPerView: 1,
		loop: true,
		autoplay: true,
		arrow: false,
		spaceBetween: 0,
		speed: 2000,
		effect: 'fade',
		a11y: false,
		navigation: {
			prevEl: '.tp-hero-prev',
			nextEl: '.tp-hero-next',
		},
		autoplay: {
			delay: 3500,
			disableOnInteraction: false
		},

	});


	////////////////////////////////////////////////////
	// 02. tp-testimonial-slide
	var slider = new Swiper('.tp-service-active', {
		slidesPerView: 1,
		speed:700,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 4000,
		  },
			pagination: {
				el: ".tp-service-pagination",
				clickable: true,
				},
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	////////////////////////////////////////////////////
	// 03. tp-gallery-slide
	var swiper = new Swiper(".tp-gallery-slide", {
		slidesPerView: 1,
		speed:1000,
		spaceBetween: 40,
		loop: true,
    centeredSlides: true,
		breakpoints: {
			'1200': {
				slidesPerView: 2,
			},
			'991': {
				slidesPerView: 2,
				spaceBetween: 30,
			},
			'768': {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			'576': {
				slidesPerView: 1,
				spaceBetween: 20,
			},
			'0': {
				slidesPerView: 1,
				spaceBetween: 20,
			},
		},
			pagination: {
				el: ".tp-gallery-pagination",
				type: "fraction",
			},
			navigation: {
				nextEl: ".tp-gallery-button-next",
				prevEl: ".tp-gallery-button-prev",
			},
	  });


	////////////////////////////////////////////////////
	// 04. tp-testimonial-active
	var slider = new Swiper('.tp-testimonial-active', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: ".tp-testimonial-pagination",
			clickable: true,
		},
	});

	////////////////////////////////////////////////////
	// 06. tp-testimonial-active-2
	var slider = new Swiper('.tp-testimonial-active-2', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: ".tp-tesimonial-next",
			prevEl: ".tp-tesimonial-prev",
		},
	});

	////////////////////////////////////////////////////
	// 07. tp-gallery-slide
	var swiper = new Swiper(".tp-room-slider-active", {
		slidesPerView: 1,
		spaceBetween: 24,
		loop: true,
		breakpoints: {
			'1200': {
				slidesPerView: 3,
			},
			'991': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	////////////////////////////////////////////////////
	// 08. tp-postboxSlider-slide
	var swiper = new Swiper('.tp-postbox-slider', {
		slidesPerView: 1,
    spaceBetween: 0,
		loop: true,
		autoplay: {
		  delay: 3000,
		},
		// Navigation arrows
		navigation: {
			nextEl: ".tp-postbox-slider-button-next",
			prevEl: ".tp-postbox-slider-button-prev",
		},
		breakpoints: {  
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	////////////////////////////////////////////////////
	// 09. tp-rooom-details-slide
var slider = new Swiper ('.tp-room-details-slide-active', {
	slidesPerView: 1,
	centeredSlides: true,
	loop: true,
	loopedSlides: 6,
	navigation: {
			nextEl: '.tp-room-details-slide-next',
			prevEl: '.tp-room-details-slide-prev',
	},
});
var thumbs = new Swiper ('.tp-room-details-thumb-active', {
	slidesPerView: 6,
	spaceBetween: 14,
	centeredSlides: false,
	loop: true,
	slideToClickedSlide: true,
});

slider.controller.control = thumbs;
thumbs.controller.control = slider;


	////brand-slider
	var tp_brand_slide = new Swiper(".tp-brand-active", {
		loop: true,
		freemode: true,
		slidesPerView: 'auto',
		spaceBetween: 30,
		centeredSlides: true,
		allowTouchMove: false,
		speed: 4000,
		autoplay: {
		  delay: 1,
		  disableOnInteraction: true,
		},
	});

	////brand-slider
	var tp_brand_slide = new Swiper(".tp-brand-active-2", {
		loop: true,
		freemode: true,
		slidesPerView: 'auto',
		spaceBetween: 30,
		centeredSlides: true,
		allowTouchMove: false,
		speed: 4000,
		autoplay: {
		  delay: 1,
		  disableOnInteraction: true,
		},
	});

	////////////////////////////////////////////////////
	// 05. tp-destinations-slide
	var swiper = new Swiper(".tp-instagram-slide", {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: true,
		breakpoints: {
			'1200': {
				slidesPerView: 6,
			},
			'991': {
				slidesPerView: 5,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
		navigation: {
			nextEl: ".tp-destinations-next",
			prevEl: ".tp-destinations-prev",
		},
	});


	////////////////////////////////////////////////////
	// 05. tp-destinations-slide
	var swiper = new Swiper(".tp-destinations-slide", {
		slidesPerView: 1,
		spaceBetween: 24,
		loop: true,
		breakpoints: {
			'1200': {
				slidesPerView: 4,
			},
			'991': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
		navigation: {
			nextEl: ".tp-destinations-next",
			prevEl: ".tp-destinations-prev",
		},
	});

})(jQuery);
