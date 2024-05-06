<h2 class="fs-58 fw-700">Скидка на первое посещение 10%</h2>
<? $APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form",
	"form-modal",
	array(
		"AJAX_MODE" => 'Y',
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
			0 => "1",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "1",
			1 => "NAME",
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
		"CUSTOM_TITLE_NAME" => "Имя",
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
); ?>