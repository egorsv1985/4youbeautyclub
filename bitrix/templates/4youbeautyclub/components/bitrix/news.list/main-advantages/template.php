<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<div class="container py-5">
	<div class="py-4 advantages">
		<div class="row ">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
			<div class="py-4 col-lg-4 col-12 fs-20" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="px-4 advantage-item">
					<div class="mb-3 fs-24 text-uppercase"><?=$arItem["~NAME"]?></div>
					<div class="fw-200"><?=$arItem["PREVIEW_TEXT"];?></div>
				</div>
			</div>
	<?endforeach;?>
		</div>
	</div>
</div>
