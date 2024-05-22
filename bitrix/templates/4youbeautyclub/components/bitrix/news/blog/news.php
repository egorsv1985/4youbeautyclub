<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
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
?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "services", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "CONTENT",	// Тип инфоблока
		"IBLOCK_ID" => "1",	// Инфоблок
		"SECTION_ID" => "0",	// ID раздела
		"SECTION_CODE" => "",	// Код раздела
		"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",	// Дополнительный фильтр для подсчета количества элементов в разделе
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",	// Скрывать разделы с нулевым количеством элементов
		"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "NAME",
			1 => "DESCRIPTION",
			2 => "PICTURE",
			3 => "",
		),
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
		"VIEW_MODE" => "LINE",	// Вид списка подразделов
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "7200",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
	),
	false
);?>
