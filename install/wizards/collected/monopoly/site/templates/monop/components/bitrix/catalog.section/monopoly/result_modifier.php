<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('collected.devlibrary'))
	return;
if(!CModule::IncludeModule('collected.monopoly'))
	return;

if(!is_array($arResult['ITEMS']) || count($arResult['ITEMS'])<1)
	return;

$arResult['TEMPLATE_DEFAULT'] = array(
	'TEMPLATE' => 'showcase',
	'CSS' => 'showcase',
);
if( $arParams['RSMONOPOLY_TEMPLATE']=='list' ) {
	$arResult['TEMPLATE_DEFAULT'] = array(
		'TEMPLATE' => 'list',
		'CSS' => 'list',
	);
} elseif( $arParams['RSMONOPOLY_TEMPLATE']=='list_little' ) {
	$arResult['TEMPLATE_DEFAULT'] = array(
		'TEMPLATE' => 'list',
		'CSS' => 'list little',
	);
}

$max_width_size = 300;
$max_height_size = 300;
$params = array(
	'PROP_MORE_PHOTO' => $arParams['RSMONOPOLY_PROP_MORE_PHOTO'],
	'MAX_WIDTH' => $max_width_size,
	'MAX_HEIGHT' => $max_height_size,
);
// get other data
RSDevLib::GetDataForProductItem($arResult['ITEMS'],$params);
// /get other data

// get monopoly data
$params = array(
	'RSMONOPOLY_PROP_PRICE' => $arParams['RSMONOPOLY_PROP_PRICE'],
	'RSMONOPOLY_PROP_DISCOUNT' => $arParams['RSMONOPOLY_PROP_DISCOUNT'],
	'RSMONOPOLY_PROP_CURRENCY' => $arParams['RSMONOPOLY_PROP_CURRENCY'],
	'RSMONOPOLY_PROP_PRICE_DECIMALS' => $arParams['RSMONOPOLY_PROP_PRICE_DECIMALS'],
);
RSMonopoly::addData($arResult['ITEMS'],$params);
// /get monopoly data

// get no photo
$arResult['NO_PHOTO'] = RSDevLib::GetNoPhoto(array('MAX_WIDTH'=>$max_width_size,'MAX_HEIGHT'=>$max_height_size));
// /get no photo