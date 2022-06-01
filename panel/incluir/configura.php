<?
define("ArcadeADM","2");

/*----------------------------------------------------------------------
Painel ADM
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Server PrimeRPG_Panel - www.PrimeRPG_Panel.com.br
----------------------------------------------------------------------*/

// version;
$version="Painel de Admin";

include_once "class.func.php";
$func=new func;


$rootDir = "C:/Server/";

$dirUserData = $rootDir."DataServer/userdata/";
$dirUserInfo = $rootDir."DataServer/userinfo/";
$dirUserDelete = $rootDir."DataServer/deleted/";



// ADMIN ACCOUNT
// FULLY CONTROL CHARACTER
// EDIT LEVEL / GOLD / MOVE CHAR / RENAME CHAR / CHANGE CLASS / RANK UP TIER / SHOW 
//USER PASSWORD
$adminList=array();


$GMList2=array();



$GMList1=array();


// CHANGE XXX TO YOUR COMPUTER NAME
$connection_string = 'DRIVER={SQL Server};SERVER=PRIME;DATABASE=Prime_Panel';


// CHANGE SQLEXPRESS USER AND PASSWORD
$user = 'sa';
$pass = '1q2w!@QW';
?>

