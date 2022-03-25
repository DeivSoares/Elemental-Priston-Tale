<!--
	Pacote de scripts para rankings versão 1.0
	Escrito por Ravel
	Disponibilizado para o fórum Priston4Fun (www.priston4fun.com)
	Por favor, respeite os créditos, bom uso =)
-->
<?php
	require "inc/config.inc.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen"> 
		<title>Top 100 Clan SoD</title>
	</head>
	<body>
		
		<?php 
			$dbhost = 'DRIVER={SQL Server};SERVER='.$sqlserver.';DATABASE='.$dbSOD.'';
			$connection = odbc_connect($dbhost, $account, $password);
			$verifica = "SELECT TOP 100 * FROM [ClanDb].[dbo].[CL] MemCnt WHERE ClanName <> '$ClanEquipe' AND Cpoint <> '0' ORDER BY Cpoint DESC";
			echo '<table class="bbc_table" align="center" width="'.$largurasodclan.'"><tr>
			
			<th><center>N°</center></th>
			<th width="34px"><center>Tag</center></th>
			<th><center>Clan</center></th>
			<th><center>Líder</center></th>
			<th><center>Pontos</center></th>
			
			</tr>';
			$rank = odbc_exec($connection, $verifica);
			if($pg == 1 or $pg == 0){
				$i = 1;
				}elseif($pg > 1){
				$i = $ini+1;
			}
			while($dados = odbc_fetch_array($rank))
			{
				
				$img = $dados['MIconCnt'];
				$clan = $dados['ClanName'];
				$lider = $dados['ClanZang'];
				$pontos = $dados['Cpoint'];
				
			
			$id=$i+1;
			echo ($i % 2) ? "<tr>" : "<tr>";
			echo '<td><center>'.$i.'</center></td>';
			echo '<td width="34px"><img src="'.$UrlClanContent.''.$img.'.bmp"></td>';
			echo '<td><center>'.$clan.'</b></center></td>';
			echo '<td><center>'.$lider.'</center></td>';
			echo '<td><center>'.$pontos.'</center></td>';
			echo '</tr>';
			$i++;
			}
			echo '';
			?></body>
			</html>			