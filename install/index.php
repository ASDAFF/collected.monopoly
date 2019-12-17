<?
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class collected_monopoly extends CModule
{
	var $MODULE_ID = "collected.monopoly";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function collected_monopoly()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("SCOM_INSTALL_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("SCOM_INSTALL_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage("SPER_PARTNER");
		$this->PARTNER_URI = GetMessage("PARTNER_URI");
	}


	function InstallDB($install_wizard = true)
	{
		global $DB, $DBType, $APPLICATION;
		RegisterModule("collected.monopoly");
		COption::SetOptionString("collected.monopoly", "wizard_version", "1");
		RegisterModuleDependences("main", "OnBeforeProlog", "collected.monopoly", "RSMonopoly", "ShowPanel");
		
		// set default settings
		COption::SetOptionString('collected.monopoly', 'headType', 'type1');
		COption::SetOptionString('collected.monopoly', 'headStyle', 'style1');
		COption::SetOptionString('collected.monopoly', 'blackMode', 'N');
		COption::SetOptionString('collected.monopoly', 'gencolor', '');
		COption::SetOptionString('collected.monopoly', 'MSFichi', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSCatalog', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSService', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSAboutAndReviews', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSNews', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSPartners', 'Y');
		COption::SetOptionString('collected.monopoly', 'MSGallery', 'Y');
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		global $DB, $DBType, $APPLICATION;

		UnRegisterModule("collected.monopoly");
		UnRegisterModuleDependences("main", "OnBeforeProlog", "collected.monopoly", "RSMonopoly", "ShowPanel");

		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		COption::RemoveOption("collected.monopoly");
		return true;
	}

	function InstallFiles()
	{
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.monopoly/install/modules", $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.monopoly/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		//CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.monopoly/install/wizards/bitrix/eshop.mobile", $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/bitrix/eshop.mobile", true, true);
		//CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.monopoly/install/images",  $_SERVER["DOCUMENT_ROOT"]."/bitrix/images/collected.monopoly", true, true);
	
		return true;
	}

	function InstallPublic()
	{
	}

	function UnInstallFiles()
	{
		//DeleteDirFilesEx("/bitrix/images/collected.monopoly/");//images
		return true;
	}

	function DoInstall()
	{
		global $APPLICATION, $step;

		$this->InstallFiles();
		$this->InstallDB(false);
		$this->InstallEvents();
		$this->InstallPublic();
		return true;
	}

	function DoUninstall()
	{
		global $APPLICATION, $step;

		$this->UnInstallDB();
		$this->UnInstallFiles();
		$this->UnInstallEvents();
		return true;
	}
}
?>