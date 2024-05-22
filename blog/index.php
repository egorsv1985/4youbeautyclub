<?
//define('TYPE_PAGE', 'CONTANER');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "блог");
$APPLICATION->SetTitle("Полезные статьи");
?>
<div class="mb-2 fs-24">Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.
	!</div>
<div class="fs-24">Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.
	Мы гарантируем вам не только ухоженность, но и радость от каждой посещённой нами процедуры. Доверьтесь профессионалам и откройте для себя новое измерение косметологии!</div>
<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"news",
	array(
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "7200",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "CONTENT",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0 => "NAME", 1 => "",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "news"
	),
	false
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>