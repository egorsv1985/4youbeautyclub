$(document).ready(function () {
	var settings = {
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: false,
		cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: 1,
	}

	// Инициализация слайдеров
	$(
		'.page-branding__slider, .page-development__slider, .page-promotion__slider'
	).slick(settings)

	// Обработчик события изменения размера окна
	$(window).on('resize', function () {
		if ($(window).width() > 640) {
			$(
				'.page-branding__slider, .page-development__slider, .page-promotion__slider'
			).slick('unslick')
			return
		}
		$(
			'.page-branding__slider, .page-development__slider, .page-promotion__slider'
		)
			.not('.slick-initialized')
			.slick(settings)
	})
})
