<section class="contacts fs-24">
	<div class="container">
		<div class="row gy-4">
			<div class="col-12 col-lg-4">
				<h2 class="mb-5 fs-58 fw-700">Контакты</h2>
				<div class="d-flex flex-column">

					<h3>Адрес</h3>
					<p>Москва, ул. Любимова, 6</p>
					<h3>Режим работы:</h3>
					<p>с 10:00 до 20:00<br>без выходных</p>
				</div>
				<div class="gap-4 d-flex flex-column">
					<a href="tel:88000001111" class="d-block fs-24 text-nowrap ps-5 contacts-phone">
						8 (800) 000-11-11
					</a>
					<a href="mailto:4youbeautyclub@gmail.com" class="d-block text-nowrap fs-24 ps-5 contacts-mail">4youbeautyclub@gmail.com</a>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<? $APPLICATION->IncludeComponent(
					"bitrix:map.yandex.view",
					".default",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"INIT_MAP_TYPE" => "MAP",
						"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:55.703505;s:10:\"yandex_lon\";d:37.731057;s:12:\"yandex_scale\";i:12;}",
						"MAP_WIDTH" => "100%",
						"MAP_HEIGHT" => "475",
						"CONTROLS" => array(
							0 => "ZOOM",
							1 => "SMALLZOOM",

						),
						"OPTIONS" => array(
							0 => "ENABLE_SCROLL_ZOOM",
							1 => "ENABLE_DBLCLICK_ZOOM",
							2 => "ENABLE_DRAGGING",
						),
						"MAP_ID" => "",
						"API_KEY" => ""
					),
					false
				); ?>
			</div>
		</div>
	</div>
</section>