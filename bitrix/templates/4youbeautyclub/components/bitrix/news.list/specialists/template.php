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
$SECTION = end($arResult['SECTION']['PATH']);
$SECTION_CURRENT = array();
$SECTION_ID = ''; // Переменная для хранения имени раздела

$rsSections = CIBlockSection::GetByID($SECTION['ID']);
if ($arSections = $rsSections->GetNext()) {
    $SECTION_CURRENT = $arSections;
    if ($arSections['ID']) {
        $SECTION_ID = $arSections['ID'];
    }
}

$slideCount = count($arResult["ITEMS"]);
?>
<div class="mb-5 specialists__slider-<?=$SECTION_ID;?> slider">
<?
foreach ($arResult["ITEMS"] as $index => $arItem) :
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	if (CModule::IncludeModule("millcom.phpthumb")) {
		$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 13);
		$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 14);
	}
?>
	<div class="slider__item">
		<div class="px-3">
			<div class="mb-4">
				<picture>
					<source srcset="<?=$arItem["PREVIEW_PICTURE"]["WEBP"]?>" type="image/webp"><img src="<?=$arItem["PREVIEW_PICTURE"]["PNG"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="h-auto w-100" width="385" height="445" />
				</picture>
			</div>
			<div class="py-1 border-2 border-black slider__content ps-4 border-start">
				<div class="mb-2 fs-24 fw-600 text-uppercase slider__name"><?=$arItem["NAME"];?></div>
				<div class="fs-24 slider__post"><?=$arItem['PROPERTIES']['POST']['VALUE'];?></div>
			</div>
			<div class="fs-24 ps-4"><span>стаж </span><?=$arItem['PROPERTIES']['PERIOD']['VALUE'];?></div>
		</div>
	</div>
<? endforeach; ?>
</div>
<div class="justify-between slick__control slick__control-<?=$arSection['ID'];?> align-items-center ms-auto d-flex">
						<span class="fs-27 fw-500 num--first">01</span>
						<div class="slick__dots-<?=$SECTION_ID;?> w-100">
					</div>
						<span class="fs-27 fw-500 num--last"><?=str_pad($slideCount, 2, '0', STR_PAD_LEFT);?></span>
					</div>
				</div>
				<script>
					$(document).ready(function() {
						$('.specialists__slider-<?=$SECTION_ID;?>').slick({
							infinite: true,
							dots: true,
							swipe: true,
							arrows: true,
							cssEase: 'linear',
							slidesToShow: 3,
							slidesToScroll: 1,
							appendDots: $('.specialists-main .slick__dots-<?=$SECTION_ID;?>'),
							responsive: [{
									breakpoint: 900,
									settings: {
										slidesToShow: 2,
									},
								},
								{
									breakpoint: 768,
									settings: {
										slidesToShow: 1,
									},
								},
							],
						})
					});
				</script>