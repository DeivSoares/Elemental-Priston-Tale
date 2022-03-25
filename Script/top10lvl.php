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
		<title>Top 10 Level</title>
	</head>
	<body>
		
		<?php 
			$dbhost = 'DRIVER={SQL Server};SERVER='.$sqlserver.';DATABASE=rPTDB';
			$connection = odbc_connect($dbhost, $account, $password);
			$verifica = "SELECT TOP 10 * FROM PVP WHERE CharName != '$player1' and CharName != '$player2' and CharName != '$player3' and CharName != '$player4' and CharName != '$player5' and CharName != '$player6' and CharName != '$player7' and CharName != '$player8' and CharName != '$player9' and CharName != '$player10' and CharName != '$player11' and CharName != '$player12' and CharName != '$player13' and CharName != '$player14' and CharName != '$player15' and CharName != '$player16' and CharName != '$player17' and CharName != '$player18' and CharName != '$player19' and CharName != '$player20' ORDER BY CharLevel DESC";
			echo '<table class="bbc_table" align="center" width="'.$larguratop10lvl.'"><tr>
			
			<th><center><span class="conteudo_t">N°</span></center></th>
			<th><center><span class="conteudo_t"></span></center></th>
			<th><center><span class="conteudo_t">Personagem</span></center></th>
			<th><center><span class="conteudo_t">Level</span></center></th>
			
			</tr>';
			$rank = odbc_exec($connection, $verifica);
			if($pg == 1 or $pg == 0){
				$i = 1;
				}elseif($pg > 1){
				$i = $ini+1;
			}
			while($dados = odbc_fetch_array($rank))
			{
				
				$nome = utf8_encode($dados['CharName']);
				$level = $dados['CharLevel'];
				$classe = $dados['CharClass'];
				$id = $dados['ID'];
				
			
			$id=$i+1;
			echo ($i % 2) ? "<tr>" : "<tr>";
			echo '<td><center><span class="conteudo">'.$i.'</span></center></td>';
			echo '<td><img src="images/spec/'.$classe.'.png" width="22" height="22"></td>';
			echo '<td><center><span class="conteudo">'.$nome.'</span></b></center></td>';
			echo '<td><center><span class="conteudo">'.$level.'</span></center></td>';
			echo '</tr>';
			$i++;
			}
			echo '';
			?></body>
			</html>			