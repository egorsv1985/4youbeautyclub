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
// print_r($arResult);
$arFilter = array(
	'IBLOCK_ID' => 3
);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
?>
<ul class="mb-4 nav nav-tabs" id="specialistsTab" role="tablist">
	<? foreach ($arResult['SECTIONS'] as $key => $arSection) :
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete);
	?>
		<li class="nav-item" role="presentation">
			<a class="p-0 nav-link <?= $key ? '' : ' active' ?>" id="<?= $arSection['ID']; ?>-tab" data-bs-toggle="tab" href="#<?= $arSection['ID']; ?>" role="tab" aria-controls="<?= $arSection['ID']; ?>" aria-selected="true">
				<div class=" tab-label fs-24"><?= $arSection['NAME']; ?></div>
			</a>
		</li>
	<? endforeach; ?>
</ul>
<div class="tab-content" id="specialistsTabContent">
	<?
	foreach ($arResult['SECTIONS'] as &$arSection) :
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete);
		$arFilter = array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $arSection["ID"],
			"INCLUDE_SUBSECTIONS" => "Y",
			"ACTIVE" => "Y"
		);
		$slideCount = CIBlockElement::GetList(array(), $arFilter, array(), false, array());
	?>
		<div class="tab-pane fade <?= $key ? '' : ' active show' ?> position-relative" id="<?= $arSection['ID']; ?>" role="tabpanel" aria-labelledby="<?= $arSection['ID']; ?>-tab">
			<div class="mb-5 specialists__slider-<?= $arSection['ID']; ?> slider">
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
						"FILTER_NAME" => "",
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
			</div>
			<div class="justify-between slick__control slick__control-<?= $arSection['ID']; ?> align-items-center ms-auto d-flex">
				<span class="fs-27 fw-500 num--first">01</span>
				<div class="slick__dots-<?= $arSection['ID']; ?> w-100"></div>
				<span class="fs-27 fw-500 num--last"><? echo ($slideCount < 10) ? str_pad($slideCount, 2, '0', STR_PAD_LEFT) : $slideCount; ?></span>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('.specialists__slider-<?= $arSection['ID']; ?>').slick({
					infinite: true,
					dots: true,
					swipe: true,
					arrows: true,
					cssEase: 'linear',
					slidesToShow: 3,
					slidesToScroll: 1,
					appendDots: $('.specialists-main .slick__dots-<?= $arSection['ID']; ?>'),
					responsive: [{
							breakpoint: 900,
							settings: {
								slidesToShow: 2,
							},
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
							},
						},
					],
				})
			});
		</script>
	<? endforeach; ?>
</div>