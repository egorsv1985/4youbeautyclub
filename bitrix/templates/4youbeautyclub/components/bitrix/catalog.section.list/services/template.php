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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

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

<div class="row gy-3 pb-5 mb-md-5">
<?foreach ($arResult['SECTIONS'] as &$arSection):
	//print_r($arSection);
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	if (CModule::IncludeModule("millcom.phpthumb"))
		$arSection['PICTURE']['WEBP'] = CMillcomPhpThumb::generateImg($arSection['PICTURE']['SRC'], 1);

	?>
	<div class="col-md-6 service-section-item" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
		<a href="<?=$arSection['SECTION_PAGE_URL']?>" title="<?=$arSection["NAME"];?>">
			<img src="<?=$arSection['PICTURE']['WEBP'];?>" class="w-100 h-auto">
			<span class="overlay fs-24 text-center text-uppercase fw-600 d-flex flex-column justify-content-center">
				<span><?=$arSection["NAME"];?></span>
			</span>
		</a>
	</div>
<?endforeach;?>
</div>
