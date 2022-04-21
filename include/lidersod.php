<meta http-equiv="refresh" content="2;url=segundo.php" />
<script>
	function click() {
		if (event.button == 2 || event.button == 3) {
			oncontextmenu = 'return false';
		}
	}
	document.onmousedown = click
	document.oncontextmenu = new Function("return false;")
</script>
<?
include "incluir/configura.php";
$connection1 = 'DRIVER={SQL Server};SERVER=' . $host . ';DATABASE=ClanDb';
$connection = odbc_connect($connection1, $user, $pass);
$query = "SELECT TOP 1 * FROM [ClanDB].[dbo].[CL] ORDER BY Cpoint DESC";
$go = odbc_do($connection, $query);
while (odbc_fetch_row($go)) {
	$nome_clan = odbc_result($go, 2);
	$lider = odbc_result($go, 6);
	$img = odbc_result($go, 9);
	$pontos = odbc_result($go, "Cpoint");
	$i = 7000;
}
?>

<body background="images/Fundo.jpg">

	<div align="center">
		<font face="Verdana" size="1">

			<div id="alinhamento"><img src="images/Ouro.png" width="22" height="22"></div>

			<div align="center">
				<font face="Verdana" size="1"><img src="http://www.elementalpristontale.com/Clancontent/<?= $img ?>.bmp" width="32" height="32"><br>
				</font>
				<font color="#ffffff" face="Verdana" size="1">
					<b><?= $nome_clan ?></b><br>
					Pontua&ccedil;&atilde;o: <?= $pontos ?>
					</center>
				</font>
			</div>
			<script>
				function click() {
					if (event.button == 2 || event.button == 3) {
						oncontextmenu = 'return false';
					}
				}
				document.onmousedown = click
				document.oncontextmenu = new Function("return false;")
			</script>