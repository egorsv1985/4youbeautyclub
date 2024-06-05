<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$iblockId = 1;

// IDs разделов, которые нужно исключить
$excludeSectionIds = [1, 2]; // Замените на реальные ID разделов "Косметология" и "Студия красоты"

// Массив для хранения данных
$result = array(
	"ITEMS" => array()
);

// Получаем все разделы инфоблока
$arFilter = array(
	'IBLOCK_ID' => $iblockId,
	'ACTIVE' => 'Y',
	'DEPTH_LEVEL' => 1 // Получаем только разделы верхнего уровня
);
$arSelect = array(
	'ID',
	'NAME',
	'PICTURE',
	'SECTION_PAGE_URL'
);
$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, $arSelect);
while ($arSection = $rsSections->GetNext()) {
	// Пропускаем разделы, которые нужно исключить
	if (in_array($arSection['ID'], $excludeSectionIds)) {
		// Получаем подразделы
		$subSectionFilter = array(
			'IBLOCK_ID' => $iblockId,
			'ACTIVE' => 'Y',
			'SECTION_ID' => $arSection['ID'] // Фильтр по родительскому разделу
		);
		$subSectionSelect = array(
			'ID',
			'NAME',
			'PICTURE',
			'SECTION_PAGE_URL'
		);
		$rsSubSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $subSectionFilter, false, $subSectionSelect);
		while ($arSubSection = $rsSubSections->GetNext()) {
			// Получаем URL изображения
			$subImageUrl = '';
			if ($arSubSection['PICTURE']) {
				$subImageFile = CFile::GetFileArray($arSubSection['PICTURE']);
				$subImageUrl = $subImageFile['SRC'];
			}

			$result['ITEMS'][] = array(
				'NAME' => $arSubSection['NAME'],
				'IMAGE_URL' => $subImageUrl,
				'SECTION_PAGE_URL' => $arSubSection['SECTION_PAGE_URL']
			);
		}

		// Получаем элементы инфоблока, которые находятся непосредственно в этом разделе
		$elementFilter = array(
			'IBLOCK_ID' => $iblockId,
			'ACTIVE' => 'Y',
			'SECTION_ID' => $arSection['ID'],
			'INCLUDE_SUBSECTIONS' => 'N' // Не включаем подразделы
		);
		$elementSelect = array(
			'ID',
			'NAME',
			'PREVIEW_PICTURE',
			'DETAIL_PAGE_URL'
		);
		$rsElements = CIBlockElement::GetList(array('SORT' => 'ASC'), $elementFilter, false, false, $elementSelect);
		while ($arElement = $rsElements->GetNext()) {
			// Получаем URL изображения
			$elementImageUrl = '';
			if ($arElement['PREVIEW_PICTURE']) {
				$elementImageFile = CFile::GetFileArray($arElement['PREVIEW_PICTURE']);
				$elementImageUrl = $elementImageFile['SRC'];
			}

			$result['ITEMS'][] = array(
				'NAME' => $arElement['NAME'],
				'IMAGE_URL' => $elementImageUrl,
				'DETAIL_PAGE_URL' => $arElement['DETAIL_PAGE_URL']
			);
		}
	} else {
		// Получаем URL изображения
		$imageUrl = '';
		if ($arSection['PICTURE']) {
			$imageFile = CFile::GetFileArray($arSection['PICTURE']);
			$imageUrl = $imageFile['SRC'];
		}

		$result['ITEMS'][] = array(
			'NAME' => $arSection['NAME'],
			'IMAGE_URL' => $imageUrl,
			'SECTION_PAGE_URL' => $arSection['SECTION_PAGE_URL']
		);
	}
}
?>

<section class="py-5 services-main">
	<div class="container">
		<h2 class="mb-5 text-center fs-58 fw-700">Наши услуги</h2>

		<!-- Десктопная версия -->
		<div id="servicesCarouselDesktop" class="carousel d-none d-lg-block slide services-slider">
			<div class="carousel-inner">
				<?
				$chunkedItems = array_chunk($result['ITEMS'], 4);
				foreach ($chunkedItems as $key => $items) :
				?>
					<div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
						<div class="row">
							<? foreach ($items as $index => $item) : ?>
								<? $colClass = ($index === 0 || $index === 3) ? 'col-md-7' : 'col-md-5'; ?>
								<a href="<?= $item['DETAIL_PAGE_URL'] ?? $item['SECTION_PAGE_URL'] ?>" class="mb-3 services-link <?= $colClass ?> position-relative" style="height: 350px; background: url('<?= $item['IMAGE_URL'] ?>') no-repeat 50% 50% / 98% 100%;">
									<div class="label fs-32 fs-500 text-uppercase"><?= $item['NAME'] ?></div>
								</a>
							<? endforeach; ?>
						</div>
					</div>
				<? endforeach; ?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#servicesCarouselDesktop" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#servicesCarouselDesktop" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<!-- Мобильная версия -->
		<div id="servicesCarouselMobile" class="carousel d-block d-lg-none slide services-slider">
			<div class="carousel-inner">
				<? foreach ($result['ITEMS'] as $key => $item) : ?>
					<div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
						<div class="row">
							<a href="<?= $item['DETAIL_PAGE_URL'] ?? $item['SECTION_PAGE_URL'] ?>" class="mb-3 services-link col-12 position-relative" style="height: 350px; background: url('<?= $item['IMAGE_URL'] ?>') no-repeat 50% 50% / 98% 100%;">
								<div class="label fs-32 fs-500 text-uppercase"><?= $item['NAME'] ?></div>
							</a>
						</div>
					</div>
				<? endforeach; ?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#servicesCarouselMobile" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#servicesCarouselMobile" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
</section>