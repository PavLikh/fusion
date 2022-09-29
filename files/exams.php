<?

//Подключаем компонент с шаблоном по умолчанию
//Передаем в него id и тип ИБ

$APPLICATION->IncludeComponent(
    "fusion_demo:exam.list",
    "",
    Array(
		"IBLOCK_ID" => $id,
		"IBLOCK_TYPE" => 'exams'
    )
);

?>