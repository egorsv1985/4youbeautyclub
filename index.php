<?
define('TYPE_PAGE', 'MAIN');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetTitle("Главная");
?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/services-main.php");
?>
<?
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "includes/news-main.php");
?>

 
 <?
		require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
		?>