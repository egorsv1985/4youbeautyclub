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
$arFilter = array(
	'IBLOCK_ID' => 5
);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
?>
<ul class="gap-5 blog__list d-flex flex-column flex-lg-row">
	<? foreach ($arResult['SECTIONS'] as &$arSection) :
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete);
	?>
		<li class="" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
			<a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="text-uppercase fs-24 fw-600">
				<?= $arSection['NAME']; ?>
			</a>
		</li>
	<? endforeach; ?>
</ul>