<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

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
<?
foreach($arResult as $item) {
?>
<tr>
    <th><?=$item['DATE_ACTIVE_FROM']?></th>
    <td><?=$item['NAME']?></td>
    <td><?=$item['TEACHER']?></td>
    <td><?=$item['ROOM']?></td>
</tr>
        
<?
}
?>
        </tbody>
    </table>
</div>