<?if (PT!=1) exit;?>
<div class="notice notice-info">
Punidos do Servidor
</div>
<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
<thead>
<tr><th>ID do Player</th><th>Motivo</th><th>Punição</th><th>Data Ban</th><th>GM</th></tr>
</thead>
<tbody>
<tr>
<?
				//Verificando se Existe essa ID
				$connection = odbc_connect( $connection_string, $user, $pass );
                $query = "SELECT * FROM [ADM].[dbo].[LogsBan] ORDER BY data DESC";
                $q = odbc_exec($connection, $query);
				$qt = odbc_do($connection, $query);
                $i = 0;
                while(odbc_fetch_row($qt)) {
				$farr = odbc_fetch_array($q);
				$idplayer=$farr[idplayer];
				$motivo=$farr[motivo];
				$punicao=$farr[punicao];
				$diaban=$farr[diaban];
				$mesban=$farr[mesban];
				$anoban=$farr[anoban];
				$diadesban=$farr[diadesban];
				$mesdesban=$farr[mesdesban];
				$anodesban=$farr[anodesban];
				$gm=$farr[gm];

?>
</tr>
<tr>
<td><? echo $idplayer; ?></td>
<td><? echo $motivo; ?></td>
<td><? echo $punicao; ?></td>
<td><? echo "$diaban/$mesban/$anoban"; ?></td>
<td><? echo $gm; ?></td>
</tr>
<? } ?>
</table>

