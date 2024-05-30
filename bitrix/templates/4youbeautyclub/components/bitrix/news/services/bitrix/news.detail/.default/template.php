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
	$arResult["DETAIL_PICTURE"]['PNG'] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 16);
?>
	<div class="text-center cover-page" style="background-image: url('<?= $arResult["DETAIL_PICTURE"]["WEBP"]; ?>'), url('<?= $arResult["DETAIL_PICTURE"]["PNG"]; ?>');">
		<div class="py-5 blackout">
			<div class="container py-5">
				<div class="mt-5 h1 fs-70 fw-700"><?= $arResult['NAME'] ?></div>
				<? if ($arResult["PREVIEW_TEXT"]) : ?>
					<p class="text-uppercase fs-24 fw-500">
						<?= $arResult["PREVIEW_TEXT"]; ?>
					</p>
				<? endif; ?>
				<div class="mt-5 btns">
					<button type="button" data-bs-toggle="modal" data-bs-target="#callback" class="px-4 py-3 btn btn-outline-light top-btn btn-arrow fs-24">Записаться на приём</button>
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
							<button type="button" data-bs-toggle="modal" data-bs-target="#callback" class="p-0 btn top-btn btn-arrow fs-24">записаться</button>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>
<? if ($arResult['PROPERTIES']['SPECIALISTS']['VALUE']) : ?>
	<h2 class="my-5 fs-58 fw-700">Процедуру проводят</h2>
	<?
	global $arFilterSpec;
	$arFilterSpec = array(
		'ID' => $arResult['PROPERTIES']['SPECIALISTS']['VALUE']
	);
	?>
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"specialists",
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "7200",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "",
			),
			"FILTER_NAME" => "arFilterSpec",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "3",
			"IBLOCK_TYPE" => "CONTENT",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "20",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => $arSection['ID'],
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(
				0 => "POST",
				1 => "PERIOD",
				2 => "",
			),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"COMPONENT_TEMPLATE" => "specialists"
		),
		false
	);
	?>
<? endif; ?>