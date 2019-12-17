<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

$arComponentDescription = array(
	'NAME' => GetMessage('RS.MONOPOLY.WIDGET_SETTINGS.NAME'),
	'DESCRIPTION' => GetMessage('RS.MONOPOLY.WIDGET_SETTINGS.DESCRIPTION'),
	'ICON' => '',
	'PATH' => array(
		'ID' => 'collect_com',
		'SORT' => 2000,
		'NAME' => GetMessage('RS.MONOPOLY.WIDGET_SETTINGS.PATH_NAME_COLLECTED'),
		'CHILD' => array(
			'ID' => 'monopoly',
			'NAME' => GetMessage('RS.MONOPOLY.WIDGET_SETTINGS.NAMEPATH_NAME_MONOPOLY'),
			'SORT' => 8000,
		),
	),
);