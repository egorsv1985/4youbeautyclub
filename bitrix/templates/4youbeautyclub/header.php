<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

if (!defined("TYPE_PAGE"))
	define('TYPE_PAGE', 'TEXT');

use \Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addCss('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
$asset->addJs(SITE_TEMPLATE_PATH . '/libs/jquery-3.7.1/jquery-3.7.1.js');
$asset->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap-5.3.3-dist/css/bootstrap.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/libs/bootstrap-5.3.3-dist/js/bootstrap.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/libs/slick/slick.min.js');
$asset->addCss(SITE_TEMPLATE_PATH . '/libs/slick/slick.min.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/script.js');
if (CModule::IncludeModule("victory.options")) {
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<? if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false) : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<? else : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<? endif; ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<? $APPLICATION->ShowHead(); ?>
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
</head>

<body>
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>
	<div class="page position-relative" id="page-<?= strtolower(TYPE_PAGE); ?>">
		<header class="top-0 w-100 start-0" id="header">
			<div class="container ">
				<div class="py-4 justify-content-between row align-items-center flex-nowrap">
					<div class="col-6 col-sm-4 col-lg-2">
						<a href="/">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="" class="h-auto mw-100" width="121" height="54">
						</a>
					</div>
					<div class="col-lg-7 col-1 fw-600">
						<ul class="py-3 text-center main-menu text-uppercase">
							<li><a href="/about/">о нас</a></li>
							<li><a href="/uslugi/">услуги</a></li>
							<li><a href="/specialists/">специалисты</a></li>
							<li><a href="/comparison/">до/после</a></li>
							<li><a href="/contacts/">контакты</a></li>
							<li><a href="/blog/">блог</a></li>
						</ul>
					</div>
					<div class="col-6 col-lg-3 text-end d-none d-sm-block">
						<a href="#" class="btn btn-outline-dark top-btn fs-24 text-nowrap">Оставить заявку</a>
					</div>
					<div class="col-2 col-sm-1">
						<div class="d-flex d-lg-none h-100 align-items-center">
							<button type="button" class="header__burger burger w-100">
								<span class="burger__inner position-relative w-100 h-100 d-flex justify-content-center align-items-center">
									<span></span>
								</span>
							</button>
						</div>
					</div>
				</div>

			</div>
		</header>
		<? if (TYPE_PAGE == 'MAIN') : ?>
			<ul class="gap-4 d-flex flex-column align-items-center justify-content-between header__social">
				<li>
					<a href="<?= \Victory\Options\CVictoryOptions::getOptionValue('telegram_' . SITE_ID); ?>" target="_blank">
						<img src="<?= SITE_TEMPLATE_PATH ?>/images/telegram.svg" alt="telegram" class="">
					</a>
				</li>
				<li>
					<a href="<?= \Victory\Options\CVictoryOptions::getOptionValue('instagram_' . SITE_ID); ?>" target="_blank">
						<img src="<?= SITE_TEMPLATE_PATH ?>/images/instagram.svg" alt="instagram" class="">
					</a>
				</li>
			</ul>
			<section class="pb-5 main-offer">
				<div class="container mb-5 position-relative">
					<div class="row">
						<div class="col-md-6 offer-text">
							<div class="mb-4 tab-label fs-18">Салон красоты</div>
							<h1 class="mb-4 text-uppercase">
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
					<div class="cover d-none d-md-block"></div>
					<div class="px-4 py-5 directions d-flex flex-nowrap fs-24 fw-400">
						<div class="item ico-cosmetology">косметология</div>
						<div class="item ico-studio">студия красоты</div>
					</div>
				</div>
			</section>
			<?
			$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/about-us.php");
			?>
			<? $APPLICATION->IncludeComponent(
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
			); ?>
		<? elseif (TYPE_PAGE == 'CONTANER') : ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				".default",
				array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			); ?>

		<? else : ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				".default",
				array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			); ?>
			<? $APPLICATION->ShowViewContent('topPage'); ?>
			<div class="py-5 head-title">
				<div class="container">
					<div class="row">
						<div class="col text-uppercase">
							<h1><? $APPLICATION->ShowTitle(false) ?></h1>
						</div>
						<? $APPLICATION->ShowViewContent('topColRight'); ?>
					</div>
				</div>
			</div>
			<div class="container">
			<? endif; ?>