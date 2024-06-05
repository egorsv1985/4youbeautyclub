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
					<a href="/blog/" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Все статьи</a>
				</div>
			</div>
			<div class=" col-12 col-xl-8">
				<div class="p-5 pe-md-0 news-right position-relative fs-24 fs-600">
					<div class="row gy-4">
						<? foreach ($arResult["ITEMS"] as $index => $arItem) : ?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							if (CModule::IncludeModule("millcom.phpthumb")) {
								$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 9);
								$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 10);
							}
							?>
							<? if ($index == 0) : ?>
								<div class="col-12 col-lg-8 position-relative d-none d-xl-block">
									<div class="position-relative h-100">
										<picture>
											<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" class="bottom-0 h-100 position-absolute w-100" width="595" height="380" />
										</picture>
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