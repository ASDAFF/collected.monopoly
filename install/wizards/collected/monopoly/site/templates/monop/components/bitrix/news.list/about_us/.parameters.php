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
	'RSMONOPOLY_PROP_PUBLISHER_NAME' => array(
		'NAME' => GetMessage('RS.MONOPOLY.PROP_PUBLISHER_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSMONOPOLY_PROP_PUBLISHER_BLANK' => array(
		'NAME' => GetMessage('RS.MONOPOLY.PROP_PUBLISHER_BLANK'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
	'RSMONOPOLY_PROP_PUBLISHER_DESCR' => array(
		'NAME' => GetMessage('RS.MONOPOLY.PROP_PUBLISHER_DESCR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
);

RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('blockName','owlSupport'));
if( $arCurrentValues['RSMONOPOLY_USE_OWL']=='Y' ) {
	RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('owlSettings'));
} else {
	RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('bootstrapCols'));
}