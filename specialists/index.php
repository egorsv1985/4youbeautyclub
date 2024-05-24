<?
// define('TYPE_PAGE', 'SPECIALISTS');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Специалисты");
$APPLICATION->SetTitle("Специалисты");
?>
<div class="mb-2 fs-24">Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.
	!</div>
<div class="fs-24">Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.
	Мы гарантируем вам не только ухоженность, но и радость от каждой посещённой нами процедуры. Доверьтесь профессионалам и откройте для себя новое измерение косметологии!</div>
<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"specialists",
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
		"IBLOCK_ID" => "3",
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
		"COMPONENT_TEMPLATE" => "specialists"
	),
	false
);
?>
<section class="py-5 about-us">
	<div class="container position-relative">
		<div class="row gx-0">
			<div class="col-md-6 position-relative">
				<div class="cover"></div>
			</div>
			<div class="py-5 col-md-6 ps-5 fs-24">
				<h2 class="mb-4 fs-58 fw-700">О нас</h2>
				<p>Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.</p>
				<p>Мы гарантируем вам не только ухоженность, но и радость от каждой посещённой нами процедуры. Доверьтесь профессионалам и откройте для себя новое измерение косметологии!</p>

				<div class="mt-5 btns">
					<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Узнать больше</a>
				</div>
			</div>
		</div>
	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>