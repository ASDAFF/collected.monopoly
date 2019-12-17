<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!\Bitrix\Main\Loader::includeModule('collected.monopoly'))
	return;

$arParams['HEAD_TYPE'] = RSMonopoly::getSettings('headType', 'type1');
$arParams['FILTER_TYPE'] = RSMonopoly::getSettings('filterType', 'ftype1');
$arParams['USE_FILTER'] = ( $arParams['FILTER_TYPE']!='ftype0' ? 'Y' : 'N' );

// have sidebar?
$arResult['SIDEBAR'] = 'N';
if( $arParams["HEAD_TYPE"]=='type3' || $arParams['FILTER_TYPE']=='ftype1' ){
	$arResult['SIDEBAR'] = 'Y';
}
// /have sidebar?

$arParams['TEMPLATE_AJAX_ID'] = 'js-ajaxcatalog';