<section class="form-footer position-relative">
	<div class="container ">
		<div class="row">
			<div class="col-12 col-lg-6">
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
							0 => "1",
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
			</div>
			<div class="col-12 col-lg-6 d-none d-lg-block">
				<div class="position-absolute form-footer__box-img" style="background: url('<?= SITE_TEMPLATE_PATH; ?>/images/entry2.png')  no-repeat center / cover;">

				</div>
			</div>
		</div>
	</div>
</section>