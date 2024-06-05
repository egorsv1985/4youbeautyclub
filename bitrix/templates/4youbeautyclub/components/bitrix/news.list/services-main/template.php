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
$sectionId = 1;

// Массив для хранения данных
$result = array(
	"SECTIONS" => array()
);

// Получаем разделы инфоблока
$arFilter = array(
	'IBLOCK_ID' => $iblockId,
	'ACTIVE' => 'Y',
	'SECTION_ID' => $sectionId // Фильтр по родительскому разделу
);
$arSelect = array(
	'ID',
	'NAME',
	'PICTURE',
	'SECTION_PAGE_URL'
);
$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, $arSelect);
while ($arSection = $rsSections->GetNext()) {
	// Получаем URL изображения
	$imageUrl = '';
	if ($arSection['PICTURE']) {
		$imageFile = CFile::GetFileArray($arSection['PICTURE']);
		$imageUrl = $imageFile['SRC'];
	}

	$result['SECTIONS'][$arSection['ID']] = array(
		'NAME' => $arSection['NAME'],
		'IMAGE_URL' => $imageUrl,
		'SECTION_PAGE_URL' => $arSection['SECTION_PAGE_URL']
	);
}
?>

<section class="py-5 services-main">
	<div class="container">
		<h2 class="mb-5 text-center fs-58 fw-700">Наши услуги</h2>

		<!-- Десктопная версия -->
		<div id="servicesCarouselDesktop" class="carousel d-none d-lg-block slide services-slider">
			<div class="carousel-inner">
				<?
				$chunkedSections = array_chunk($result['SECTIONS'], 4);
				foreach ($chunkedSections as $key => $sections) :
				?>
					<div class="carousel-item <?= $key ? 'active' : '' ?>">
						<div class="row">
							<? foreach ($sections as $index => $section) : ?>
								<? $colClass = ($index === 0 || $index === 3) ? 'col-md-7' : 'col-md-5'; ?>
								<a href="<?= $section['SECTION_PAGE_URL'] ?>" class="mb-3 services-link <?= $colClass ?> position-relative" style="height: 350px; background: url('<?= $section['IMAGE_URL'] ?>') no-repeat 50% 50% / 98% 100%;">
									<div class="label fs-32 fs-500 text-uppercase"><?= $section['NAME'] ?></div>
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
				<? foreach ($result['SECTIONS'] as $key => $section) : ?>
					<div class="carousel-item <?= $key ? 'active' : '' ?>">
					<div class="row">						
						<a href="<?= $section['SECTION_PAGE_URL'] ?>" class="mb-3 services-link col-12 position-relative" style="height: 350px; background: url('<?= $section['IMAGE_URL'] ?>') no-repeat 50% 50% / 98% 100%;">
							<div class="label fs-32 fs-500 text-uppercase"><?= $section['NAME'] ?></div>
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