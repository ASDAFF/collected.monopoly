<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('collected.monopoly'))
	return;
if(!CModule::IncludeModule('collected.devlibrary'))
	return;

$listProp = RSDevLibParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arTemplateParameters = array(
	'RSMONOPOLY_BANNER_TYPE' => array(
		'NAME' => GetMessage('RSMONOPOLY_BANNER_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_LINK' => array(
		'NAME' => GetMessage('RSMONOPOLY_LINK'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_BLANK' => array(
		'NAME' => GetMessage('RSMONOPOLY_BLANK'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_TEXT_1' => array(
		'NAME' => GetMessage('RSMONOPOLY_TEXT_1'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_TEXT_2' => array(
		'NAME' => GetMessage('RSMONOPOLY_TEXT_2'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_PRICE' => array(
		'NAME' => GetMessage('RSMONOPOLY_PRICE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_BANNER_VIDEO_MP4' => array(
		'NAME' => GetMessage('RSMONOPOLY_BANNER_VIDEO_MP4'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
	'RSMONOPOLY_BANNER_VIDEO_WEBM' => array(
		'NAME' => GetMessage('RSMONOPOLY_BANNER_VIDEO_WEBM'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
);

RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('owlSettings'));