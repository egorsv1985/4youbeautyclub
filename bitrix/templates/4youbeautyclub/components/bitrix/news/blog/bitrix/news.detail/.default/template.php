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
//print_r($arResult);

$this->SetViewTarget('topPage');
if (CModule::IncludeModule("millcom.phpthumb")) {
	$arResult["DETAIL_PICTURE"]['WEBP'] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 3);
	$arResult["DETAIL_PICTURE"]['PNG'] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 16);
}
?>
<div class="mb-5 text-center cover-page" style="background-image: url('<?= $arResult["DETAIL_PICTURE"]["WEBP"]; ?>'), url('<?= $arResult["DETAIL_PICTURE"]["PNG"]; ?>');">
	<div class="py-5 blackout">
		<div class="container py-5">
			<div class="mt-5 h1 fs-58 fw-700"><?= $arResult['NAME'] ?></div>
		</div>
	</div>
</div>
<?
$this->EndViewTarget();
?>
<div class="py-4 fs-24 text-gray">
	<?= $arResult["DISPLAY_ACTIVE_FROM"] ?>
</div>
<div class="mb-5 fs-24">
	<?= $arResult["DETAIL_TEXT"]; ?>
</div>
<?
$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", 'PROPERTY_POST');
$arFilter = array(
	"IBLOCK_ID" => 3,
	"ACTIVE" => "Y",
	'ID' => $arResult['PROPERTIES']['AUTHOR']['VALUE']
);
$rsElements = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
if ($arElement = $rsElements->GetNext()) :
	if (CModule::IncludeModule("millcom.phpthumb")) {
		$arElement["PREVIEW_PICTURE_WEBP"] = CMillcomPhpThumb::generateImg($arElement["PREVIEW_PICTURE"], 12);
		$arElement["PREVIEW_PICTURE_PNG"] = CMillcomPhpThumb::generateImg($arElement["PREVIEW_PICTURE"], 11);
	}
	// print_r($arElement);
?>
	<div class="gap-4 py-5 d-flex">
		<div class="rounded-circle ">
			<picture>
				<source srcset="<?= $arElement["PREVIEW_PICTURE_WEBP"] ?>" type="image/webp"><img src="<?= $arElement["PREVIEW_PICTURE_PNG"] ?>" alt="<?= $arElement["NAME"] ?>" title="<?= $arElement["NAME"] ?>" class="h-auto w-100 rounded-circle" width="90" height="90" />
			</picture>
		</div>
		<div class="gap-3 d-flex flex-column fw-600 ">
			<div class="opacity-50 fs-20">автор</div>
			<div class="fs-24 fw-600 text-uppercase"><?= $arElement["NAME"] ?></div>
			<div class="opacity-75"><?= $arElement["PROPERTY_POST_VALUE"] ?></div>
		</div>
	</div>
<? endif; ?>