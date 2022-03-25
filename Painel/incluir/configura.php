<?
define("DexteR","1");
// TITULO DAS PAGINAS DO PAINEL
$version="Painel de UniquePT";

// NOME DO SERVIDOR
$nomedoserver="UPT";

// IP DO HOST/PC/SERVIDOR
$ipdoservidor="149.56.185.199";

// PRISTON TALE SERVER DIRETORIO
$rootDir = "C:\Server"; 

include_once "class.func.php";
$func=new func;

// PRISTON TALE MÚLTIPLAS DATASERVER 
// DIRETORIO DE PERMIÇÃO

$dirUserData = $rootDir."DataServer/userdata/";
$dirUserInfo = $rootDir."DataServer/userinfo/";
$dirUserDelete = $rootDir."DataServer/deleted/";

// MUDANÇA PARA O SEU NOME DO COMPUTADOR
$connection_string = 'DRIVER={SQL Server};SERVER=PTL\SQLEXPRESS;DATABASE=accountdb';

// USUARIO DO SQLEXPRESS USER E PASSWORD 
$user = 'sa';
$pass = '#$pdl32xq';
?>
