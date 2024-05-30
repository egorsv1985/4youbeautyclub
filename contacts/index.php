<?
//define('TYPE_PAGE', 'CONTANER');
define('TYPE_PAGE', 'CONTACTS');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты");
$APPLICATION->SetTitle("Контакты");
?>
<section class="py-5 contacts fs-24">
		<div class="row gy-4">
			<div class="col-12 col-lg-4">
				<h1 class="mb-5 fs-70 text-uppercase fw-700">Контакты</h1>
				<div class="d-flex flex-column">
					<h3 class=" text-uppercase">Адрес</h3>
					<p><?=\Victory\Options\CVictoryOptions::getOptionValue('address_' . SITE_ID);?></p>
					<h3 class=" text-uppercase">Режим работы:</h3>
					<p><?=\Victory\Options\CVictoryOptions::getOptionValue('schedule_' . SITE_ID);?></p>
				</div>
				<div class="gap-4 d-flex flex-column">
					<?
					$tel = \Victory\Options\CVictoryOptions::getOptionValue('tel_' . SITE_ID);
					?>
					<a href="tel:<?=str_replace(array(' ', '(', ')', '-'), '', $tel);?>" class="d-block fs-24 text-nowrap ps-5 contacts-phone"><?=$tel;?></a>
					<a href="mailto:<?=\Victory\Options\CVictoryOptions::getOptionValue('mail_' . SITE_ID);?>" class="d-block text-nowrap fs-24 ps-5 contacts-mail"><?=\Victory\Options\CVictoryOptions::getOptionValue('mail_' . SITE_ID);?></a>
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
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>