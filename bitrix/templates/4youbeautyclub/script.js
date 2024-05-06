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
		var e = document.querySelectorAll('input[type="tel"]')
		jQuery(e).inputmask({
			mask: ['+375 (99) 999 99 99', '8 (99) 999 99 99'],
			greedy: !1,
			placeholder: '_',
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