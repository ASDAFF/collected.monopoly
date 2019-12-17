<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('collected.devlibrary'))
	return;
if(!CModule::IncludeModule('collected.monopoly'))
	return;

if(!empty($arResult)) {
	$params = array(
		'PROP_MORE_PHOTO' => $arParams['RSMONOPOLY_PROP_MORE_PHOTO'],
		'MAX_WIDTH' => 120,
		'MAX_HEIGHT' => 120,
		'PAGE' => 'detail',
	);
	$arItems = array(0 => &$arResult);
	RSDevLib::GetDataForProductItem($arItems,$params);

	// get monopoly data
	$params = array(
		'RSMONOPOLY_PROP_PRICE' => $arParams['RSMONOPOLY_PROP_PRICE'],
		'RSMONOPOLY_PROP_DISCOUNT' => $arParams['RSMONOPOLY_PROP_DISCOUNT'],
		'RSMONOPOLY_PROP_CURRENCY' => $arParams['RSMONOPOLY_PROP_CURRENCY'],
		'RSMONOPOLY_PROP_PRICE_DECIMALS' => $arParams['RSMONOPOLY_PROP_PRICE_DECIMALS'],
	);
	RSMonopoly::addData($arItems,$params);
	// /get monopoly data
}

// get no photo
$arResult['NO_PHOTO'] = RSDevLib::GetNoPhoto(array('MAX_WIDTH'=>$max_width_size,'MAX_HEIGHT'=>$max_height_size));
// /get no photo