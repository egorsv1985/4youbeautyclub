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


	$rsIblock = CIBlock::GetByID($arParams["IBLOCK_ID"]);
	if ($arIblock = $rsIblock->GetNext()) {
		if ($arIblock['DESCRIPTION']) {
			$this->SetViewTarget('topColRight');
			echo '<div class="col-md-8 fs-24">';
			echo $arIblock['DESCRIPTION'];
			echo '</div>';
			$this->EndViewTarget();
		}
	}
	
?>
<div class="col-12 col-lg-8">

	<? foreach ($arResult["ITEMS"] as $index => $arItem) :

		$res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
		if ($ar_res = $res->GetNext())
			// echo $ar_res['NAME'];

			if (CModule::IncludeModule("millcom.phpthumb")) {
				$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 5);
				$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 4);
				$arItem["DETAIL_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 5);
				$arItem["DETAIL_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 4);
			}
	?>

		<div class="mb-4 ">
			<div class="row g-4">

				<div class="px-lg-0 col-12 col-md-6 ">
					<div class="comparison__box-img position-relative fs-22 fw-600">
						<picture>
							<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" class="h-100 w-100" width="400" height="370" />
						</picture>

						<div class="flex-wrap gap-3 comparison__box d-flex position-absolute z-1">
							<span class="px-4 py-1 bg-white bg-opacity-50 border border-black opacity-50 comparison__name z-1"><?= $ar_res['NAME'] ?></span>
							<span class="px-4 py-1 bg-white bg-opacity-50 border opacity-50 comparison__data"><?= $arItem["ACTIVE_FROM"] ?></span>
						</div>

					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="comparison__box-img ">
						<picture>
							<source srcset="<?= $arItem["DETAIL_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["DETAIL_PICTURE"]["PNG"] ?>" alt="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>" title="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>" class="h-100 w-100" width="400" height="370" />
						</picture>
					</div>
				</div>
			</div>
		</div>
		<? endforeach; ?>
	</div>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif; ?>