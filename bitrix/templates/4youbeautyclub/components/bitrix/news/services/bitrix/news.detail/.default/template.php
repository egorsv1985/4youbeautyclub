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

if ($arResult["DETAIL_PICTURE"]) {
	$this->SetViewTarget('topPage');
	if (CModule::IncludeModule("millcom.phpthumb"))
		$arResult["DETAIL_PICTURE"]['WEBP'] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 3);
?>
	<div class="text-center cover-page" style="background-image: url('<?= $arResult["DETAIL_PICTURE"]["WEBP"]; ?>')">
		<div class="py-5 blackout">
			<div class="container py-5">
				<div class="mt-5 h1 fs-70 fw-700"><?= $arResult['NAME'] ?></div>
				<? if ($arResult["PREVIEW_TEXT"]) : ?>
					<p class="text-uppercase fs-24 fw-500">
						<?= $arResult["PREVIEW_TEXT"]; ?>
					</p>
				<? endif; ?>
				<div class="mt-5 btns">
					<a href="#" class="px-4 py-3 btn btn-outline-light top-btn btn-arrow fs-24">Записаться на приём</a>
				</div>
			</div>
		</div>
	</div>
<?
	$this->EndViewTarget();
}
?>
<div class="py-5 my-4 service-detail fs-24">
	<?= $arResult["DETAIL_TEXT"]; ?>
</div>
<? if ($arResult['PROPERTIES']['PRICES']['VALUE']) : ?>
	<div class="my-5 prices-block">
		<h2 class="fs-58 fw-600">Стоимость услуг</h2>
		<div class="mt-4 price-items">
			<? foreach ($arResult['PROPERTIES']['PRICES']['VALUE'] as $key => $PRICE_NAME) : ?>
				<div class="py-3 price-item">
					<div class="row align-items-center">
						<div class="col-md-6 fs-24 text-uppercase fw-500">
							<?= $PRICE_NAME; ?>
						</div>
						<div class="col-md-2 offset-md-1 fs-28 fw-700 col-price">
							<?= is_numeric($arResult['PROPERTIES']['PRICES']['DESCRIPTION'][$key]) ? number_format($arResult['PROPERTIES']['PRICES']['DESCRIPTION'][$key], 0, '.', ' ') . '₽' : $arResult['PROPERTIES']['PRICES']['DESCRIPTION'][$key]; ?>
						</div>
						<div class="col-md-3 text-end">
							<a href="#" class="p-0 btn top-btn btn-arrow fs-24">записаться</a>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>
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