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
$iblockId = 9; // ID инфоблока
$arFilter = array(
	"IBLOCK_ID" => $iblockId,
	"ACTIVE" => "Y",
	"INCLUDE_SUBSECTIONS" => "Y"
);
$itemCount = CIBlockElement::GetList(array(), $arFilter, array());
?>
<section class="py-5 reviews">
	<div class="container">
		<h2 class="mb-5 fs-58 fw-700 text-uppercase">Ваши отзывы</h2>
		<div class="reviews__slider slider">
			<?
			foreach ($arResult["ITEMS"] as $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			?>
				<div class="px-4 slider__item fs-24 position-relative h-50">
					<div class="gap-4 mb-4 d-flex">
						<div class="">
							<img class="w-100" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
						</div>
						<div class="gap-3 d-flex flex-column fw-600 text-uppercase">
							<div class=""><?= $arItem["NAME"] ?></div>
							<div class="opacity-50"><?= $arItem["ACTIVE_FROM"] ?></div>
						</div>
					</div>
					<p class=""><?= $arItem["PREVIEW_TEXT"] ?></p>
				</div>
			<? endforeach; ?>
		</div>
		<div class="justify-between slick__control align-items-center ms-auto d-flex">
			<span class="fs-27 fw-500 num--first">01</span>
			<div class="slick__dots w-100"></div>
			<span class="fs-27 fw-500 num--last"><?= str_pad($itemCount, 2, '0', STR_PAD_LEFT) ?></span>
		</div>
	</div>
</section>