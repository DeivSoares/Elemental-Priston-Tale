<html><meta http-equiv="refresh" content="21;url=atalanta.php" />
<center><script>
function click() {
if (event.button==2||event.button==3) {
oncontextmenu='return false';
}
}
document.onmousedown=click
document.oncontextmenu = new Function("return false;")
</script>
<script language=JavaScript>
<!-- begin
var sHors = "0"; 
var sMins = "0";
var sSecs = 21;
function getSecs(){
sSecs--;
if(sSecs<0)
{sSecs=59;sMins--;if(sMins<=9)sMins="0"+sMins;}
if(sMins=="0-1")
{sMins=5;sHors--;if(sHors<=9)sHors="0"+sHors;}
if(sSecs<=9)sSecs="0"+sSecs;
if(sHors=="0-1")
{sHors="00";sMins="00";sSecs="00";
clock1.innerHTML=sSecs;}
else
{
clock1.innerHTML=sSecs;
setTimeout('getSecs()',1000);
}
}
//-->
</SCRIPT> 

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
input{
	margin-left: 00px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;
	font-family: Verdana;
	font-size: 11;
	color: #000;
	background: #121212;
	border-width: thin;
	border-style: solid double;
	border-color: #000;
	margin: 1px 1px 1px 1px;
}
.texto {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 9px;
	color: #999999;
	background: #1E1E1E;
}
.fundo{
	background-repeat: no-repeat;
	background-position: center;
	color: #ffffff;
}
.texxto {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 9px;
	color: #999999;
}
th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #000;
}
.rodape {
	font-size: 9px;
	color: #333;
}
.topo {
	background: #131313;
	font-size: 11px;
	color: #FFFFFF;
}
a:link {color:#999999; text-decoration: none;}
a:active {color:#999999; text-decoration: none;}
a:visited {color:#999999; text-decoration: none;}
a:hover {color:#999999; text-decoration: none;}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: transparent" background="images/Fundo.jpg">

<?
include_once "configura.php";

					$classechar = $_POST['classe'];
                    $connection = odbc_connect( $connection_string, $user, $pass );
					$query = "SELECT TOP 10 * FROM [rPTDB].[dbo].[LevelList] WHERE CharClass='Mago' ORDER BY CharLevel DESC";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

?>
<table height="181" border="0" cellpadding="0" cellspacing="0" width="143">
  <tr>
    <td width="165" height="181" align="center" valign="top" background=""><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <?
					$id=$i+1;
                    while($rank = odbc_fetch_array($qt)){
                    $nome = $rank['CharName'];
                    $level = $rank['CharLevel'];
                    $classe = trim($rank['CharClass']);
								$i++;
?>
      <tr>
        <td width="11%" align="center"><strong>
		<font face="Tahoma" color="#FFFFFF" style="font-size: 7pt"><? echo $i; ?></font></strong></td>
        <td width="16%" align="center"><strong>
		<font color="#FFFFFF" face="Tahoma" style="font-size: 8pt">
		<img src="images/classe/<? echo $classe; ?>.gif" width="19" height="18" border="0"></font></strong></td>
        <td width="59%"  align="left"><strong style="font-weight: 400">
		<font face="Tahoma" color="#FFFFFF" style="font-size: 8pt"><center><? echo $nome; ?></font></strong></td>
        <td width="15%"   align="center"><strong style="font-weight: 400">
		<font face="Tahoma" color="#FFFFFF" style="font-size: 8pt"><? echo $level; ?></font></strong></td>
      </tr>
      <?
} 
?>
    </table></td>
  </tr>
</table><center>
<span class="texxto">
<hr style="border: 1px solid #ffffff;" width="130">
<a href="lutador.php" title="Top 10 Lutador">« Anterior</a> <span class="fundo" id="clock1" title="Tempo para o próximo"></span><script>setTimeout('getSecs()',1000);</script> <a href="atalanta.php" title="Top 10 Atalanta">Próximo »</a>
</span>
</center>
</body>
</html>



 