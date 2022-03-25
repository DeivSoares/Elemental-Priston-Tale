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
		<title>Lider BC</title>
		<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen"> 
	</head>
	<body>
		
		<?php
			$BLESS = "".$DiretorioFiles."BlessCastle.dat";
			$fOpen = fOpen($BLESS, "r");
			$fRead =fread($fOpen,filesize($BLESS));
			@fclose($fOpen);
			$LiderBles = bin2hex(substr($fRead,0xF0,1));
			$LiderBles2 = bin2hex(substr($fRead,0xF1,1));
			$LiderBles3 = bin2hex(substr($fRead,0xF2,1));
			$LiderBles1 = bin2hex(substr($fRead,0xF3,1));
			
			$PontosBless1 = bin2hex(substr($fRead,0x118,1));
			$PontosBless2 = bin2hex(substr($fRead,0x119,1));
			$PontosBless3 = bin2hex(substr($fRead,0x11A,1));
			$PontosBless4 = bin2hex(substr($fRead,0x11B,1));
			
			$TaxaBless = bin2hex(substr($fRead,0x18,1));
			$Pontos = hexdec("$PontosBless4"."$PontosBless3"."$PontosBless2"."$PontosBless1");
			
			$Lider = hexdec("$LiderBles1"."$LiderBles3"."$LiderBles2"."$LiderBles");
			$TaxaCalc = hexdec("$TaxaBless");
			$dbhost = 'DRIVER={SQL Server};SERVER='.$sqlserver.';DATABASE=ClanDB';
			$string = odbc_connect($dbhost, $account, $password);
			// $Lider = '1000000037';
			// $Pontos = 812569;
			$qr = odbc_exec($string, "SELECT * FROM CL WHERE MIconCnt =$Lider");
			$linhas = odbc_num_rows($qr);
			if($linhas == 0){
				echo '<div align="center"><font color="#796a55" face="Verdana, Arial, Helvetica, sans-serif" size="1"><br></br>Sem nenhum lider</font></div><br></br><br></br>';
			}
			while($dados = odbc_fetch_array($qr)){
				$img = $dados['MIconCnt'];
				$clan2 = $dados['ClanName'];
				$dir_img = "".$UrlClanContent."$img.bmp";
				$nomelider = $dados['ClanZang'];
				$membros = $dados['MemCnt'];
			$imposto = $dados['SiegeMoney'];
			$impostotax = $TaxaCalc;
			$clanpoints = $dados['clanpoints'];
			
			$qrr = odbc_exec($string, "SELECT * FROM ConfigPontos WHERE pontos <='$clanpoints'");
	
			}
			?>
			
			<body bgcolor="transparent">
			
			<tr>
			<td>
			<div id="liderblesscastle" align="center">
			<style type="text/css">
			
            .style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #645e56; font-weight: bold; }
			
			</style>
			<script type="text/javascript">
			window.onload = function()
			{
			var frases = ['<span class="conteudo">Membros: <?php echo $membros;?></span><br>','<span class="conteudo">Pontos: <?=$Pontos?></font>'];
			var timeout = <?php echo $Atualiza?>000;
			var index = 0;
			setInterval(function()
			{
			index = (index == frases.length) ? 0 : index;
			var novaFrase = frases[index];
			var areaFrase = document.getElementById('frase');
			areaFrase.innerHTML = novaFrase;
			index++;
			},
			timeout);
			}
			</script>
			
			<img src="<?php echo $dir_img;?>" width="32" height="32">
			<span class="style4">
			<br>Nome: <?php echo $clan2;?></font>
			<div id="frase"><span class="conteudo">Lider: <?php echo $nomelider?></font></div>
			</b>
			</div>
			</tr>
			</td>
			</body>			