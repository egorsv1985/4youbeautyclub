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
						<div class="flex-wrap gap-2 flex-md-nowrap d-flex justify-content-between align-items-center">
							<div class="text-uppercase"><?= $arItem["NAME"]; ?></div>
							<button type="button" data-bs-toggle="modal" data-bs-target="#vacancy-<?= $this->GetEditAreaId($arItem['ID']); ?>" class="p-0 btn top-btn btn-arrow d-flex align-items-center fs-24">подробнее</button>
						</div>
					</div>
				</li>
				<div class="modal fade" id="vacancy-<?= $this->GetEditAreaId($arItem['ID']); ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

								</button>
							</div>
							<div class="modal-body">
								<h2 class="fs-32"><?= $arItem["NAME"]; ?></h2>
								<div class="">
									<?= $arItem["DETAIL_TEXT"]; ?>
								</div>
							</div>
							<div class="modal-footer">
								<span class="fs-24 fw-700">Контакты для связи:</span>
								<?
								$tel = \Victory\Options\CVictoryOptions::getOptionValue('tel_' . SITE_ID);
								?>
								<a href="tel:<?= str_replace(array(' ', '(', ')', '-'), '', $tel); ?>" class=" fs-24 text-nowrap ps-5"><?= $tel; ?></a>
							</div>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</ul>
	</div>
</section>