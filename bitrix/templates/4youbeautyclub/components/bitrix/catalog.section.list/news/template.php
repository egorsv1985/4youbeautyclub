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
<ul class="blog__list ">
	<? foreach ($arResult['SECTIONS'] as &$arSection) :
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete);
	?>
		<li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
			<a href="<?= $arSection['SECTION_PAGE_URL'] ?>">
				<?= $arSection['NAME']; ?>
			</a>
		</li>
	<? endforeach; ?>
</ul>
