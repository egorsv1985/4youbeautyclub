<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
?>

<?
define('TYPE_PAGE', 'MAIN');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetTitle("Главная");
?><?
	$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/services-main.php");
	?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/news-main.php");
?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/specialists-main.php");
?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/instruments.php");
?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/products.php");
?>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>