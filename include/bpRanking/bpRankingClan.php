<table width="625" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="88">Posi&ccedil;&atilde;o</td>
    <td align="left" width="134">Nome</td>
    <td align="center" width="99">Lider</td>
    <td align="center" width="86">Membros</td>
    <td align="center" width="87">Total de BPs</td>
    <td align="center" width="131">Total de Mortes</td>
  </tr>
<?php
	$ip_iis				= "51.222.17.94";
	$connect['host'] 	= "PTL\SQLEXPRESS";
	$connect['user']	= "sa";
	$connect['pass']	= "#$pdl32xq";
	$connect['db']		= "ClanDb";
	$connect['string']	= "DRIVER={SQL Server};";
	$connect['string'] .= "SERVER=".$connect['host'].";";
	$connect['string'] .= "DATABASE=".$connect['db'];

	try{
		$connect['connection'] = @odbc_connect($connect['string'],$connect['user'],$connect['pass']);
	} catch(Exception $e){
		$connect['connection'] = FALSE;
		echo('Não foi possivel conectar com o SQL!<br>');
		echo('Error: '.$e);
	}

	$query_cl = "SELECT * FROM [ServerDB].[dbo].[PVP]";
	$q_cl = odbc_do($connect['connection'],$query_cl);
	$i = 0;
	while(odbc_fetch_row($q_cl)){
		$i++;
		$bps_clan = 0;
		$mortes_clan = 0;
		$query_ul = "SELECT * FROM [ServerDB].[dbo].[PVP] WHERE [ClanName]='".odbc_result($q_cl,'ClanName')."'";
		$q_ul = odbc_do($connect['connection'],$query_ul);
		while(odbc_fetch_row($q_ul)){
			$query_bps = "SELECT * FROM [ServerDB].[dbo].[PVP] WHERE [ChName] = '".odbc_result($q_ul,'ChName')."'";
			$q_bps = odbc_do($connect['connection'],$query_bps);
			$bps_clan += odbc_result($q_bps,'BPS');
			$mortes_clan += odbc_result($q_bps, 'Mortes');
		}
		echo '<tr>';
		echo '<td align="center" width="88">'.$i.'</td>';
		echo '<td align="left" width="134"><img src="http://'.$ip_iis."/ClanContent/".odbc_result($q_cl,"MIconCnt").'.bmp"/>'.odbc_result($q_cl,"ClanName").'</td>';
   		echo '<td align="center" width="99">'.odbc_result($q_cl,'ClanZang').'</td>';
   		echo '<td align="center" width="86">'.odbc_result($q_cl,'MemCnt').'</td>';
  		echo '<td align="center" width="87">'.$bps_clan.'</td>';
  		echo '<td align="center" width="131">'.$mortes_clan.'</td>';
   		echo '</tr>';
	}
?>
</table>
