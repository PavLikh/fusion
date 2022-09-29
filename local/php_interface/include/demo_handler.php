<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
CModule::IncludeModule("iblock");

$exams = [
	[
		'subject' => 'Статистика',
		'room' => rand(1, 40),
		'date' => rand(1, 30) . '.01.2023',
		'teacher' => 'Немчинов В.С.'
	],
	[
		'subject' => 'Математика',
		'room' => rand(1, 40),
		'date' => rand(1, 30) . '.01.2023',
		'teacher' => 'Перельман Г.Я.'
	],
	[
		'subject' => 'История',
		'room' => rand(1, 40),
		'date' => rand(1, 30) . '.02.2023',
		'teacher' => 'Платонов С.Ф.'
	],
	[
		'subject' => 'Философия',
		'room' => rand(1, 40),
		'date' => rand(1, 30) . '.02.2023',
		'teacher' => 'Розанов В.В.'
	],
	[
		'subject' => 'Макроэкономика',
		'room' => rand(1, 40),
		'date' => rand(1, 30) . '.02.2023',
		'teacher' => 'Кондратьев Н.Д.'
	],
];

$ibExamList = [
    'NAME' => 'Расписание экзаменов',
    'CODE' => 'exam_schedule',
    'IBLOCK_TYPE_ID'=> 'exams',
    'PROPERTIES' => [
        'ROOM' => ['Аудитотрия', 'N'],
        'TEACHER' => ['Преподаватель', 'S']
    ]
];

if ($_GET['ib'] == 'create'){
    $obBlocktype = new CIBlockType;
    $ob = $obBlocktype->GetById('exams');
    if(!$ob->Fetch()) {

        $arFields = Array(
  	    	'ID'=>'exams',
  	    	'SECTIONS'=>'N',
  	    	'IN_RSS'=>'N',
  	    	'SORT'=>100,
  	    	'LANG'=>Array(
          		'en'=>Array(
            		'NAME'=>'Exams',
          		),
          		'ru'=>Array(
            		'NAME'=>'Экзамены',
           		)
          	)
  	    );
	    $DB->StartTransaction();
	    $res = $obBlocktype->Add($arFields);
	    if(!$res)
	    {
	        $DB->Rollback();
	        // echo 'Error: '.$obBlocktype->LAST_ERROR.'<br>';
	    }
	    else{
	        $DB->Commit();
        }
        $id = ft_creat_ib($ibExamList);
        $prop_id_list = ft_add_ib_props($id, $ibExamList['PROPERTIES']);
        ft_add_els_with_props($id, $exams, $prop_id_list);
    }
}

function ft_creat_ib($data) {
    $ib = new CIBlock;
    $arFields = Array(
        "ACTIVE" => 'Y',
        "NAME" => $data['NAME'],
        "CODE" => $data['CODE'],
        "IBLOCK_TYPE_ID" => $data['IBLOCK_TYPE_ID'],
        "SITE_ID" => 's1',
        "SORT" => 500,
        "GROUP_ID" => array("2" => "R"),
    );
    $ID = $ib->Add($arFields);
    return $ID;
}


function ft_add_ib_props($id, $data) {
    $prop_id_list = [];
	$arr = [
		'ROOM' => ['Аудитотрия', 'N'],
		'TEACHER' => ['Преподаватель', 'S']
	];
	  
	$ibp = new CIBlockProperty;
	foreach ($data as $key => $value) {
		$arFields = Array(
		    "NAME" => $value[0],
		    "ACTIVE" => "Y",
		    "SORT" => 100,
		    "CODE" => $key,
		    "PROPERTY_TYPE" => $value[1],
		    "IBLOCK_ID" => $id
		);
		$PropID = $ibp->Add($arFields);
		$prop_id_list[] = $PropID;
	}
    return $prop_id_list;
}

function ft_add_els_with_props($id, $data, $prop_id_list) {

    $el = new CIBlockElement;
    foreach($data as $value) {
	    $arLoadProductArray = Array(
		    "IBLOCK_SECTION_ID" => false,
		    "IBLOCK_ID"      => $id,
		    "NAME"           => $value['subject'],
		    "ACTIVE"         => "Y",  
		    "ACTIVE_FROM"    => $value['date'],
		    "PROPERTY_VALUES" => Array(
			    $prop_id_list[0] => $value['room'],
			    $prop_id_list[1] => $value['teacher']
		    )
	    );
	    $el->Add($arLoadProductArray);
    }
}

function ft_git_ibid_by_code($code){
    $arrFilter = array(
        'ACTIVE'  => 'Y',
        'CODE'    => $code,
        'SITE_ID' => "s1",
    );

    if ($type) {
        $arrFilter['TYPE'] = $type;
    }
    $arIBlockId = "";
   
    if($code){
        $res = CIBlock::GetList(Array("SORT" => "ASC"), $arrFilter, false);
    

        
        if ($ar_res = $res->Fetch()) {
            $arIBlockId = $ar_res["ID"];
        }
    }
    return $arIBlockId;
}


if ($_GET['ib'] == 'del') {
    $DB->StartTransaction();
    if(!CIBlockType::Delete($ibExamList['IBLOCK_TYPE_ID']))
    {
        $DB->Rollback();
        // echo 'Delete error!';
    }
    $DB->Commit();
}

?>