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
		' .team__slider'
	).slick(settings)

	// Обработчик события изменения размера окна
	$(window).on('resize', function () {
		if ($(window).width() > 768) {
			$(
				' .team__slider'
			).slick('unslick')
			return
		}
		$(
			' .team__slider'
		)
			.not('.slick-initialized')
			.slick(settings)
	})
})
