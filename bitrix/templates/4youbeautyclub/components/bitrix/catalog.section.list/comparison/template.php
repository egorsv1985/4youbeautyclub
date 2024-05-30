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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
?>

<div class="col-12 col-lg-4 menu-container" id="menu-container">
	<div class="left-menu text-lowercase">
		<ul>
			<? foreach ($arResult['SECTIONS'] as &$arSection) :
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete);
			?>
				<li class="item-section <?= $arSection['ID'] == $arParams['ID'] ? 'active' : ''  ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="fs-24 fw-600"><?= $arSection['NAME']; ?></a>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
</div>