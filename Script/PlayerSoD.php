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
		<title>Top 100 Player SoD</title>
	</head>
	<body>
		
		<?php 
			$dbhost = 'DRIVER={SQL Server};SERVER='.$sqlserver.';DATABASE='.$dbSOD.'';
			$connection = odbc_connect($dbhost, $account, $password);
			$verifica = "SELECT * FROM SOD2RecBySandurr CharName WHERE Point > '0' ORDER BY Point DESC";
			echo '<table class="bbc_table" align="center" width="'.$largurasodplayer.'"><tr>
			
			<th><center>N°</center></th>
			<th width="34px"><center>Classe</center></th>
			<th><center>Personagem</center></th>
			<th><center>Nível</center></th>
			<th><center>Pontos</center></th>
			<th><center>Mortos</center></th>
			
			</tr>';
			$rank = odbc_exec($connection, $verifica);
			if($pg == 1 or $pg == 0){
				$i = 1;
				}elseif($pg > 1){
				$i = $ini+1;
			}
			while($dados = odbc_fetch_array($rank))
			{
				
				$classeid = $dados['CharType'];
				$char = $dados['CharName'];
				$level = $dados['GLevel'];
				$pontos = $dados['Point'];
				$mortos = $dados['KillCount'];
				
				switch ($classeid)
                {
                    case 1: $classe = 'Mecanico'; break;
                    case 2: $classe = 'Lutador'; break;
                    case 3: $classe = 'Pikeman'; break;
                    case 4: $classe = 'Arqueira'; break;
                    case 5: $classe = 'Mago'; break;
                    case 6: $classe = 'Cavaleiro'; break;
                    case 7: $classe = 'Atalanta'; break;
                    case 8: $classe = 'Sacerdotiza'; break;
					case 9: $classe = 'Shaman'; break;
					case 11: $classe = 'Assasina'; break;
				}
				
				
				$id=$i+1;
				echo ($i % 2) ? "<tr>" : "<tr>";
				echo '<td><center>'.$i.'</center></td>';
				echo '<td width="34px"><img src="images/spec/'.$classe.'.png"></td>';
				echo '<td><center>'.$char.'</b></center></td>';
				echo '<td><center>'.$level.'</center></td>';
				echo '<td><center>'.$pontos.'</center></td>';
				echo '<td><center>'.$mortos.'</center></td>';
				echo '</tr>';
				$i++;
			}
			echo '';
		?></body>
</html>			