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
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	color: #000000;
}
.style2 {font-size: 9px}
-->
</style>
</head>

<body background="images/meio_meio.jpg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<table width="340" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
      <font size="1" face="Verdana">
      <input name="classe" type="hidden" value="6">
	  </font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/06.gif" width="29" height="26" >
          </font>
          </td> 
    </form>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="4">
	  	</font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/04.gif" width="29" height="26" >
       </font>
       </td> 
    </form>
   <form name="form1" method="post" action="toplevel.php"> <td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="2">
	  	</font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/02.gif" width="29" height="26" >
        </font>
        </td>
   </form>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="1">
	   </font><font face="Verdana" size="1">
	   <input type="image" name="imageField" src="images/classe/01.gif" width="29" height="26" >
       </font>
       </td></form>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="7">
	  	</font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/07.gif" width="29" height="26" >
      </font>
      </td>
    </form>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="5">
	  	</font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/05.gif" width="29" height="26" >
        </font>
        </td>
    </form>
  <form name="form1" method="post" action="toplevel.php">  <td align="center">
      <font size="1" face="Verdana">
      <input name="classe" type="hidden" value="3">
	  </font><font face="Verdana" size="1">
	  <input type="image" name="imageField" src="images/classe/03.gif" width="29" height="26" >
        </font>
        </td></form>
    <form name="form1" method="post" action="toplevel.php"><td align="center">
       <font size="1" face="Verdana">
       <input name="classe" type="hidden" value="8">
	   </font><font face="Verdana" size="1">
	   <input type="image" name="imageField" src="images/classe/08.gif" width="29" height="26" >
        </font>
        </td></form>
  </tr>
</table>
<table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <form name="form1" method="post" action="toplevel.php"> <td align="right">
      <font size="1" face="Verdana">
      <input name="classe2" type="hidden" value="">
      </font><font face="Verdana" size="1">
      <input type="image" name="imageField2" src="images/geral.gif" width="37" height="17" >
   </font>
   </td> </form>
  </tr>
</table>
<font face="Verdana" size="1">
<?
include_once "incluir/configura.php";

$classechar = $_POST['classe'];


                    $connection = odbc_connect( $connection_string, $user, $pass );

if  ($classechar <> "")
{
//$query = "SELECT TOP 50 * FROM [rPTDB].[dbo].[LevelList]  ORDER BY CharLevel DESC";
$query = "SELECT TOP 50 * FROM [ServerDB].[dbo].[PvP] where [Class]='$classechar' ORDER BY lvl DESC";

}
else
{
//$query = "SELECT TOP 50 * FROM [rPTDB].[dbo].[LevelList] ORDER BY CharLevel DESC";
$query = "SELECT TOP 50 * FROM [ServerDB].[dbo].[PvP] ORDER BY lvl DESC";
}
                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

?>

</font>

<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" colspan="4">
	<img border="0" src="images/toprankind.png" width="350" height="77"></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $nome = $rank['Name'];
                    $level = $rank['Lvl'];
                    $classe = $rank['Class'];
					$i++;




?>
      <tr>
        <td height="25" align="center" bgcolor="#333333" width="11%"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $i; ?></font></strong></td>
        <td height="25" align="center" bgcolor="#333333" width="26%"><strong>
		<input type="image" name="imageField" src="images/classe/0<? echo $classe; ?>.gif" width="29" height="26" >

        <td height="25" align="center" bgcolor="#333333" width="52%"><strong>
		<font color="#FFFFFF" size="1" face="Verdana"><? echo $nome; ?></font></strong></td>
        <td height="25" align="center" bgcolor="#333333" width="11%"><strong>
		<font color="#FFFF00" size="1" face="Verdana"><? echo $level; ?></font></strong></td>
      </tr>
      <tr>
        <td colspan="4" align="center" bgcolor="#666666">
		<font face="Verdana" size="1" color="#FFFFFF"><img src="1" width="1" height="1"></font></td>
        </tr>

<?
}
?>
    </table></td>
  </tr>

  <tr>
    <td colspan="4"><font face="Verdana" size="1">
	<img src="images/rodape.JPG" width="350" height="10"></font></td>
  </tr>
</table>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="justify"><strong><div align="center">
		<font face="Verdana" size="1" color="#FFFFFF">OBS:</font><span class="style1"></strong><span class="style2"><font face="Verdana"> Coloque seu char no rank pelo painel de Controle. </font></span></span></div></td>
  </tr>
</table>
</body>
</html>
