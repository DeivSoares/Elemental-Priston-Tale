<html><meta http-equiv="refresh" content="21;url=cavaleiro.php" />
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
	font-size: 15;
	color: #000;
	background: #121212;
	border-width: thin;
	border-style: solid double;
	border-color: #000;
	margin: 1px 1px 1px 1px;
}
.texto {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
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
include_once "incluir/configura.php";

					$classechar = $_POST['classe'];
                    $connection = odbc_connect( $connection_string, $user, $pass );
					$query = "SELECT TOP 10 * FROM [rPTDB].[dbo].[LevelList] WHERE (CharName NOT LIKE 'DKinJR') AND (CharName NOT LIKE 'Xomps') AND (CharName NOT LIKE 'PoderosoGM') AND (CharName NOT LIKE '[ADM]lowang') AND (CharName NOT LIKE 'GM-Hermes') AND (CharName NOT LIKE '[GM]Kakashi') AND (CharName NOT LIKE 'ares') AND (CharName NOT LIKE 'Gaia') AND (CharName NOT LIKE 'GM-Papazone') AND (CharName NOT LIKE 'KronuZ') AND (CharName NOT LIKE 'GM-Midgard') AND (CharName NOT LIKE 'Pix0ka') AND (CharName NOT LIKE 'HadesGM') AND (CharName NOT LIKE 'HermesGM') AND (CharName NOT LIKE 'Orin') AND (CharName NOT LIKE 'GM-Design') AND (CharName NOT LIKE 'LexusGM') AND (CharName NOT LIKE 'gm-pandora') AND (CharName NOT LIKE 'gm-ryu') AND (CharName NOT LIKE 'gm-reaper') AND (CharName NOT LIKE 'vahvel') AND (CharName NOT LIKE 'GM-slim') AND (CharName NOT LIKE 'Administrador') AND (CharName NOT LIKE 'GmDeath') AND (CharName NOT LIKE '[ADM]Vahvel') AND (CharName NOT LIKE '[GM]Soluction') AND (CharName NOT LIKE '[GM]Osbourne') AND (CharName NOT LIKE 'lowang') AND (CharName NOT LIKE 'Kisame') AND (CharName NOT LIKE 'Johnnie') AND (CharName NOT LIKE 'GunZ') AND (CharName NOT LIKE 'Teste2') AND (CharName NOT LIKE '[GM]Meryt') AND (CharName NOT LIKE 'GM-FreeCell') AND (CharName NOT LIKE 'GM-Sune') AND (CharName NOT LIKE 'Error1111') AND (CharName NOT LIKE 'GM-Alucard') AND (CharName NOT LIKE 'Hermes') AND (CharName NOT LIKE 'GM-Dark') ORDER BY CharLevel DESC";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

?>
<table height="381" border="0" cellpadding="0" cellspacing="0" width="243">
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
		<img src="images/classe/<? echo $classe; ?>.gif" width="29" height="28" border="0"></font></strong></td>
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
<a href="sacerdotisa.php" title="Top 10 Sacerdotisa">« Anterior</a> <span class="fundo" id="clock1" title="Tempo para o próximo"></span><script>setTimeout('getSecs()',1000);</script> <a href="cavaleiro.php" title="Top 10 Cavaleiro">Próximo »</a>
</span>
</center>
</body>
</html>



 