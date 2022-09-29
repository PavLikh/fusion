<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Fusion demo");
?>

	<div class="empty"></div>
	<div class="section">
		<div class="page-title">
			<h1>Test assignment</h1>
		</div>
		<section>
			<div class="container">
				<div class="text">
				<p>На странице представлено демо работы компонентов из задания. При клике на кнопку "создать", будут созданы: тип инфоблоков "Экзамены", инфоблок "Расписание экзаменов" с нужными свойствами и 5 элементов со случаными датами и аудиториями. Результат будет выведен в таблице.</p>
				<p> При клике на "удалить" будут удалены все элементы, инфоблок и тип инфоблока</p>
				</div>
			 	<div class="create_ib">	
			 		<a href='?ib=create' class="btn">Создать</a>
					 <a href='?ib=del' class="btn">Удалить</a>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
<?

$id = ft_git_ibid_by_code($ibExamList['CODE']);
$ibTypeId = $ibExamList['IBLOCK_TYPE_ID'];

$APPLICATION->IncludeComponent(
    "fusion_demo:exam.list",
    "", //template def
    Array(
		"IBLOCK_ID" => $id,
		"IBLOCK_TYPE" => $ibTypeId
    )
);

?>

			</div>
		</section>
		
	</div>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>