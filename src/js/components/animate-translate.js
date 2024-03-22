$(document).ready(function () {
	var translateYValue = 0
	var animateBox = $('.hero__animation')
	var animationDuration = 10 // Время анимации в миллисекундах (здесь 3 секунды)

	function animateTranslateY() {
		translateYValue -= 0.01 // Уменьшаем значение translateY на 0.01
		if (translateYValue <= -100) translateYValue = 0 // Сбрасываем значение, когда достигнут предел
		animateBox.css(
			'transform',
			'translateY(' + translateYValue.toFixed(2) + '%) translateZ(0px)'
		) // Применяем новое значение translateY
		setTimeout(animateTranslateY, animationDuration / 100) // Запускаем функцию анимации с интервалом
	}

	animateTranslateY() // Запускаем анимацию
})
