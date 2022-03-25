<? if (DexteR!=1) exit;
$username = $_SESSION["ID"];
?>
<h4 class="title text-left"><span class="fa fa-angle-right"></span> Gold Diário</h4><hr />
<br>
<center>
<br>
<a href="?sess=gold_diario_rankings" target="_self"><input type="submit" value=" Ranking MAX/MIN " class="btn btn-primary"></a>
<a href="?sess=gold_diario" target="_self"><input type="submit" value=" Sistema de Gold Diário " class="btn btn-primary"></a>
<a href="?sess=gold_diario_saques" target="_self"><input type="submit" value=" Gold's Recebidos " class="btn btn-primary"></a>

<br><br></center>
<div class="ucp_divider"></div>
<div class="gold_diario_fundo"></div>   
<div id="changelog">
<div><h5>RANKING DE MáXIMO E MÍNIMO DE GOLD RETIRADO</h5></div><br>
    </table>

<div id="pm_sent" class="pm_spot">
			<table class="nice_table" width="100%" border="1">
	  <tr>
	  <td width="20%" class="text-center">#</td>
        <td width="20%" class="text-center">Nick</td>
        <td width="20%" class="text-center">Ouro Retirado</td>
        <td width="20%" class="text-center">Data/Horário</td>
      </tr>

	  
<?
$query = "SELECT TOP 1* FROM [painel].[dbo].[Gold_Diario] ORDER By Ouro DESC";
$q = odbc_exec($connection, $query);
$zz =0;
while($pm_info = odbc_fetch_array($q)){
$Nick = $pm_info['Nick'];
$Ouro = $pm_info['Ouro'];
$Hora = $pm_info['Hora'];
$Data = $pm_info['Data'];

	$goldkk = $Ouro/10000000;
	$goldkk = number_format($Ouro, 0, ',', '.');


$zz++;
?>

				<tr>
<td>MÁXIMO</td>
<td><? echo $Nick; ?></td>
<td><? echo $goldkk; ?></td>
<td><? echo $Data;?> - <? echo $Hora;?></td>
				</tr>
					
					
					</tr>
					<? }?>
					
					<?
$query = "SELECT TOP 1* FROM [painel].[dbo].[Gold_Diario] ORDER By Ouro ASC";
$q = odbc_exec($connection, $query);
$zz =0;
while($pm_info = odbc_fetch_array($q)){
$Nick = $pm_info['Nick'];
$Ouro = $pm_info['Ouro'];
$Hora = $pm_info['Hora'];
$Data = $pm_info['Data'];

	$goldkk = $Ouro/10000000;
	$goldkk = number_format($Ouro, 0, ',', '.');


$zz++;
?>

				<tr>
<td>M&Iacute;NIMO</td>
<td><? echo $Nick; ?></td>
<td><? echo $goldkk; ?></td>
<td><? echo $Data;?> - <? echo $Hora;?></td>
				</tr>
					
					
					</tr>
					<? }?>
					</table>
		<div style="height:10px;"></div>
		<div id="messages_pagination"></div>
		</div>