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
<div class="mb-5 row gy-3">
	<? foreach ($arResult["ITEMS"] as $index => $arItem) :

		$res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
		if ($ar_res = $res->GetNext())
			// echo $ar_res['NAME'];

			if (CModule::IncludeModule("millcom.phpthumb")) {
				$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 9);
				$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 10);
			}
	?>

		<div class="col-12 col-lg-6 blog__item">
			<div class="gap-3 border border-black d-flex flex-column h-100">
				<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="d-flex flex-column h-100">
					<div class="p-4 blog__data fs-24">
						<span class="opacity-75">
							<?= $arItem["ACTIVE_FROM"] ?>
						</span>
					</div>
					<div class="mb-4 position-relative">
						<picture>
							<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" class="h-100 w-100" width="595" height="380" />
						</picture>
						<div class="flex-wrap gap-3 blog__box d-flex position-absolute z-1 fs-22 fw-600">
							<span class="px-4 py-1 bg-white bg-opacity-50 border border-black opacity-50 blog__name z-1"><?= $ar_res['NAME'] ?></span>
						</div>
					</div>
					<div class="px-4 mb-4 opacity-75 fs-24 fw-600 text-uppercase">
						<?= $arItem["NAME"]; ?>
					</div>
					<div class="px-4 opacity-50 fs-24">
						<p><?= $arItem["PREVIEW_TEXT"] ?></p>
					</div>
				</a>
				<div class="px-4 mt-auto mb-4 text-end">
					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="p-0 btn top-btn btn-arrow fs-24">подробнее</a>
				</div>
			</div>
		</div>
	<? endforeach; ?>
</div>