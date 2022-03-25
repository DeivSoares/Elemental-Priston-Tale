<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
-->
</style>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="312" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td width="" align="center" class="style5">Posi&ccedil;&atilde;o</td>
    <td width="50" align="center" class="style5">Nick</td>
    <td width="40" align="center" class="style5">Classe</td>
    <td width="33" align="center" class="style5">Level</td>
    <td width="28" align="center" class="style5">BPS</td>
    <td width="44" align="center" class="style5">Mortes</td>
  </tr>
<?php 
	$connect['host'] = "PT\SQLEXPRESS";
	$connect['user'] = "sa";
	$connect['pass'] = "1211196";
	$connect['db'] = "ClanDb";
	
	$connect['string'] = "DRIVER={SQL Server};";
	$connect['string'] .= "SERVER=".$connect['host'].";";
	$connect['string'] .= "DATABASE=".$connect['db'];
		
	try{
		$connect['connection'] = @odbc_connect($connect['string'],$connect['user'],$connect['pass']);
	} catch(Exception $e){
		$connect['connection'] = FALSE;
		echo('Não foi possivel conectar com o SQL!<br>');
		echo('Error: '.$e);			
	}
	
	$query = "SELECT * FROM [ClanDB].[dbo].[BPS]";
	$q = odbc_do($connect['connection'],$query);
	$i = 0;
	while(odbc_fetch_row($q)){
	$i++;
	echo '<tr>';
    echo '<td align="center" width="48"><font color="#ffffff" size="1" face="Arial">'.$i.'</font></td>';
    echo '<td align="center" width="50"><font color="#ffffff" size="1" face="Arial">'.odbc_result($q,"ChName").'</font></td>';
    echo '<td align="center" width="40"><img src="classe/0'.odbc_result($q,"ChType").'.gif"/></td>';
    echo '<td align="center" width="33"><font color="#ffffff" size="1" face="Arial">'.odbc_result($q,"ChLvl").'</font></td>';
    echo '<td align="center" width="28"><font color="#ffffff" size="1" face="Arial">'.odbc_result($q,"BPS").'</font></td>';
    echo '<td align="center" width="44"><font color="#ffffff" size="1" face="Arial">'.odbc_result($q,"Mortes").'</font></td>';
    echo '</tr>';
	}
	if(!$i>0)
	   echo "<tr><td align='center' colspan='6'>Nenhum char encontrado!</td></tr>";	

?>
</table></td>
  </tr>
</table>
