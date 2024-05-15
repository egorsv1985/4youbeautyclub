$(document).ready(function() {
	var borderTop = $('header').css('border-top-width').replace('px','');;
	$(window).scroll(function(event){
		var body = $('body').scrollTop();
		if (body == 0) {
			var body = $('html').scrollTop();
		}
		var top = $('.page').offset().top+Number(borderTop);
		if (body > top) {
			$('header').addClass('fixed');
		}	else {
			$('header').removeClass('fixed');
		}
		
$('.specialists__slider').slick({
	infinite: true,
	dots: true,
	swipe: true,
	arrows: true,
	cssEase: 'linear',
	slidesToShow: 3,
	slidesToScroll: 1,
	appendDots: $('.slick__dots'),

	responsive: [
		{
			breakpoint: 900,
			settings: {
				slidesToShow: 2,
			},
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
			},
		},
	],
})
$('.instruments__slider').slick({
	infinite: true,
	dots: true,
	swipe: true,
	arrows: true,
	cssEase: 'linear',
	slidesToShow: 1,
	slidesToScroll: 1,	
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
	});

});