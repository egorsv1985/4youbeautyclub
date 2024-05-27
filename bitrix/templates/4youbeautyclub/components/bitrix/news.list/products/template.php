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
?>
<?
$itemCount = count($arResult["ITEMS"]);
for ($i = 0; $i < $itemCount; $i += 2) :
	// Получаем два элемента для текущего слайда
	$item1 = $arResult["ITEMS"][$i];
	$item2 = isset($arResult["ITEMS"][$i + 1]) ? $arResult["ITEMS"][$i + 1] : null;

	$this->AddEditAction($item1['ID'], $item1['EDIT_LINK'], CIBlock::GetArrayByID($item1["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($item1['ID'], $item1['DELETE_LINK'], CIBlock::GetArrayByID($item1["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	if (CModule::IncludeModule("millcom.phpthumb")) {
		$item1["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($item1["PREVIEW_PICTURE"]["SRC"], 18);
		$item1["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($item1["PREVIEW_PICTURE"]["SRC"], 19);
	}
	if ($item2) {
		$this->AddEditAction($item2['ID'], $item2['EDIT_LINK'], CIBlock::GetArrayByID($item2["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($item2['ID'], $item2['DELETE_LINK'], CIBlock::GetArrayByID($item2["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		if (CModule::IncludeModule("millcom.phpthumb")) {
			$item2["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($item2["PREVIEW_PICTURE"]["SRC"], 18);
			$item2["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($item2["PREVIEW_PICTURE"]["SRC"], 19);
		}
	}
?>
	<div class="gap-4 px-3 slider__item d-flex flex-column">
		<div class="products__box-img">
			<picture>
				<source srcset="<?= $item1["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $item1["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $item1["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $item1["PREVIEW_PICTURE"]["TITLE"] ?>" class="h-auto w-100" width="270" height="100" />
			</picture>			
		</div>
		<? if ($item2) : ?>
			<div class="products__box-img">
				<picture>
					<source srcset="<?= $item2["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $item2["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $item2["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $item2["PREVIEW_PICTURE"]["TITLE"] ?>" class="h-auto w-100" width="270" height="100" />
				</picture>				
			</div>
		<? endif; ?>
	</div>
<? endfor; ?>