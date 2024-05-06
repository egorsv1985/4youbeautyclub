<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

if (!defined("TYPE_PAGE"))
	define('TYPE_PAGE', 'TEXT');

use \Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addCss('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
$asset->addJs(SITE_TEMPLATE_PATH . '/libs/jquery-3.7.1/jquery-3.7.1.js');
$asset->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap-5.3.3-dist/css/bootstrap.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/libs/bootstrap-5.3.3-dist/js/bootstrap.js');

$asset->addJs(SITE_TEMPLATE_PATH . '/script.js');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" /> 	
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div class="page position-relative" id="page-<?=strtolower(TYPE_PAGE);?>">
			<header class="top-0 w-100 start-0">
				<div class="container position-relative">
					<div class="py-4 row align-items-center flex-nowrap">
						<div class="col-md-2">
							<a href="/">
								<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="" class="h-auto mw-100" width="121" height="54">
							</a>
						</div>
						<div class="col-md-7 fw-600">
							<ul class="flex-row py-3 text-center d-flex main-menu w-100 justify-content-between text-uppercase">
								<li><a href="#">о нас</a></li>
								<li><a href="/uslugi/">услуги</a></li>
								<li><a href="#">специалисты</a></li>
								<li><a href="#">до/после</a></li>
								<li><a href="#">контакты</a></li>
								<li><a href="#">блог</a></li>
							</ul>
						</div>
						<div class="col-md-3 text-end">
							<a href="#" class="btn btn-outline-dark top-btn fs-24">Оставить заявку</a>
						</div>
					</div>
				</div>
			</header>
<?if (TYPE_PAGE == 'MAIN'):?>
			<div class="pb-5 main-offer">
				<div class="container mb-5 position-relative">
					<div class="row">
						<div class="col-md-6 offer-text">
							<div class="mb-2 tab-label fs-18">Салон красоты</div>
							<h1 class="text-uppercase">
								4you
								Beauty
								Club
							</h1>
							<div class="my-2">
								<p>
									Будем рады улучшить ваше самочувствие, поднять настроение и продлить молодость.
								</p>
							</div>
							<div class="mt-5 btns">
								<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Оставить заявку</a>
							</div>
						</div>
					</div>
					<div class="cover"></div>
					<div class="px-4 py-5 text-center directions fs-24 w-50 fw-400">
						<div class="item ico-cosmetology">косметология</div>
						<div class="item ico-studio">студия красоты</div>
					</div>
				</div>
			</div>
			<div class="py-5 about-us">
				<div class="container mb-5 position-relative">
					<div class="row gx-0">
						<div class="col-md-6 position-relative">
							<div class="cover"></div>
						</div>
						<div class="py-5 col-md-6 ps-5 fs-24">
							<h2 class="fs-58 fw-700">О нас</h2>
							<p>Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.</p>
							<p>Мы гарантируем вам не только ухоженность, но и радость от каждой посещённой нами процедуры. Доверьтесь профессионалам и откройте для себя новое измерение косметологии!</p>
							
							<div class="mt-5 btns">
								<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Узнать больше</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main-advantages", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "7200",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "SYSTEM",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main-advantages"
	),
	false
);?>
<?elseif (TYPE_PAGE == 'CONTANER'):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	".default",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>

<?else:?>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	".default",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>
<?$APPLICATION->ShowViewContent('topPage');?>
			<div class="py-5 head-title">
				<div class="container">
					<div class="row">
						<div class="col text-uppercase">
							<h1><?$APPLICATION->ShowTitle(false)?></h1>
						</div>
						<?$APPLICATION->ShowViewContent('topColRight');?>
					</div>
				</div>
			</div>
			<div class="container">
<?endif;?>