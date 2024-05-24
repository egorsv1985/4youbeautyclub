<?php
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

// Проверяем, существует ли массив $arResult['SECTION']['PATH'] и не пуст ли он
if (is_array($arResult['SECTION']['PATH']) && !empty($arResult['SECTION']['PATH'])) {
	// Получаем последний элемент массива $arResult['SECTION']['PATH']
	$SECTION = end($arResult['SECTION']['PATH']);
	$SECTION_CURRENT = array();
	$SECTION_NAME = ''; // Переменная для хранения имени раздела

	$rsSections = CIBlockSection::GetByID($SECTION['ID']);
	if ($arSections = $rsSections->GetNext()) {
		$SECTION_CURRENT = $arSections;
		if ($arSections['NAME']) { // Проверяем наличие имени раздела
			$SECTION_NAME = $arSections['NAME']; // Записываем имя раздела в переменную
		}
	}
} else {
	// Обработка случая, когда $arResult['SECTION']['PATH'] пуст или не существует
	// Возможно, здесь нужно предпринять определенные действия, в зависимости от логики вашего компонента
	$SECTION_NAME = 'Раздел не найден'; // Пример сообщения об ошибке или заполнения по умолчанию
}
?>

<div class="mb-5 row gy-3">
	<?php foreach ($arResult["ITEMS"] as $index => $arItem) : ?>
		<div class="col-12 col-lg-6 blog__item">
			<div class="gap-3 border border-black d-flex flex-column h-100">
				<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="d-flex flex-column h-100">
					<div class="p-4 blog__data fs-24">
						<span class="opacity-50">
							<?= $arItem["ACTIVE_FROM"] ?>
						</span>
					</div>
					<div class="mb-4 position-relative">
						<img class="w-100" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
						<div class="flex-wrap gap-3 blog__box d-flex position-absolute z-1 fs-22 fw-600">
							<span class="px-4 py-1 bg-white bg-opacity-50 border border-black opacity-50 blog__name z-1"><?= $SECTION_NAME; ?></span>
						</div>
					</div>
					<div class="px-4 mb-4 opacity-75 fs-24 fw-600 text-uppercase">
						<?= $arItem["NAME"]; ?>
					</div>
					<div class="px-4 opacity-50 fs-24">
						<p><?= $arItem["PREVIEW_TEXT"] ?></p>
					</div>
				</a>
				<div class="px-4 mt-auto mb-4 text-end">
					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="p-0 btn top-btn btn-arrow fs-24">подробнее</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>