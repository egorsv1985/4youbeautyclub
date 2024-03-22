$(document).ready(function () {
	function animateProgress($progress, percentageText, smoothness) {
		var progress = 0
		var $progressCount = $progress.find('.progress__percentage--count')
		var $progressBarContainer = $progress.find('.progress')
		var $progressCircle = $progress.find('.progress__circle')
		var $parent = $progress.closest('.progress__border')

		function updateProgress() {
			progress += 1
			$progressCount.text(Math.floor(progress) + '%')
			$progressBarContainer.css(
				'transform',
				'rotate(' + progress * 3.6 + 'deg)'
			)

			var red, green, blue
			if (progress <= 50) {
				red = Math.round(251 - (progress / 50) * (251 - 255))
				green = Math.round(98 + (progress / 50) * (202 - 98))
				blue = 64
			} else {
				red = Math.round(255 - ((progress - 50) / 50) * (255 - 100))
				green = Math.round(202 + ((progress - 50) / 50) * (168 - 202))
				blue = Math.round(64 + ((progress - 50) / 50) * (133 - 64))
			}
			$parent.css(
				'background-color',
				'rgb(' + red + ',' + green + ',' + blue + ')'
			)

			var borderRed, borderGreen, borderBlue
			if (progress <= 50) {
				borderRed = Math.round(255 - (progress / 50) * (255 - 255))
				borderGreen = Math.round(112 + (progress / 50) * (214 - 112))
				borderBlue = Math.round(80 + (progress / 50) * (152 - 80))
			} else {
				borderRed = Math.round(255 - ((progress - 50) / 50) * (255 - 100))
				borderGreen = Math.round(214 + ((progress - 50) / 50) * (214 - 214))
				borderBlue = Math.round(80 + ((progress - 50) / 50) * (152 - 80))
			}
			$parent.css(
				'border-color',
				'rgb(' + borderRed + ',' + borderGreen + ',' + borderBlue + ')'
			)

			var dashOffset = ((100 - progress) / 100) * 314
			$progressCircle
				.find('.progress__circle-path')
				.css('stroke-dashoffset', dashOffset)

			setProgress(progress) // Вызываем функцию setProgress с текущим значением progress

			if (progress >= 100) {
				clearInterval(animationInterval) // Останавливаем интервал анимации после достижения 100%
			}
		}

		var animationInterval = setInterval(updateProgress, smoothness)
	}

	$('.progress').each(function () {
		var $progressBar = $(this)
		var percentageText = parseInt($progressBar.attr('data-progress'))

		animateProgress($progressBar, percentageText, 100)
	})

	const $circle = $('.progress-ring__circle')
	const radius = $circle.prop('r').baseVal.value
	const circumference = 2 * Math.PI * radius

	$circle.css('stroke-dasharray', `${circumference} ${circumference}`)
	$circle.css('stroke-dashoffset', circumference)

	function setProgress(percent) {
		const offset = circumference - (percent / 100) * circumference
		$circle.css('stroke-dashoffset', offset)
	}
})
