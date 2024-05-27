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
<section class="instruments">
	<div class="container">
		<div class=" instruments__slider slider position-relative">
			<?
			foreach ($arResult["ITEMS"] as $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				if (CModule::IncludeModule("millcom.phpthumb")) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 7);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 8);
				}
			?>
				<div class="slider__item">
					<div class="row">
						<div class="col-12 col-md-6 instruments__left">
							<h2 class="mb-5 fs-58 fw-700"><?= $arItem["NAME"]; ?></h2>
							<div class="instruments__content fs-24">
								<?= $arItem["PREVIEW_TEXT"]; ?>
							</div>
						</div>
						<div class="col-12 col-md-6 position-relative d-none d-lg-block">
							<div class="position-absolute instruments__box-image">
								<picture>
									<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" class="h-100 w-100" width="764" height="876" />
								</picture>
								
							</div>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</section>