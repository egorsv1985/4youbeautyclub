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
if ($arResult["DETAIL_PICTURE"]) {
	if (CModule::IncludeModule("millcom.phpthumb"))
		$arResult["DETAIL_PICTURE"]['WEBP'] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 3);
?>
	<div class="cover-page text-center" style="background-image: url('<?= $arResult["DETAIL_PICTURE"]["WEBP"]; ?>')">
		<div class="blackout py-5">
			<div class="container py-5">
				<div class="h1 mt-5 fs-70 fw-700"><?= $arResult['NAME'] ?></div>
				<div class="blog__data fs-24">
					<span>
						<?= $arItem["ACTIVE_FROM"] ?>
					</span>
				</div>
				<? if ($arResult["PREVIEW_TEXT"]) : ?>
					<p class="text-uppercase fs-24 fw-500">
						<?= $arResult["PREVIEW_TEXT"]; ?>
					</p>
				<? endif; ?>
				<div class="btns mt-5">
					<a href="#" class="btn btn-outline-light top-btn btn-arrow fs-24 py-3 px-4">Записаться на приём</a>
				</div>
			</div>
		</div>
	</div>
<?
}
?>