<table width="400" height="38" border="1" align="center">
  <tr>
    <td width="36">&nbsp;</td>
    <td width="120" align="center"><b>Clan</b></td>
    <td width="120" align="center"><b>Lder</b></td>
    <td width="104" align="center"><b>Pontos</b></td>
  </tr>
</table>
<?

$Host = "DRIVER={SQL Server};"."SERVER=VETE\SQLEXPRESS;"."DATABASE=ClanDB";
$User = "SA";
$Pass = "245873";

$Connect = odbc_connect($Host,$User,$Pass);

$Query = odbc_exec($Connect,"SELECT * FROM CL ORDER BY Cpoint DESC");

while($Loop = odbc_fetch_array($Query)){
$Clan = $Loop['ClanName'];
$Imagem = $Loop['MIconCnt'];
$Lider = $Loop['ClanZang'];
$Pontos = $Loop['Cpoint'];
}
$Dir_Img = "/ClanContent/$Imagem.bmp";

?>
<table width="400" height="38" border="1" align="center">
  <tr>
    <td width="36" align="center"><img src="<? echo "$Dir_Img"; ?>"></td>
    <td width="120" align="center"><b><? echo "$Clan"; ?></b></td>
    <td width="120" align="center"><b><? echo "$Lider"; ?></b></td>
    <td width="104" align="center"><b><? echo "$Pontos"; ?></b></td>
  </tr>
</table>