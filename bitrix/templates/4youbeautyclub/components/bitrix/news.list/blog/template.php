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
<div class="row">

	<?

	foreach ($arResult["ITEMS"] as $index => $arItem) :
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class=" col-12 col-lg-6">
			<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="border border-black d-flex flex-column">
				<div class="p-4 blog__data fs-24">
					<span>
						<?= $arItem["ACTIVE_FROM"] ?>
					</span>
				</div>
				<div class="mb-4">
					<img class="w-100" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
				</div>
				<div class="px-4 mb-4 fs-24 fw-600 text-uppercase ">
					<?= $arItem["NAME"]; ?>
				</div>
				<div class="px-4 opacity-50 fs-24">
					<p class=""><?= $arItem["PREVIEW_TEXT"] ?></p>
				</div>
				<a href="#" class="p-0 btn top-btn btn-arrow fs-24">подробнее</a>
			</a>
		</div>
	<? endforeach; ?>
</div>