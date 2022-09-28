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
				<div class="shedule">
				<table>
  					<thead>
    					<tr>
      						<th>Дата</th>
      						<th>Предмет</th>
      						<th>Пеподаватель</th>
      						<th>Аудитория</th>
    					</tr>
  					</thead>
  					<tbody>
    					<tr>
      						<th>12.10.2022</th>
      						<td>Статистика45</td>
      						<td>Немчинов В.С.</td>
      						<td>203</td>
    					</tr>
    					<tr>
      						<th>12.10.2022</th>
      						<td>Математика</td>
      						<td>Перельман Г.Я.</td>
      						<td>101</td>
    					</tr>
   						<tr>
      						<th>15.10.2022</th>
      						<td>История</td>
      						<td>Платонов С.Ф.</td>
      						<td>102</td>
    					</tr>
    					<tr>
      						<th>15.10.2022</th>
      						<td>История</td>
      						<td>Платонов С.Ф.</td>
      						<td>102</td>
    					</tr>
    					<tr>
      						<th>15.10.2022</th>
      						<td>История</td>
      						<td>Платонов С.Ф.</td>
      						<td>102</td>
    					</tr>
  					</tbody>
				</table>
			
				</div>
			</div>
		</section>

		</div>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>