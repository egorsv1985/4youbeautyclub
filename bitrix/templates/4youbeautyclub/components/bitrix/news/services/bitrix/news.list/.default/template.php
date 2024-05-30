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

$SECTION = end($arResult['SECTION']['PATH']);
$SECTION_CURRENT = array();
$rsSections = CIBlockSection::GetByID($SECTION['ID']);
if ($arSections = $rsSections->GetNext()) {
	$SECTION_CURRENT = $arSections;
	if ($arSections['DESCRIPTION']) {
		$DESCRIPTION = $arSections['DESCRIPTION'];
	}
}

?>
<div class="row">
	<div class="col-12 col-lg-4 menu-container" id="menu-container">
		<div class="left-menu text-lowercase">
			<ul>
				<?
				$arFilter = array(
					'IBLOCK_ID' => $arParams['IBLOCK_ID'],
					'ACTIVE' => 'Y',
					'SECTION_ID' => $arResult['SECTION']['PATH'][0]['ID']
				);
				$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, true);
				while ($asSections = $rsSections->GetNext()) : ?>
					<li class="item-section<?= ($asSections['ID'] == $arResult['SECTION']['PATH'][1]['ID'] ? ' active' : '') ?>">
						<a href="<?= $asSections['SECTION_PAGE_URL']; ?>" class="fs-24 fw-600 parent"><?= $asSections['NAME']; ?></a>
						<ul>
							<?
							$arSelect = array("ID", "NAME", "*");
							$arFilter = array(
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ACTIVE' => 'Y',
								'SECTION_ID' => $asSections['ID']
							);
							$rsElements = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
							while ($arElements = $rsElements->GetNext()) : ?>
								<li>
									<a href="<?= $arElements['DETAIL_PAGE_URL']; ?>" class="fs-18 text-uppercase"><?= $arElements['NAME']; ?></a>
								</li>
							<? endwhile; ?>
						</ul>
					</li>
				<? endwhile; ?>
				<?
				$arSelect = array("ID", "NAME", "*");
				$arFilter = array(
					'IBLOCK_ID' => $arParams['IBLOCK_ID'],
					'ACTIVE' => 'Y',
					'SECTION_ID' => $arResult['SECTION']['PATH'][0]['ID']
				);
				$rsElements = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
				while ($arElements = $rsElements->GetNext()) : ?>
					<li>
						<a href="<?= $arElements['DETAIL_PAGE_URL']; ?>" class="fs-24 fw-600"><?= $arElements['NAME']; ?></a>
					</li>
				<? endwhile; ?>

			</ul>
		</div>
		<?/*$APPLICATION->IncludeComponent("bitrix:menu", "services", Array(
	'SECTION_ID' => $arResult['SECTION']['PATH'][0]['ID'],
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "3",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_THEME" => "site",	// Тема меню
		"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);*/ ?>
	</div>
	<div class="col-md">
		<div class="pb-2 mb-4 fs-24">
			<?= $DESCRIPTION; ?>
		</div>
		<div class="mb-5 row gy-5">
			<? foreach ($arResult["ITEMS"] as $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if (CModule::IncludeModule("millcom.phpthumb")) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 2);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 15);
				}
			?>
				<div class="col-md-6 service-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
						<span class="image d-block">
							<picture>
								<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="h-auto w-100" width="385" height="445" />
							</picture>
						</span>
						<span class="px-4 my-4 name d-block fs-24 fw-600">
							<strong class="d-block text-uppercase"><?= $arItem["NAME"] ?></strong>
							<?= $arItem["PREVIEW_TEXT"] ?>
						</span>
					</a>
				</div>
			<? endforeach; ?>
			<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
				<?= $arResult["NAV_STRING"] ?>
			<? endif; ?>
		</div>
	</div>
</div>