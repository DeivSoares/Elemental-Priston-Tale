<script>
function click() {
if (event.button==2||event.button==3) {
oncontextmenu='return false';
}
}
document.onmousedown=click
document.oncontextmenu = new Function("return false;")
</script> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  background="images/meio_meio.JPG">


<?
include_once "incluir/configura.php";

                    $connection = odbc_connect( $connection_string, $user, $pass );

                    $query = "SELECT TOP 10 * FROM [ClanDb].[dbo].[CL] MemCnt WHERE ClanName <> 'Arcade' AND Cpoint <> '0' ORDER BY Cpoint DESC";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);





?>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" colspan="4">
	<font face="Verdana" size="1">
	<img src="images/sod_clan.png" width="350" height="77"></font></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<?

					$i = 0;
                    while(odbc_fetch_row($qt)){
                    $imagem=odbc_result($qt,9);
                    $clanname=odbc_result($qt,2);
                    $lider=odbc_result($qt,6);
                    $pontos=odbc_result($qt,15);
                    $i++


?>
      <tr>
        <td width="12%" height="30" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $i; ?></font></strong></td>
        <td width="30%" height="30" align="left" bgcolor="#333333"><strong>
		<font size="1" face="Verdana" color="#FFFFFF"><img src="http://212.124.114.39:80/ClanContent/<? echo $imagem; ?>.bmp" width="20" height="20" align="middle"> <? echo $clanname; ?></font><font color="#FFFFFF"></font></font></strong></td>
        <td width="33%" height="30" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $lider; ?></font></strong></td>
        <td width="25%" height="30" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $pontos; ?></font></strong></td>
        </tr>
      <tr>
        <td colspan="7" align="center" bgcolor="#666666">
		<font face="Verdana" size="1"><img src="" width="1" height="1"></font></td>
        </tr>

<?
}
?>
    </table></td>
  </tr>

  <tr>
    <td colspan="4">
	<font face="Verdana" size="1">
	<img border="0" src="images/rodape.JPG" width="350" height="10"></font></td>
  </tr>
</table>
</body>
</html>
