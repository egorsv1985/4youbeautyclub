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
<?

foreach ($arResult["ITEMS"] as $index => $arItem) :
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="mb-4 ">
		<div class="row g-4">

			<div class="px-lg-0 col-12 col-md-6 ">
				<div class="comparison__box-img position-relative fs-22 fw-600">
					<img class="h-100 w-100" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
					<div class="flex-wrap gap-3 comparison__box d-flex position-absolute z-1">
						<span class="px-4 py-1 bg-white bg-opacity-50 border border-black opacity-50 comparison__name z-1"><?= $arItem["NAME"]; ?></span>
						<span class="px-4 py-1 bg-white bg-opacity-50 border opacity-50 comparison__data"><?= $arItem["ACTIVE_FROM"] ?></span>
					</div>

				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="comparison__box-img ">
					<img class="h-100 w-100" src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>">
				</div>
			</div>
		</div>
	</div>
<? endforeach; ?>