<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<div class="bottom-form">

</div>
<? if (TYPE_PAGE == 'MAIN') : ?>
<? elseif (TYPE_PAGE == 'CONTANER') : ?>
<? else : ?>
	</div>
<? endif; ?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form",
	"form-footer",
	array(
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_NAME" => "Ваше имя",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"DEFAULT_INPUT_SIZE" => "30",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "SYSTEM",
		"LEVEL_LAST" => "Y",
		"LIST_URL" => "",
		"MAX_FILE_SIZE" => "0",
		"MAX_LEVELS" => "100000",
		"MAX_USER_ENTRIES" => "100000",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"PROPERTY_CODES" => array(
			0 => "3",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "3",
		),
		"RESIZE_IMAGES" => "N",
		"SEF_MODE" => "N",
		"STATUS" => "ANY",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо, Ваша заявка успешно сохранена",
		"USER_MESSAGE_EDIT" => "Спасибо, Ваша заявка успешно сохранена!",
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => "form-footer"
	),
	false
);
?>
<section class="contacts fs-24 <?= (TYPE_PAGE == 'CONTACTS') ? 'd-none' : '' ?>">
	<div class="container">
		<div class="row gy-4">
			<div class="col-12 col-lg-4">
				<h2 class="mb-5 fs-58 fw-700">Контакты</h2>
				<div class="d-flex flex-column">
					<h3>Адрес</h3>
					<p><?= \Victory\Options\CVictoryOptions::getOptionValue('address_' . SITE_ID); ?></p>
					<h3>Режим работы:</h3>
					<p><?= \Victory\Options\CVictoryOptions::getOptionValue('schedule_' . SITE_ID); ?></p>
				</div>
				<div class="gap-4 d-flex flex-column">
					<?
					$tel = \Victory\Options\CVictoryOptions::getOptionValue('tel_' . SITE_ID);
					?>
					<a href="tel:<?= str_replace(array(' ', '(', ')', '-'), '', $tel); ?>" class="d-block fs-24 text-nowrap ps-5 contacts-phone"><?= $tel; ?></a>
					<a href="mailto:<?= \Victory\Options\CVictoryOptions::getOptionValue('mail_' . SITE_ID); ?>" class="d-block text-nowrap fs-24 ps-5 contacts-mail"><?= \Victory\Options\CVictoryOptions::getOptionValue('mail_' . SITE_ID); ?></a>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<? $APPLICATION->IncludeComponent(
					"bitrix:map.yandex.view",
					".default",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"INIT_MAP_TYPE" => "MAP",
						"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:55.703505;s:10:\"yandex_lon\";d:37.731057;s:12:\"yandex_scale\";i:12;}",
						"MAP_WIDTH" => "100%",
						"MAP_HEIGHT" => "475",
						"CONTROLS" => array(
							0 => "ZOOM",
							1 => "SMALLZOOM",

						),
						"OPTIONS" => array(
							0 => "ENABLE_SCROLL_ZOOM",
							1 => "ENABLE_DBLCLICK_ZOOM",
							2 => "ENABLE_DRAGGING",
						),
						"MAP_ID" => "",
						"API_KEY" => ""
					),
					false
				); ?>
			</div>
		</div>
	</div>
</section>

</div>
<footer class="py-5 fw-300">
	<div class="container pt-lg-5">
		<div class="text-center row gy-4 text-md-start">
			<div class="col-lg-3 col-md-6 col-12">
				<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="" class="h-auto mw-100" width="121" height="54">
				<div class="py-2 my-4 fs-18">
					© <?= date('Y'); ?> 4YOU Beauty club
				</div>
				<img src="<?= SITE_TEMPLATE_PATH; ?>/images/f-icon.svg" alt="" class="w-60 d-none d-md-inline">
			</div>
			<div class="col-lg-2 col-md-6 col-12">
				<div class="mb-3 f-title text-uppercase fw-500 fs-24">Навигация</div>
				<ul class="mb-4 f-menu fs-22">
					<li>
						<a href="/about/">о нас</a>
					</li>
					<li>
						<a href="/uslugi/">услуги</a>
					</li>
					<li>
						<a href="/specialists/">специалисты</a>
					</li>
					<li>
						<a href="/comparison/">до/после</a>
					</li>
					<li>
						<a href="/contacts/">контакты</a>
					</li>
					<li>
						<a href="/blog/">блог</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="mb-3 f-title text-uppercase fw-500 fs-24"><a href="/uslugi/">Услуги</a></div>
				<ul class="mb-4 f-menu fs-22 text-lowercase">
					<?
					$arFilter = array('IBLOCK_ID' => 1, 'DEPTH_LEVEL' => 2);
					$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
					while ($arSection = $rsSections->GetNext()) : ?>
						<li>
							<a href="<?= $arSection['SECTION_PAGE_URL']; ?>"><?= $arSection['NAME'] ?></a>
						</li>
					<? endwhile; ?>
				</ul>

			</div>
			<div class="text-center col-lg-3 col-md-6 col-12 text-md-start">
				<div class="mb-3 f-title text-uppercase fw-500 fs-24"><a href="/o_nas/">О клинике</a></div>
				<div class="pb-2 mb-4 fs-22">ООО «ФОЮ» Лицензия Л041-01126-23/00588911 от 10.06.2021 г. ИНН 2364019749</div>
				<div class="mb-3 f-title text-uppercase fw-500 fs-24">мы в соц.Сетях</div>
				<ul class="gap-4 d-flex align-items-center justify-content-center justify-content-lg-start">
					<li>
						<a href="<?= \Victory\Options\CVictoryOptions::getOptionValue('telegram_' . SITE_ID); ?>" target="_blank">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/telegram-white.svg" alt="telegram" class="">
						</a>
					</li>
					<li>
						<a href="<?= \Victory\Options\CVictoryOptions::getOptionValue('instagram_' . SITE_ID); ?>" target="_blank">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/instagram-white.svg" alt="instagram" class="">
						</a>
					</li>
				</ul>
			</div>
		</div>
		<hr class="my-4">
		<div class="row fs-20">
			<div class="text-center col-12 col-lg t col-md-6 text-md-start"><a href="/politika/">Политика конфиденциальности</a></div>
			<div class="text-center col-12 col-lg t col-md-6 text-md-end"><a href="https://target-kc.ru" target="_blank">Разработка сайта: Таргет Консалт Компани</a></div>
		</div>
	</div>
</footer>
<!-- Modal -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

				</button>
			</div>
			<div class="modal-body">
				<?
				$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form", 
	"form-modal", 
	array(
		"AJAX_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "form-modal",
		"STATUS_NEW" => "N",
		"LIST_URL" => "",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_EDIT" => "Спасибо, Ваша заявка успешно сохранена",
		"USER_MESSAGE_ADD" => "Мы с вами скоро свяжемся",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"IBLOCK_TYPE" => "SYSTEM",
		"IBLOCK_ID" => "4",
		"PROPERTY_CODES" => array(
			0 => "3",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "NAME",
		),
		"GROUPS" => array(
			0 => "2",
		),
		"STATUS" => "ANY",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => "Y",
		"MAX_FILE_SIZE" => "0",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"SEF_MODE" => "N",
		"CUSTOM_TITLE_NAME" => "Ваше имя",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => ""
	),
	false
);
				?>
			</div>
		</div>
	</div>
</div>
</body>

</html>