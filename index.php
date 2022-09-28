<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?>

	<div class="empty"></div>
	<div class="section">
		<div class="page-title">
			<h1>Test assignment</h1>
		</div>
		<section>
			<div class="container">
			<!-- <div class="form"></div>
    			<form action="/" method="post">
	    			<div class="form-group">
	    				<label for="text">Введите длину массива:</label>
		    			<input type="text" name="text" placeholder="Привет" id="text" class="form-control">
	    			</div>
	    			<button type="submit" class="btn btn-success" id="submit">Отправить</button>
				</form>
			 -->
			 	<div class="create_ib">	
			 		<a href='?ib=create' class="btn">Создать</a>
					 <a href='?ib=del' class="btn">Удалить</a>
					<!-- <button class="btn">Удалить</button> -->
					<!-- <button class="btn">Удалить</button> -->
				</div>
			</div>
		</section>

		<section>
			<div class="container">
<?

// echo '$ID = ' . $ID . '<br>';
// echo '$id = ' . $id . '<br>';

$id = ft_git_ibid_by_code($ibExamList['CODE']);
$ibTypeId = $ibExamList['IBLOCK_TYPE_ID'];
// $code = $ibExamList['CODE'];
// echo 'ID fo IB: ' . $id . '<br>';

$APPLICATION->IncludeComponent(
    "fusion_demo:exam.list",
    "", //template def
    Array(
		// "IBLOCK_ID" => 30,
		"IBLOCK_ID" => $id,
		// "CODE" => $code,
		//"IBLOCKS" => "5",
		"IBLOCK_TYPE" => $ibTypeId
      	//'NAME'      => 'Hello world',
	  	// "SORT_BY1" => "ACTIVE_FROM",
		// "SORT_ORDER1" => "ASC",
    )
);

?>

			</div>
		</section>
		
	</div>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>