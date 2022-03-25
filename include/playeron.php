<strong>
<div align="center">
<p><font face="Verdana" size="1">Usuarios Online:</font></strong></p>
<p><font color="#009900" size="1" face="Verdana"> 
  <?php
include_once "incluir/configura.php";


$server['host'] = "74.63.232.113";
$server['port'] = "10009";
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
</font></p>
