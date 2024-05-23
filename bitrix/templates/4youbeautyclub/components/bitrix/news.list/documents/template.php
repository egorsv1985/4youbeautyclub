<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<ul class="flex-wrap gap-3 d-flex">
	<?
	foreach ($arResult["ITEMS"] as $index => $arItem) :
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<li class="py-4 border border-2 border-black documents__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
			<a href="#" class="text-black d-block fs-24 fw-600 text-uppercase position-relative"><?= $arItem["~NAME"]; ?></a>
		</li>
	<? endforeach; ?>
</ul>