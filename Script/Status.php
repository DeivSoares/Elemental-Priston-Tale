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
		<title>Status do Servidor</title>
		<script language="JavaScript" type="text/JavaScript">
			<!--
			function MM_reloadPage(init) {  //reloads the window if Nav4 resized
				if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
				document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
				else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
			}
			MM_reloadPage(true);
			//-->
		</script>
	</head>
	
	<body>
		<div ><?php
			$server['host'] = ""142.4.222.253."";
			$server['port'] = ""12001"";
			$connection = @fsockopen($server['host'], $server['port'], $ERROR_NO, $ERROR_STR, (float)1.5); 
			if($connection)
			{
				fclose($connection);
				echo "<font color='#188940'>Online</font>";
				
			}
			else
			{
				echo "<font color='#bc3232'>Em Manutenção</font>";
			}
		?>
		</div>
	</body>
</html>
