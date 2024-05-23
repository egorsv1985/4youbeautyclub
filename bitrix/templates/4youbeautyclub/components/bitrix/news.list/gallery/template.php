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
<section class="py-5 gallery">
	<div class="gallery__slider slider d-none d-lg-block">
<?
$totalItems = count($arResult["ITEMS"]);
$itemsPerRow = 6;
$numRows = floor($totalItems / $itemsPerRow);

for ($row = 0; $row < $numRows; $row++) : ?>
	<div class="slider__item ">
		<div class="g-0 row ">
			<? for ($col = 0; $col < $itemsPerRow; $col++) : ?>
				<?
				$index = $row * $itemsPerRow + $col;
				$arItem = $arResult["ITEMS"][$index];
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-12 col-lg-3 p-0 <? if (($col + 1) % 4 == 0) echo 'offset-lg-3'; ?>">
					<div class="gallery__box d-flex justify-content-center align-items-center h-100">
						<? if ($arItem["PREVIEW_PICTURE"]["SRC"]) : ?>
							<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
						<? else : ?>
							<p><?= $arItem["PREVIEW_TEXT"] ?></p>
						<? endif ?>
					</div>
				</div>
			<? endfor; ?>
		</div>
	</div>
<? endfor; ?>

	</div>

	<div class="gallery__slider slider d-block d-lg-none">


<?
foreach ($arResult["ITEMS"] as $arItem) :
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="slider__item">

		<div class="gallery__box d-flex justify-content-center align-items-center h-100">
			<? if ($arItem["PREVIEW_PICTURE"]["SRC"]) : ?>
				<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
			<? else : ?>
				<p><?= $arItem["PREVIEW_TEXT"] ?></p>
			<? endif ?>
		</div>
	</div>
<? endforeach; ?>
	</div>
</section>