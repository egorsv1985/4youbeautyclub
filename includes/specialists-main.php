<section class="py-5 specialists-main">
	<div class="container">
		<h2 class="mb-5 text-center fs-58 fw-700">Специалисты</h2>
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"specialists",
			array(
				"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
				"ADD_SECTIONS_CHAIN" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "7200",
				"CACHE_TYPE" => "A",
				"COUNT_ELEMENTS" => "Y",
				"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
				"FILTER_NAME" => "sectionsFilter",
				"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
				"IBLOCK_ID" => "3",
				"IBLOCK_TYPE" => "CONTENT",
				"SECTION_CODE" => "",
				"SECTION_FIELDS" => array(0 => "NAME", 1 => "",),
				"SECTION_ID" => $_REQUEST["SECTION_ID"],
				"SECTION_URL" => "",
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"SHOW_PARENT_NAME" => "Y",
				"TOP_DEPTH" => "2",
				"VIEW_MODE" => "LINE",
				"COMPONENT_TEMPLATE" => "specialists"
			),
			false
		);
		?>
		<!-- <ul class="mb-4 nav nav-tabs" id="specialistsTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="p-0 nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
					<div class=" tab-label fs-24">косметологи</div>
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="p-0 nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
					<div class=" tab-label fs-24">мастера салона красоты</div>
				</a>
			</li>
		</ul> -->
		<!-- <div class="tab-content" id="specialistsTabContent">
			<div class="tab-pane fade show active position-relative" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="mb-5 specialists__slider slider">
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist1.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Валерия Лисовская</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist2.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Евгения Рыжикова</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist3.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Татьяна Крот</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist2.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Евгения Рыжикова</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist3.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Татьяна Крот</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
					<div class="slider__item">
						<div class="px-3">
							<div class="mb-4">
								<img class="w-100" src="<?= SITE_TEMPLATE_PATH; ?>/images/specialist1.png" alt="">
							</div>
							<div class="py-1 border-2 border-black slider__content ps-4 border-start">
								<div class="mb-2 fs-24 fw-600 text-uppercase slider__name">Валерия Лисовская</div>
								<div class="fs-24 slider__post">врач-косметолог</div>
							</div>
						</div>
					</div>
				</div>
				<div class="justify-between slick__control align-items-center ms-auto d-flex">
					<span class="fs-27 fw-500 num--first">01</span>
					<div class="slick__dots w-100"></div>
					<span class="fs-27 fw-500 num--last">03</span>
				</div>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
		</div> -->
	</div>
</section>



