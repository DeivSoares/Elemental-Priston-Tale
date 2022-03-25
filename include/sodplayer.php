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

<body background="images/meio_meio.JPG" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">


<font face="Verdana" size="1">


<?
include_once "incluir/configura.php";

$classechar = $_POST['classet'];


                    $connection = odbc_connect( $sod, $user, $pass );

if  ($classechar <> "")
{
$query = "SELECT TOP 30 * FROM SoD2RecBySandurr ORDER BY Point DESC";

}
else
{
$query = "SELECT TOP 30 * FROM SoD2RecBySandurr ORDER BY Point DESC";
}
                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

?>


</font>


<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" colspan="4">
	<font face="Verdana" size="1">
	<img src="images/topranksodplayer.png" width="350" height="77"></font></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
					$i = 0;
					$nicks_ja_exibidos = array();
                    while(odbc_fetch_row($qt) && $i < 100){
                    	if (!in_array(odbc_result($qt,3),$nicks_ja_exibidos)) {
                    		array_push($nicks_ja_exibidos,odbc_result($qt,3));

		                    $classe=odbc_result($qt,4);
		                    $nome=odbc_result($qt,3);
		                    $pontos=odbc_result($qt,5);
		                    $mortos=odbc_result($qt,6);
		                    $level=odbc_result($qt,7);
							$i++

?>
      <tr>
        <td width="11%" height="25" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $i; ?></font></strong></td>
        <td width="15%" height="25" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana">
		<img src="images/classe/0<? echo $classe; ?>.gif" border="0"></font></strong></td>
        <td width="27%" height="25" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $nome; ?></font></strong></td>
        <td width="18%" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $pontos; ?></font></strong></td>
        <td width="18%" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $mortos; ?></font></strong></td>
        <td width="12%" height="25" align="center" bgcolor="#333333"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $level; ?></font></strong></td>
      </tr>
      <tr>
        <td colspan="6" align="center" bgcolor="#666666">
		<font face="Verdana" size="1"><img src="1" width="1" height="1"></font></td>
        </tr>

<?
                    	}
					}
?>
    </table></td>
  </tr>

  <tr>
    <td colspan="4"><font face="Verdana" size="1"><img src="images/rodape.JPG" width="350" height="10"></font></td>
  </tr>
</table>
</body>
</html>