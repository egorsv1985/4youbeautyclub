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
	'IBLOCK_ID' => 5
);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
?>
<section class="py-5 blog">
	<div class="container">

		<ul class="mb-4 nav nav-tabs" id="blogTab" role="tablist">
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
		<div class="tab-content" id="blogTabContent">
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

					<?
					$APPLICATION->IncludeComponent(
						"bitrix:news",
						"blog",
						array(
							"ADD_ELEMENT_CHAIN" => "Y",
							"ADD_SECTIONS_CHAIN" => "Y",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"BROWSER_TITLE" => "-",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "7200",
							"CACHE_TYPE" => "A",
							"CHECK_DATES" => "Y",
							"COMPONENT_TEMPLATE" => "services",
							"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
							"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
							"DETAIL_DISPLAY_TOP_PAGER" => "N",
							"DETAIL_FIELD_CODE" => array(0 => "", 1 => "",),
							"DETAIL_PAGER_SHOW_ALL" => "Y",
							"DETAIL_PAGER_TEMPLATE" => "",
							"DETAIL_PAGER_TITLE" => "Страница",
							"DETAIL_PROPERTY_CODE" => array(0 => "", 1 => "", 2 => "",),
							"DETAIL_SET_CANONICAL_URL" => "N",
							"DISPLAY_BOTTOM_PAGER" => "Y",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FILE_404" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "5",
							"IBLOCK_TYPE" => "CONTENT",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
							"LIST_FIELD_CODE" => array(0 => "", 1 => "",),
							"LIST_PROPERTY_CODE" => array(0 => "", 1 => "",),
							"MESSAGE_404" => "",
							"META_DESCRIPTION" => "-",
							"META_KEYWORDS" => "-",
							"NEWS_COUNT" => "20",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"PAGER_TITLE" => "Новости",
							"PREVIEW_TRUNCATE_LEN" => "",
							"SEF_FOLDER" => "/blog/",
							"SEF_MODE" => "Y",
							"SEF_URL_TEMPLATES" => array("news" => "", "section" => "#SECTION_CODE_PATH#/", "detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",),
							"SET_LAST_MODIFIED" => "Y",
							"SET_STATUS_404" => "Y",
							"SET_TITLE" => "Y",
							"SHOW_404" => "Y",
							"SORT_BY1" => "SORT",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "ASC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"USE_CATEGORIES" => "N",
							"USE_FILTER" => "N",
							"USE_PERMISSIONS" => "N",
							"USE_RATING" => "N",
							"USE_RSS" => "N",
							"USE_SEARCH" => "N",
							"USE_SHARE" => "N"
						)
					);
					?>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</section>