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
			<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="px-2 py-3 news-item h-100 d-inline-block text-uppercase">
				<div class="mb-5 news-num"><? $index + 1 ?></div>
				<p><?= $arItem["~NAME"] ?> </p>
			</a>
		</div>
	<? endforeach; ?>
</div>

<!-- <div class="row gy-4">
	<div class="col-12 col-lg-8 position-relative d-none d-xl-block">
		<div class="position-relative h-100">
			<img src="<?= SITE_TEMPLATE_PATH; ?>/images/blog.png" alt="" class="bottom-0 h-auto position-absolute w-100">
		</div>
	</div>
	<div class="col-12 col-xl-4 ">
		<a href="#" class="px-2 py-3 news-item h-100 d-inline-block text-uppercase">
			<div class="mb-5 news-num">1</div>
			<p>Идеальный образ: как подобрать уход за кожей </p>
		</a>
	</div>
	<div class="col-12 col-lg-4">
		<a href="#" class="px-2 py-3 news-item h-100 d-inline-block text-uppercase ">
			<div class="mb-5 news-num">2</div>
			<p>Секреты<br> здоровья кожи: важность ухода </p>
		</a>
	</div>
	<div class="col-12 col-lg-8">
		<a href="#" class="px-2 py-3 news-item h-100 d-inline-block text-uppercase ">
			<div class="mb-5 news-num">3</div>
			<p>Топ-5 тенденций в мире косметологии: новое в 2024 году</p>
		</a>
	</div>
</div> -->