<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('collected.devlibrary'))
	return;

$arTemplateParameters = array(
	'FOOTER_MENU_TITLE' => array(
		'NAME' => GetMessage('FOOTER_MENU_TITLE'),
		'TYPE' => 'TEXT',
		'DEFAULT' => GetMessage('FOOTER_MENU_TITLE_EXAMPLE'),
	)
);