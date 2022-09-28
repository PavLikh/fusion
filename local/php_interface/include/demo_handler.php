<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?php

$exams = [
	[
		'subject' => 'Статистика',
		'room' => rand(1, 40),
		'date' => '16.01.2023',
		'teacher' => 'Немчинов В.С.'
	],
	[
		'subject' => 'Математика',
		'room' => rand(1, 40),
		'date' => '28.01.2023',
		'teacher' => 'Перельман Г.Я.'
	],
	[
		'subject' => 'История',
		'room' => rand(1, 40),
		'date' => '07.02.2023',
		'teacher' => 'Платонов С.Ф.'
	],
	[
		'subject' => 'Философия',
		'room' => rand(1, 40),
		'date' => '03.02.2023',
		'teacher' => 'Розанов В.В.'
	],
	[
		'subject' => 'Макроэкономика',
		'room' => rand(1, 40),
		'date' => '16.02.2023',
		'teacher' => 'Кондратьев Н.Д.'
	],
];

CModule::IncludeModule("iblock");

if ($_GET['ib'] == 'create'){
    $obBlocktype = new CIBlockType;
    $ob = $obBlocktype->GetById('exams');
    echo '<pre>';
    var_dump($ob);
    echo '</pre>';
    echo '<pre>';
    echo "------------------<br>";
    // var_dump($ob->Fetch());
    echo '</pre>';
    if(!$ob->Fetch()) {
        echo 'GET in if';
        // ft_creat_ib_type();
        // $id = ft_creat_ib();
        // ft_add_ib_props($id);
        // ft_add_els_with_props($id, $data);

    // }
// }

// function ft_creat_ib_type() {
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
    // $obBlocktype = new CIBlockType;
	$DB->StartTransaction();
	$res = $obBlocktype->Add($arFields);
	if(!$res)
	{
	    $DB->Rollback();
	    // echo 'Error: '.$obBlocktype->LAST_ERROR.'<br>';
	}
	else
	    $DB->Commit();

        $id = ft_creat_ib();
        ft_add_ib_props($id);
        ft_add_els_with_props($id, $data);
    }
}

function ft_creat_ib() {
    $ib = new CIBlock;
    $arFields = Array(
        "ACTIVE" => 'Y',
        "NAME" => 'Расписание экзаменов',
        "CODE" => 'exam_schedule',
        "IBLOCK_TYPE_ID" => 'exams',
        "SITE_ID" => 's1',
        "SORT" => 500,
        "GROUP_ID" => array("2" => "R"),
    );
    $ID = $ib->Add($arFields);
    return $ID;
}


function ft_add_ib_props($id) {
    $prop_id_list = [];
	$arr = [
		'ROOM' => ['Аудитотрия', 'N'],
		'TEACHER' => ['Преподаватель', 'S']
	];
	  
	$ibp = new CIBlockProperty;
	foreach ($arr as $key => $value) {
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



function ft_add_els_with_props($id, $data) {
    $el = new CIBlockElement;
    foreach($data as $value) {
	    $arLoadProductArray = Array(
		    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
		    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
		    "IBLOCK_ID"      => $id,
		    "NAME"           => $value['subject'],
		    "ACTIVE"         => "Y",            // активен
		    "ACTIVE_FROM"    => $value['date'],
		    "PROPERTY_VALUES" => Array(
			    $prop_id_list[0] => $value['room'],
			    $prop_id_list[1] => $value['teacher']
		    )
	    );
	    $el->Add($arLoadProductArray);
    }
}

if ($_GET['ib'] == 'del') {
    echo 'delete';
    $DB->StartTransaction();
    if(!CIBlockType::Delete('exams'))
    {
        $DB->Rollback();
        echo 'Delete error!';
    }
    $DB->Commit();
}

?>