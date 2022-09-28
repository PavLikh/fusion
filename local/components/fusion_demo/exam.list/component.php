<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("iblock");
// echo '<pre>';
// echo 'Component.$arParams:<br>';
// print_r($arParams);
// echo '</pre>';

$arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);

if($arParams['IBLOCK_ID']) {

    $arSelect = Array(
        "DATE_ACTIVE_FROM",
        "NAME",
        "PROPERTY_TEACHER",
        "PROPERTY_ROOM"
    );

// $arSelect = Array();

    $arFilter = Array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        'SITE_ID' => "s1",
        "SECTION_ID" => $arParams['IBLOCK_TYPE'],
        "ACTIVE"=>"Y",
    );

    $arPaginator = Array("nPageSize"=>10);

    $arSort = Array('DATE_ACTIVE_FROM' => 'ASC');

    $res = CIBlockElement::GetList($arSort, $arFilter, false, $arPaginator, $arSelect);

    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        // echo '<pre>';
        // print_r($arFields);
        // echo '</pre>';
    
        $arResult[] = [
            'DATE_ACTIVE_FROM' => $arFields['DATE_ACTIVE_FROM'],
            'NAME' => $arFields['NAME'],
            'TEACHER' => $arFields['PROPERTY_TEACHER_VALUE'],
            'ROOM' => $arFields['PROPERTY_ROOM_VALUE']
        ]; 
    }

    $this->includeComponentTemplate();
}
?>