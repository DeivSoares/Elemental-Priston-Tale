<!--
	Pacote de scripts para rankings versão 1.0
	Escrito por Ravel
	Disponibilizado para o fórum Priston4Fun (www.priston4fun.com)
	Por favor, respeite os créditos, bom uso =)
-->
<?PHP
	require "inc/config.inc.php";
	$dbhost = 'DRIVER={SQL Server};SERVER='.$sqlserver.';DATABASE='.$dbSOD.'';
	$string = odbc_connect($dbhost, $account, $password);
	$qr = odbc_exec($string, "SELECT TOP 1 * FROM [ClanDB].[dbo].[CL] ORDER BY Cpoint DESC");
	$linhas = odbc_num_rows($qr);
	if($linhas == 0){
		echo '<div align="center"><font color="#796a55" face="Verdana, Arial, Helvetica, sans-serif" size="1"><br></br>Sem nenhum lider</font></div><br></br><br></br>';
	}
	while($dados = odbc_fetch_array($qr)){
		$nome_clan = $dados['ClanName'];
		$lider = $dados['ClanZang'];
		$img = $dados['MIconCnt'];
		$pontos = $dados['Cpoint'];
		$membros = $dados['MemCnt'];
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<title>Líder SoD</title>
		<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen">
		
	</head>
	
</head>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="conteudo"><div align="center"><img src="<?=$UrlClanContent?><?=$img?>.bmp" width="32" height="32" /></div></td>
</tr>
<tr>
<td class="style4"><div align="center"><?=$nome_clan?></div></td>
</tr>
<tr>
<td class="style4"><div align="center">Líder: <?=$lider?></div></td>
</tr>
<tr>
<td class="style4"><div align="center">Pontos: <?=$pontos?></div></td>
</tr>
</table>