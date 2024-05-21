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

foreach ($arResult["ITEMS"] as $index => $arItem) : 
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="slider__item">
		<div class="px-3">
			<div class="mb-4">
				<img class="w-100" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
			</div>
			<div class="py-1 border-2 border-black slider__content ps-4 border-start">
				<div class="mb-2 fs-24 fw-600 text-uppercase slider__name"><?= $arItem["NAME"]; ?></div>
				<div class="fs-24 slider__post"><?= $arItem['PROPERTIES']['POST']['VALUE']; ?></div>
			</div>
			<div class="fs-24 ps-4"><span>стаж </span><?= $arItem['PROPERTIES']['PERIOD']['VALUE']; ?></div>
		</div>
	</div>
<? endforeach; ?>