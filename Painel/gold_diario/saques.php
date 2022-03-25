<? if (DexteR!=1) exit;
$username = $_SESSION["ID"];
?>
<h4 class="title text-left"><span class="fa fa-angle-right"></span> Gold Diário</h4><hr />
<br>
<center>
<br>
<a href="?sess=gold_diario_rankings" target="_self"><input type="submit" value=" Ranking MAX/MIN " class="btn btn-primary"></a>
<a href="?sess=gold_diario" target="_self"><input type="submit" value=" Sistema de Gold Di&aacute;rio " class="btn btn-primary"></a>
<a href="?sess=gold_diario_saques" target="_self"><input type="submit" value=" Gold's Recebidos " class="btn btn-primary"></a>

<br><br></center>
<div class="ucp_divider"></div>
<div class="gold_diario_fundo"></div>
		
	   
		
<div id="changelog">
<div><h5>MEUS SAQUES DO GOLD DIÁRIO</h5></div><br>

<div id="pm_sent" class="pm_spot text-center">
			<table class="nice_table" width="100%" border="1">
			<tr>
	  <td width="5%">#</td>
        <td width="20%">Nick</td>
        <td width="20%">Ouro Retirado</td>
        <td width="20%">Data/Horário</td>
      </tr>

	  
<?
$query = "SELECT * FROM [painel].[dbo].[Gold_Diario] WHERE [ID]='$username' ORDER By Data DESC";
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
					<td><? echo $zz; ?></td>
					<td><? echo $Nick; ?></td>
					<td><? echo $goldkk; ?> em ouro</td>
					<td><? echo $Data;?> - <? echo $Hora;?></td>
				</tr>
				<? } if(!$zz){ $zz = 0; ?> <tr style=""> <td colspan="16" height="130" align="center"> <div class="ui-widget"> <div class="ui-state-error ui-corner-all" style="padding:0 .7em"> <p>Nenhum saque foi feito até agora.</p> </div> </div> </td> </tr>  <? } else { ?>
					
					
					</tr>
					<? }?>
					</table>
		<div style="height:10px;"></div>
		<div id="messages_pagination"></div>
		</div>