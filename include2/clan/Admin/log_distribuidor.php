<? if (PT!=1) exit; ?>
<?php
include_once "incluir/configura.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar com o SQL Server");

?>
<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
<thead>
<tr><th class="posição">GM</th><th class="nickname">Item</th><th>Char</th><th>Data</th><th>ID Char</th></tr>
</thead>
<tbody>
<tr>
<?
				//Verificando se Existe essa ID
                $query = "SELECT * FROM [ADM].[dbo].[LogsDistribuidor] ORDER BY data DESC";
                $q = odbc_exec($connection, $query);
				$qt = odbc_do($connection, $query);
                $i = 0;
                while(odbc_fetch_row($qt)) {
				$farr = odbc_fetch_array($q);
				$nickGM=$farr[idGM];
				$item=$farr[item];
				$nick=$farr[nick];
				$data=$farr[data];
				$id=$farr[id];
?>

<tr>
<td align="center"><? echo $nickGM; ?>&nbsp;</td>
<td align="center"><? echo $item; ?>&nbsp;</td>
<td align="center"><? echo $nick; ?>&nbsp;</td>
<td align="center"><? echo $data ?>&nbsp;</td>
<td align="center"><? echo $id; ?>&nbsp;</td>
</tr>
<? } ?>
</table>

