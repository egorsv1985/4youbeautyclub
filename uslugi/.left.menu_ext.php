<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "millcom:menu",
    "",
    Array(
        "IBLOCK_ID" => "1", 
        "DEPTH_LEVEL" => "3", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600" 
    ),
    false,
	Array('HIDE_ICONS' => 'Y')
);
if (!isset($aMenuLinks)) $aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
else $aMenuLinks = $aMenuLinksExt;

?>