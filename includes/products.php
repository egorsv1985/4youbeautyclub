<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// Получение количества элементов инфоблока
$iblockId = 7; // ID инфоблока
$arFilter = array(
	"IBLOCK_ID" => $iblockId,
	"ACTIVE" => "Y",
	"INCLUDE_SUBSECTIONS" => "Y"
);
$itemCount = CIBlockElement::GetList(array(), $arFilter, array());
$slideCount = ceil($itemCount / 2);
?>
<section class="products position-relative">
	<div class="container">
		<div class="row gy-4">
			<div class="col-12 col-lg-6">
				<h2 class="mb-3 fs-58 fw-700">Препараты, которые мы используем</h2>
				<div class="fs-24">Мы работаем только с продуктами, прошедшими клинические испытания, обеспечивая максимальную эффективность и безопасность.</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="mb-4 products__slider slider position-relative">
					<?
					$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"products",
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
							"IBLOCK_ID" => $iblockId,
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
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array(
								0 => "",
								1 => "",
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
							"COMPONENT_TEMPLATE" => "products"
						),
						false
					);
					?>

				</div>


			</div>
			<div class="justify-between slick__control align-items-center ms-auto d-flex">
				<span class="fs-27 fw-500 num--first">01</span>
				<div class="slick__dots w-100"></div>
				<span class="fs-27 fw-500 num--last"><?= str_pad($slideCount, 2, '0', STR_PAD_LEFT) ?></span>
			</div>
		</div>
	</div>
	
</section>