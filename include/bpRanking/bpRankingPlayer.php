<table width="312" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td align="center" width="48">Posi&ccedil;&atilde;o</td>
    <td align="center" width="50">Nick</td>
    <td align="center" width="40">Classe</td>
    <td align="center" width="33">Level</td>
    <td align="center" width="28">BPS</td>
    <td align="center" width="44">Mortes</td>
  </tr>
<?php 
	$connect['host'] = "PTL\SQLEXPRESS";
	$connect['user'] = "sa";
	$connect['pass'] = "#$pdl32xq";
	$connect['db'] = "ServerDB";
	
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
	
	$query = "SELECT * FROM [ServerDB].[dbo].[PVP] ORDER BY BPS DESC";
	$q = odbc_do($connect['connection'],$query);
	$i = 0;
	while(odbc_fetch_row($q)){
	$i++;
	echo '<tr>';
    echo '<td align="center" width="48">'.$i.'</td>';
    echo '<td align="center" width="50">'.odbc_result($q,"ChName").'</td>';
    echo '<td align="center" width="40"><img src="classe/0'.odbc_result($q,"ChType").'.gif"/></td>';
    echo '<td align="center" width="33">'.odbc_result($q,"ChLvl").'</td>';
    echo '<td align="center" width="28">'.odbc_result($q,"BPS").'</td>';
    echo '<td align="center" width="44">'.odbc_result($q,"Mortes").'</td>';
    echo '</tr>';
	}
	if(!$i>0)
	   echo "<tr><td align='center' colspan='6'>Nenhum char encontrado!</td></tr>";	

?>
</table>
