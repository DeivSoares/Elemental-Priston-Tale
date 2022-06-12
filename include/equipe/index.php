<?php
session_start();
$host = 'PRIME'; //Sua instancia do SQL
$user = 'sa'; //Seu usuário do SQL; Normalmente é SA
$pass = '1q2w!@QW'; //Sua senha do SQL

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
?>
<body background-color="black">

<div align="center">
<font color="#FFFFFF" face="Tahoma" style="font-size: 8pt">
    <?
$username= "Johnnie";
$conecta = odbc_connect( $connection_string, $user, $pass );
$query = "SELECT * FROM [ClanDb].[dbo].[CT] WHERE [ChName]='$username'";
$executa = odbc_exec($conecta,$query);
while($busca_resulta = odbc_fetch_array($executa)){
$ADMINscript_gmon = $busca_resulta['ChName'];
}
if($ADMINscript_gmon == $username) {
echo '<b> Johnnie <img width="10" height="10" src="images/gmon.gif">';
		  }else{
echo '<b> Johnnie <img width="10" height="10" src="images/gmoff.gif">';
		  }
?>
  <br>
<?
$username="Xomps";
$conecta1 = odbc_connect( $connection_string, $user, $pass );
$query1 = "SELECT * FROM [ClanDb].[dbo].[CT] WHERE [ChName]='$username'";
$executa1 = odbc_exec($conecta1,$query1);
while($busca_resulta = odbc_fetch_array($executa1)){
$ADMINscript_gmon1 = $busca_resulta['ChName'];
}
if($ADMINscript_gmon1 == $username) {
echo '<b> Xomps <img width="10" height="10" src="images/gmon.gif">';
		  }else{
echo '<b> Xomps <img width="10" height="10" src="images/gmoff.gif">';
		  }
?><br>
 <?
$username= "Strike";
$conecta = odbc_connect( $connection_string, $user, $pass );
$query = "SELECT * FROM [ClanDb].[dbo].[CT] WHERE [ChName]='$username'";
$executa = odbc_exec($conecta,$query,$query2);
while($busca_resulta = odbc_fetch_array($executa)){
$ADMINscript_gmon = $busca_resulta['ChName'];
}
if($ADMINscript_gmon == $username) {
echo '<b> Strike <img width="10" height="10" src="images/gmon.gif">';
		  }else{
echo '<b> Strike <img width="10" height="10" src="images/gmoff.gif">';
		  }
?>
<br>
</div>
