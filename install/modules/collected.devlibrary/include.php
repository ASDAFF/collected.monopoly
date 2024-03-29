<?
/**
 * Copyright (c) 16/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

global $DBType,$DB,$MESS,$APPLICATION;
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
    'collected.devlibrary',
    array(
        'RSDevLib' => 'classes/general/main.php',
        'RSDevLibOffersExtension' => 'classes/general/offersext.php',
        'RSDevLibFilterExtension' => 'classes/general/filterext.php',
        'RSDevLibResultModifier' => 'classes/general/result_modifier.php',
        'RSDevLibParameters' => 'classes/general/parameters.php',
        'RSColor' => 'classes/general/color.php',
    )
);

$pathJS = '/bitrix/js/collected.devlibrary';

$arJSCoreConfig = array(
    'rs_core' => array(
        'js' => $pathJS.'/core.js',
    ),
    'rs_color' => array(
        'js' => $pathJS.'/color.js',
        'rel' => array('rs_core'),
    ),
);

foreach ($arJSCoreConfig as $ext => $arExt) {
    CJSCore::RegisterExt($ext, $arExt);
}

function RSDF_EasyAdd2Basket($productID,$quantity,$arParams)
{
    $ret = false;
    $productID = IntVal($productID);
    
    if($productID>0 && \Bitrix\Main\Loader::includeModule('sale') && \Bitrix\Main\Loader::includeModule('catalog'))
    {
        $QUANTITY = 0;
        $product_properties = array();
        $arRewriteFields = array();
        $intProductIBlockID = IntVal(CIBlockElement::GetIBlockByID($productID));
        $successfulAdd = true;
        
        if($intProductIBlockID>0)
        {
            // PROPERTIES
            if($arParams['ADD_PROPERTIES_TO_BASKET']=='Y')
            {
                if($intProductIBlockID == $arParams["IBLOCK_ID"])
                {
                    if(!empty($arParams["PRODUCT_PROPERTIES"]))
                    {
                        $product_properties = CIBlockPriceTools::CheckProductProperties(
                            $arParams["IBLOCK_ID"],
                            $productID,
                            $arParams["PRODUCT_PROPERTIES"],
                            $arParams["PRODUCT_PROPERTIES"],//$_REQUEST[$arParams["PRODUCT_PROPS_VARIABLE"]],
                            $arParams['PARTIAL_PRODUCT_PROPERTIES'] == 'Y'
                        );
                        if(!is_array($product_properties))
                        {
                            $product_properties = array();
                        }
                    }
                } else {
                    //$skuAddProps = (isset($_REQUEST['basket_props']) && !empty($_REQUEST['basket_props']) ? $_REQUEST['basket_props'] : '');
                    if (!empty($arParams["OFFERS_CART_PROPERTIES"]))
                    {
                        $product_properties = CIBlockPriceTools::GetOfferProperties(
                            $productID,
                            $arParams["IBLOCK_ID"],
                            $arParams["OFFERS_CART_PROPERTIES"]//,
                            //$skuAddProps
                        );
                    }
                }
            }
            
            // QUANTITY
            if($arParams["USE_PRODUCT_QUANTITY"])
            {
                if(IntVal($quantity)>0)
                {
                    $QUANTITY = doubleval($quantity);
                }
            }
            if(0 >= $QUANTITY)
            {
                $rsRatios = CCatalogMeasureRatio::getList(
                    array(),
                    array('PRODUCT_ID' => $productID),
                    false,
                    false,
                    array('PRODUCT_ID', 'RATIO')
                );
                if ($arRatio = $rsRatios->Fetch())
                {
                    $intRatio = IntVal($arRatio['RATIO']);
                    $dblRatio = doubleval($arRatio['RATIO']);
                    $QUANTITY = ($dblRatio > $intRatio ? $dblRatio : $intRatio);
                }
            }
            if (0 >= $QUANTITY)
                $QUANTITY = 1;
        } else {
            $strError = 'CATALOG_ELEMENT_NOT_FOUND';
            $successfulAdd = false;
        }
        
        if($successfulAdd)
        {
            if(!Add2BasketByProductID($productID,$QUANTITY,$arRewriteFields,$product_properties))
            {
                if($ex = $APPLICATION->GetException())
                    $strError = $ex->GetString();
                else
                    $strError = 'CATALOG_ERROR2BASKET';
                $successfulAdd = false;
            } else {
                $ret = true;
            }
        }
    }
    
    return $ret;
}