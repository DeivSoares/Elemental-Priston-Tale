<?
define("PT","1");

/*----------------------------------------------------------------------
Painel de Adminstra��o
PESSOAS QUE CONTRIBUIRAM NO DESENVOLVIMENTO DO PAINEL DE ADMINSTRA��O.
Niik - Jeck - MecanicoGM - N�ckolas - D kin
----------------------------------------------------------------------*/

// TITULO DAS PAGINAS DO PAINEL
$version="Painel de Administra��o";

//Nome do Executavel do servidor.exe (coloque s� o nome, sem a exten��o .exe)
$Server = "Servidor";

//Porta do servidor
$portasv = "33003";

// IP DA MAQUINA QUE O PAINEL EST� ATUALMENTE
$iphost = "51.222.17.94";

// DIRETORIO DA SERVER FILES NO HOST
$rootDir = "C:\Server/"; 

// DIRETORIO DO PAINEL DE CONTROLE PLAYER EM PASTAS
$pastapainel = 'C:\inetpub\wwwroot\Painel';
$extrato = "C:\inetpub\wwwroot\Painel/shop/historic/";
$creditos = "C:\inetpub\wwwroot\Painel/shop/bonusplayer/";

// DIRETORIOS DA PASTA DATASERVER
// NECESSITA TODAS AS PERMI��ES
$dirUserData = $rootDir."DataServer/userdata/";
$dirUserInfo = $rootDir."DataServer/userinfo/";
$dirUserDelete = $rootDir."DataServer/deleted/";

include_once "class.func.php";
$func=new func;

// Configura��o SQL!!
$host = 'PTL\SQLEXPRESS'; //Sua instancia do SQL
$user = 'sa'; //Seu usu�rio do SQL; Normalmente � SA
$pass = '#$pdl32xq'; //Sua senha do SQL

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';
$rPTDB = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=rPTDB';
$itemlog = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ItemLogDB';

// Configura��o SQL!!
$host2 = 'PTL\SQLEXPRESS'; //Sua instancia do SQL
$user2 = 'sa'; //Seu usu�rio do SQL; Normalmente � SA
$pass2 = '#$pdl32xq'; //Sua senha do SQL

$connection_string2 = 'DRIVER={SQL Server};SERVER='.$host2.';DATABASE=accountdb';

?>
