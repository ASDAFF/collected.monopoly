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
	'RSMONOPOLY_PROP_FILE' => array(
		'NAME' => GetMessage('RS.MONOPOLY.PROP_FILE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
);

RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('blockName','owlSupport'));
if( $arCurrentValues['RSMONOPOLY_USE_OWL']=='Y' ) {
	RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('owlSettings'));
} else {
	RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('bootstrapCols'));
}