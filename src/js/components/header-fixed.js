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
		
	})
})
