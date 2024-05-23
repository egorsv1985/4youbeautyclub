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
<section class="py-5 mb-5 vakansii">
	<div class="container">
		<h2 class="mb-5 fs-58 fw-700 text-uppercase">Вакансии</h2>
		<ul class="gap-3 flex-column d-flex">
			<?
			foreach ($arResult["ITEMS"] as $index => $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
				<li class="py-2 border-2 border-bottom vakansii__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class=" col fs-24 fw-600">
						<div class="d-flex justify-content-between align-items-center">
							<div class="text-uppercase"><?= $arItem["NAME"]; ?></div>
							<a href="#" class="p-0 btn top-btn btn-arrow fs-24">подробнее</a>
						</div>
					</div>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
</section>