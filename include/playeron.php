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
.fundo{
	background-repeat: no-repeat;
	background-position: center;
	color: #ffffff;
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
.texto {
	font-size: 12px;
	color: #FFCC99;
	font-weight: bold;
	font-family: Arial;
	text-shadow: 0px 1px 1px rgba(150, 150, 150, 1);
}
a:link {
	color: #FFCC99;
	text-decoration: none;
	font-weight: bold;
	font-family: Arial;
	text-shadow: 0px 1px 1px rgba(150, 150, 150, 1);
}
a:visited {
	text-decoration: none;
	color: #FFCC99;
	font-weight: bold;
	font-family: Arial;
	text-shadow: 0px 1px 1px rgba(150, 150, 150, 1);
}
a:hover {
	text-decoration: none;
	color: #999999;
	font-weight: bold;
	font-family: Arial;
	text-shadow: 0px 1px 1px rgba(150, 150, 150, 1);
}
a:active {
	text-decoration: none;
	color: #999999;
	font-weight: bold;
	font-family: Arial;
	text-shadow: 0px 1px 1px rgba(150, 150, 150, 1);
}
</style>
<div align="center">
<span class="texto"> Usuarios Online:</font></span><font color="#FFCC99" size="2"face="Arial Black">
<?php
include_once "incluir/configura.php";


$server['host'] = "51.222.17.94";
$server['port'] = "33003";
$connection = @fsockopen($server['host'], $server['port'], $ERROR_NO, $ERROR_STR, (float)1.5);
if($connection)
{
    fclose($connection);

$connection = odbc_connect( $connection_string, $user, $pass );
$query_OL = "SELECT * FROM [ClanDb].[dbo].[CT] ";
$q_OL = odbc_exec($connection, $query_OL);
$qt_OL = odbc_do($connection, $query_OL);

$OnLine = 0;
while(odbc_fetch_row($qt_OL)) $OnLine++;

$playerson = $OnLine;

echo $playerson;
}
else
{
echo "0";
}
?>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
-->
</style>
</font>