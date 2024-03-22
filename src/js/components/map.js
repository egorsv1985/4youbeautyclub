ymaps.ready(function () {
	// Создаем карту и указываем центр и масштаб
	var myMap = new ymaps.Map('map', {
		center: [55.751574, 37.573856],
		zoom: 4,
	})

	// Создаем макет содержимого для метки
	var MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
		'<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
	)

	// Создаем кластеризатор меток
	var clusterer = new ymaps.Clusterer({
		preset: 'islands#invertedVioletClusterIcons',
		groupByCoordinates: false,
		clusterDisableClickZoom: true,
		clusterHideIconOnBalloonOpen: false,
		geoObjectHideIconOnBalloonOpen: false,
		clusterIconColor: '#2F3A5A',
	})

	var placemarks = [
		{
			coordinates: [61.263354, 73.432163],
			properties: {
				hintContent: 'oasis',
				name: 'oasis',
				address: 'Сургут, ул. Профсоюзов, 53/2',
				link: 'https://oasisfit.ru/',
			},
		},
		{
			coordinates: [64.541724, 40.529264],
			properties: {
				hintContent: 'palestra',
				name: 'palestra',
				address: 'Архангельск',
				link: 'https://palestrafitness.ru/',
			},
		},
		{
			coordinates: [55.382472, 37.53959],
			properties: {
				hintContent: 'zaruba',
				name: 'zaruba',
				address: 'Московская область, Подольск, мкр. Климовск, Заводская 24А',
				link: 'pd.zaruba-fitness.ru',
			},
		},
		{
			coordinates: [55.755819, 37.617644],
			properties: {
				hintContent: 'Шамбала',
				name: 'Шамбала',
				address: 'Москва, Щелковское шоссе, д. 100 к. 10',
				link: 'yoga.lesfitness.ru/',
			},
		},
		{
			coordinates: [55.804162, 37.322934],
			properties: {
				hintContent: 'ВСЕ СВОИ',
				name: 'ВСЕ СВОИ',
				address:
					'Московская область, г.Красногорск, Ильинское шоссе, дом 14, корпус 1',
				link: 'https://vsesvoifit.ru/',
			},
		},
		{
			coordinates: [55.820172, 37.312325],
			properties: {
				hintContent: 'alex-fit',
				name: 'alex-fit',
				address: 'Московская область, г.Красногорск, ул. Дачная 11А',
				link: 'alex-fit.ru',
			},
		},
		{
			coordinates: [55.901268, 37.700559],
			properties: {
				hintContent: 'worldclass',
				name: 'worldclass',
				address: 'Мытищи, ул. Благовещенская, с13',
				link: 'worldclass-myt.ru',
			},
		},
		{
			coordinates: [55.655493, 37.484667],
			properties: {
				hintContent: 'zaruba',
				name: 'zaruba',
				address: 'Москва, ул. 26-ти Бакинских Комиссаров, д. 7, к. 6',
				link: 'https://uz.zaruba-fitness.ru/',
			},
		},
		{
			coordinates: [55.824172, 37.503603],
			properties: {
				hintContent: 'fitnessnova',
				name: 'fitnessnova',
				address: 'Г. МОСКВА, МЕТРО ВОЙКОВСКАЯ СТАРОПЕТРОВСКИЙ ПР-Д, 11К1',
				link: 'fitnessnova.ru',
			},
		},
		{
			coordinates: [45.027355, 39.048732],
			properties: {
				hintContent: '50gym',
				name: '50gym',
				address: 'г.Краснодар, Стасова 178/1',
				link: '50gym-offer.ru',
			},
		},
		{
			coordinates: [55.783124, 37.678272],
			properties: {
				hintContent: 'limestone',
				name: 'limestone',
				address: 'Москва, Леснорядский переулок, дом 18 строение 6',
				link: 'https://limestone.su',
			},
		},
		{
			coordinates: [51.685211, 39.128188],
			properties: {
				hintContent: 'CASTA',
				name: 'CASTA',
				address: 'г. Воронеж, ул. 9 Января, 288А',
				link: 'castavrn.ru',
			},
		},
		{
			coordinates: [55.681432, 37.29806],
			properties: {
				hintContent: 'o.n-fit',
				name: 'o.n-fit',
				address: 'г. Одинцово, Вокзальная, 39Б',
				link: 'https://www.o.n-fit.ru/',
			},
		},
		{
			coordinates: [55.732271, 37.412586],
			properties: {
				hintContent: 'neo-stream',
				name: 'neo-stream',
				address: 'г. Москва, Партизанская, 10',
				link: 'https://neo-stream.ru/',
			},
		},
		{
			coordinates: [55.805022, 37.419251],
			properties: {
				hintContent: 's.n-fit',
				name: 's.n-fit',
				address: 'г. Москва, Исаковского, 33',
				link: 'https://s.n-fit.ru/',
			},
		},
		{
			coordinates: [55.800428, 37.726807],
			properties: {
				hintContent: 'selform',
				name: 'selform',
				address: 'Москва, Ул. Халтуринская 9 стр. 1, м. Преображенская площадь',
				link: 'https://selform.fitness/',
			},
		},
		{
			coordinates: [61.248409, 73.424258],
			properties: {
				hintContent: 'vifit',
				name: 'vifit',
				address: 'Сургут, Университетская улица, 15',
				link: 'https://vifit.su/',
			},
		},
		{
			coordinates: [55.991032, 37.21952],
			properties: {
				hintContent: 'alexfit',
				name: 'alexfit',
				address: 'г. Зеленоград, Савелкинский проезд, д. 8',
				link: 'https://vifit.su/',
			},
		},
	]

	// Создаем метки и добавляем их в кластеризатор
	// for (var i = 0; i < placemarks.length; i++) {
	//   var placemark = new ymaps.Placemark(
	//     placemarks[i].coordinates,
	//     {
	//       hintContent: placemarks[i].properties.hintContent,
	//       balloonContent:
	//         '<div class="balloonHead"><strong><a target="_blank" href="' +
	//         placemarks[i].properties.link +
	//         '">' +
	//         placemarks[i].properties.name +
	//         "</a></strong></div><p>" +
	//         placemarks[i].properties.address +
	//         "</p>",
	//     },
	//     {
	//       iconLayout: "default#image",
	//       iconImageHref: "template/images/marker.png",
	//       iconImageSize: [30, 42],
	//       iconImageOffset: [-5, -38],
	//       iconContentLayout: MyIconContentLayout,
	//     }
	//   );

	//   clusterer.add(placemark);
	// }

	// Добавляем кластеризатор на карту
	// myMap.geoObjects.add(clusterer);

	// При клике на метку открываем балун
	// clusterer.events.add("click", function (e) {
	//   var target = e.get("target");
	//   if (target && target.getGeoObjects) {
	//     myMap.setCenter(target.geometry.getCoordinates(), myMap.getZoom() + 1, {
	//       duration: 500,
	//     });
	//   }
	// });
	// Создаем метки и добавляем их на карту
	for (var i = 0; i < placemarks.length; i++) {
		var placemark = new ymaps.Placemark(
			placemarks[i].coordinates,
			{
				hintContent: placemarks[i].properties.hintContent,
				balloonContent:
					'<div class="balloonHead"><strong><a target="_blank" href="' +
					placemarks[i].properties.link +
					'">' +
					placemarks[i].properties.name +
					'</a></strong></div><p>' +
					placemarks[i].properties.address +
					'</p>',
			},
			{
				iconLayout: 'default#image',
				iconImageHref: 'template/images/marker.png',
				iconImageSize: [30, 42],
				iconImageOffset: [-5, -38],
			}
		)

		myMap.geoObjects.add(placemark)
	}
})
