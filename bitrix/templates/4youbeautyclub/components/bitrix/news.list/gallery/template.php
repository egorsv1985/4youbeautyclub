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

<?
$totalItems = count($arResult["ITEMS"]);
$itemsPerRow = 6;
$numRows = floor($totalItems / $itemsPerRow);

for ($row = 0; $row < $numRows; $row++) : ?>
	<div class="slider__item">
		<div class="row">
			<? for ($col = 0; $col < $itemsPerRow; $col++) : ?>
				<?
				$index = $row * $itemsPerRow + $col;
				$arItem = $arResult["ITEMS"][$index];
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-lg-3 <? if (($col + 1) % 4 == 0) echo 'offset-lg-3'; ?>">
					<div class="gallery__box">
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