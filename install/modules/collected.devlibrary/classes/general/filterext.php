<?
/**
 * Copyright (c) 17/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

/************************************
*
* Universal Extension for Filter
* v1.0.1
* last update 16.01.2015
*
************************************/

IncludeModuleLangFile(__FILE__);

class RSDevLibFilterExtension extends RSDevLib
{
	public static function GetTo4round($number) {
		if($number<=100)
		{
			return 1;
		} elseif($number<=250)
		{
			return 100;
		} elseif($number<=500)
		{
			return 250;
		} elseif($number<=1000)
		{
			return 500;
		} elseif($number<=2500)
		{
			return 1000;
		} elseif($number<=5000)
		{
			return 2500;
		} elseif($number<=10000)
		{
			return 5000;
		} elseif($number<=25000)
		{
			return 10000;
		} elseif($number<=50000)
		{
			return 25000;
		} elseif($number<=100000)
		{
			return 50000;
		} elseif($number<=250000)
		{
			return 100000;
		} elseif($number<=500000)
		{
			return 250000;
		} elseif($number<=750000)
		{
			return 500000;
		} elseif($number<=1000000)
		{
			return 750000;
		} elseif($number<=1250000)
		{
			return 1000000;
		} elseif($number<=1500000)
		{
			return 1250000;
		} elseif($number<=1750000)
		{
			return 1500000;
		} elseif($number<=10000000)
		{
			return 1750000;
		} else {
			return 10000000;
		}
	}
	
	public static function RoundCustom($number,$to,$direction="simple") {
		if($direction=="simple") {
			$i = round($number/$to,0)*$to;
			return $i>0 ? $i : $to;
		} elseif($direction=="big") {
			$i = round(ceil($number/$to),0)*$to;
			return $i>0 ? $i : $to;
		} elseif($direction=="small") {
			$i = round(floor($number/$to),0)*$to;
			return $i>0 ? $i : $to;
		}
	}
}