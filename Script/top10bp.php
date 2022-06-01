<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Ranking Top Level</title>
<link rel="shortcut icon" href="Favicon.ico" type="image/x-icon">
<link href="style2.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style4 {font-family: Arial, Arial, Helvetica, sans-serif; font-size: 10px; color: #111111; font-weight: bold; }
body {
}
-->
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language=JavaScript>
<!--
var mensagem="";
function clickIE() {if (document.all) {(mensagem);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(mensagem);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// --> 
</script>
<font face="Arial" size="2">
<?
require "inc/config.inc.php";

set_time_limit(10);



if(!isset($_GET["page"])){
$pagina = 1;
}else{
$pagina = $_GET["page"];
}
$linhas = 10;


                    $connection = odbc_connect( $connection_string, $user, $pass );


$where = "(Name NOT LIKE '%-%' and Name!='Suporte' and Name!='ADMJoker' and Name!='ADMAlfa' and Name!='GmRagnaros' and Name!='GmMyers')";
$query = "SELECT TOP 10 * FROM [ServerDB].[dbo].[PVP] WHERE ".$where." ORDER BY Kills DESC";
if (($classechar) <> "")
{
$where = "[CharClass]='$classechar' AND (Name NOT LIKE '%-%' and Name!='Suporte' and Name!='Eros' and Name!='')";
}else{
$where = "(Name NOT LIKE '' and Name!='%-%' and Name!='Hanzard' and Name!='Eros')";
}
$queryy = "SELECT Count(*) as tops FROM [ServerDB].[dbo].[PVP] Where ".$where;



$qq = odbc_exec($connection, $queryy);
$mostrar = odbc_fetch_array($qq);
$pages = $mostrar["tops"] / $linhas;
$page = (int)$pages;

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" colspan="4"><table width="400" height="30" border="0" cellpadding="0" cellspacing="0" background="bg_top.png">
      <tr>
        <td width="9%" background="bgx2.png" class="font"><div align="center"><font color="#000000"><b>#</div></td>
          <td width="9%" background="bgx2.png" class="font"><div align="center"><font color="#000000"><b>Classe</div></td>
          <td width="26%" background="bgx2.png" class="font"><div align="center"><font color="#000000"><b>   NickName</div></td>
          <td width="15%" background="bgx2.png" class="font"><div align="center"><font color="#000000"><b>Kills</div></td> 
		  <td width="15%" background="bgx2.png" class="font"><div align="center"><font color="#000000"><b>Mortes</div></td> 
        </tr>
    </table>      <table width="300" border="0" cellspacing="0" cellpadding="0" background="bg.png">
  <?



$i = 1;
$o = 0;
$menor = ($pagina - 1) * $linhas;
$maior = $menor + $linhas;

                    while($rank = odbc_fetch_array($qt)){
	if(isset($_GET["classe"])){	
	if($classechar == $rank['CharClass']){
		$perm = 1;
		$o++;
		}else{
		$perm = 0;
		}
	}else{
	$perm = 1;
	$o++;
	}
	if ($o > $menor && $o <= $maior && $perm == 1) {
	
                    $nome = $rank['Name'];
                    $classe = $rank['Class'];
					$mortes = $rank['Deads'];
					$level = $rank['Kills'];
					
                   
?>
<table width="400" border="0" align="center" cellpadding="0" background="bxg.png">

        <tr class="font1">
          <td width="15%" height="30" align="center" class="conteudo">
          <span class="font1"><font color="#404040"><? echo $i; ?></font></td>
          <td width="15%" height="40" align="left" class="conteudo">
          <font size="1" face="Verdana"><img src="http://189.79.242.5/ranking02/classe/<? echo $classe; ?>.png" border="1" width="40" height="40"></font><font></font></font></strong></td>
          <td width="28%" align="left" class="conteudo"><font color="#404040"><center><? echo $nome; ?></font></td>
		 
		  <td width="28%" align="left" class="conteudo"><font color="#404040"><center><? echo $level; ?></font></td>
		  
          <td width="20%" height="30" align="center" class="conteudo">
          <td width="28%" align="left" class="conteudo"><font color="#404040"><center><? echo $mortes; ?></font></td>
		 
        </tr>
        <tr>
                <td colspan="9" height="1" align="center" bgcolor="#333">
          <font face="Verdana" size="0"></font></td>
       </tr>
    </table>      
  <?
  
}
$i++;

					
}
?>
    </table></td>
  </tr>
  
</table>

</font>
</tr>
</table>
</div>

</body>
</html>