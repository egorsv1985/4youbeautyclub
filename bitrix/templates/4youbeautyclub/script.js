$(document).ready(function () {
	var borderTop = $('header').css('border-top-width').replace('px', '')
	$(window).scroll(function (event) {
		var body = $('body').scrollTop()
		if (body == 0) {
			var body = $('html').scrollTop()
		}
		var top = $('.page').offset().top + Number(borderTop)
		if (body > top) {
			$('header').addClass('fixed')
		} else {
			$('header').removeClass('fixed')
		}

		// $('.specialists__slider').slick({
		// 	infinite: true,
		// 	dots: true,
		// 	swipe: true,
		// 	arrows: true,

		// 	cssEase: 'linear',
		// 	slidesToShow: 3,
		// 	slidesToScroll: 1,
		// 	appendDots: $('.specialists-main .slick__dots'),

		// 	responsive: [
		// 		{
		// 			breakpoint: 900,
		// 			settings: {
		// 				slidesToShow: 2,
		// 			},
		// 		},
		// 		{
		// 			breakpoint: 768,
		// 			settings: {
		// 				slidesToShow: 1,
		// 			},
		// 		},
		// 	],
		// })
		$('.instruments__slider').slick({
			infinite: true,
			dots: true,
			swipe: true,
			arrows: true,
			cssEase: 'linear',
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
		})
		$('.gallery__slider').slick({
			infinite: true,
			swipe: true,
			arrows: true,
			fade: true,
			cssEase: 'linear',
			slidesToShow: 1,
			slidesToScroll: 1,

			responsive: [
				{
					breakpoint: 992,
					settings: {
						arrows: false,
					},
				},
			],
		})

		$('.products__slider').slick({
			infinite: true,
			dots: true,
			swipe: true,
			arrows: false,
			cssEase: 'linear',
			slidesToShow: 2,
			slidesToScroll: 1,
			
			appendDots: $('.products .slick__dots'),
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 1,
					},
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
					},
				},
			],
		})
		var $sliderProducts = $('.products__slider')

		$sliderProducts.on('afterChange', function (_, slick, currentSlide) {
			var currentSlideIndex = currentSlide / slick.options.slidesToScroll + 1
			$('.products .num--first').text(
				currentSlideIndex < 10 ? '0' + currentSlideIndex : currentSlideIndex
			)
		})
		$('.reviews__slider').slick({
			infinite: true,
			dots: true,
			swipe: true,
			arrows: true,
			adaptiveHeight: true,
			cssEase: 'linear',
			slidesToShow: 2,
			slidesToScroll: 1,
			appendDots: $('.reviews .slick__dots'),
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 1,
						arrows: false,
					},
				},
			],
		})
		var $sliderReviews = $('.reviews__slider')

		$sliderReviews.on('afterChange', function (_, slick, currentSlide) {
			var currentSlideIndex = currentSlide / slick.options.slidesToScroll + 1
			$('.reviews .num--first').text(
				currentSlideIndex < 10 ? '0' + currentSlideIndex : currentSlideIndex
			)
		})
		$('.burger').click(function () {
			$('html').toggleClass('open')
			return false
		})
		/*
		var headerHeight = $('header').height();
		var topMenuContaner = $('.menu-contaner').offset().top;
		if (body > $('.menu-contaner').offset().top-headerHeight) {
			$('.menu-contaner .left-menu').css({'top': (body-topMenuContaner+headerHeight) + 'px'});
			
		} else {
			$('.menu-contaner .left-menu').css({'top': '0px'});
		}
		*/
	})
	// const pageText = $('#page-text')
	// const menuContainerOffset = $('#menu-container').offset().top
	// const headerHeight = $('#header').height()

	// $(window).scroll(function () {
	// 	const scrolled = $(this).scrollTop()
	// 	const menuFixedTopClassName = 'menu-fixed--top'
	// 	if (scrolled > menuContainerOffset) {
	// 		pageText.addClass(menuFixedTopClassName)
	// 		const windowHeight = $(window).height()
	// 		$('.menu-fixed--top .left-menu').css({
	// 			top: headerHeight + 'px',
	// 		})
	// 	} else if (scrolled < menuContainerOffset) {
	// 		pageText.removeClass(menuFixedTopClassName)
	// 	}
	// })	 
})
