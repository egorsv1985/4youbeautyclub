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
			
			$('header').removeClass('absolute')
			$('header').removeClass('border-t-[32px]')
			
			
		} else {
			$('header').removeClass('fixed')
			$('header').removeClass('border-t-0')
			$('header').removeClass('bg-white/90')
	
			$('header').addClass('absolute')
			$('header').addClass('border-t-[32px]')
		
			
		}
	})
})
