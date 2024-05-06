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
			$('header').addClass('border-t-0')
			$('header').addClass('bg-white/90')
			$('header').addClass('z-10')
			$('header').removeClass('absolute')
			$('header').removeClass('border-t-[32px]')
			$('header').removeClass('bg-black')
			$('header').removeClass('z-50')
		} else {
			$('header').removeClass('fixed')
			$('header').removeClass('border-t-0')
			$('header').removeClass('bg-white/90')
			$('header').removeClass('z-10')
			$('header').addClass('absolute')
			$('header').addClass('border-t-[32px]')
			$('header').addClass('bg-black')
			$('header').addClass('z-50')
		}
	})
})
