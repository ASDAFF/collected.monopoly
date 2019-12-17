<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
	die();
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(IsModuleInstalled('collected.monopoly')){

	COption::SetOptionString('collected.monopoly', 'headType', 'type1' );
	COption::SetOptionString('collected.monopoly', 'headStyle', 'style1' );
	COption::SetOptionString('collected.monopoly', 'filterType', 'ftype1' );
	COption::SetOptionString('collected.monopoly', 'sidebarPos', 'pos1' );
	
	COption::SetOptionString('collected.monopoly', 'MSFichi', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSCatalog', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSService', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSAboutAndReviews', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSNews', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSPartners', 'Y' );
	COption::SetOptionString('collected.monopoly', 'MSGallery', 'Y' );

}