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
<section class="py-5 news-main">
	<div class="container">
		<div class=" row gy-4">
			<div class=" col-12 col-xl-4 fs-24">
				<h2 class="mb-4 fs-58 fw-700">Популярные статьи</h2>
				<p>Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.</p>
				<div class="mt-5 btns d-none d-lg-block">
					<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Все статьи</a>
				</div>
			</div>
			<div class=" col-12 col-xl-8">
				<div class="p-5 pe-md-0 news-right position-relative fs-24 fs-600">
					<div class="row gy-4">
						<? foreach ($arResult["ITEMS"] as $index => $arItem) : ?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<? if ($index == 0) : ?>
								<div class="col-12 col-lg-8 position-relative d-none d-xl-block">
									<div class="position-relative h-100">
										<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" class="bottom-0 h-auto position-absolute w-100">
									</div>
								</div>
							<? endif; ?>
							<div class="col-12  <?= $index == 0 ? 'col-xl-4' : ($index == 1 ? 'col-lg-4' : 'col-lg-8') ?>">
								<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="px-2 py-3 news-item h-100 d-flex justify-content-between flex-column text-uppercase">
									<div class="mb-5 news-num"><?= $index + 1 ?></div>
									<p><?= $arItem["~NAME"] ?> </p>
								</a>
							</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
				<div class="d-lg-none btns">
					<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Все статьи</a>
				</div>
			</div>
	</div>
</section>