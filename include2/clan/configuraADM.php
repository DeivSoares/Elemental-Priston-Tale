<?
define("PT","1");

$expfile = "XPHex.txt";

// TITULO DAS PAGINAS DO PAINEL
$version="Painel de Administra��o do Server";

//Nome do Executavel do servidor.exe (coloque s� o nome, sem a exten��o .exe)
$Server = "ServidorPT";

//Porta do servidor
$portasv = "23079";

// IP DA MAQUINA QUE O PAINEL EST� ATUALMENTE
$iphost = "35.237.82.163";

// DIRETORIO DA SERVER FILES NO HOST
$rootDir = "C:/ServidorPT/"; 

// DIRETORIO DO PAINEL DE CONTROLE PLAYER EM PASTAS
$pastapainel = 'C:/inetpub/wwwroot/Web/include/Painel/';
$extrato = "C:/inetpub/wwwroot/Web/include/Painel/shop/historic/";
$creditos = "C:/inetpub/wwwroot/Web/include/Painel/shop/bonusplayer/";

// DIRETORIOS DA PASTA DATASERVER
// NECESSITA TODAS AS PERMI��ES
$dirUserData = $rootDir."DataServer/userdata/";
$dirUserInfo = $rootDir."DataServer/userinfo/";
$dirUserDelete = $rootDir."DataServer/deleted/";

include_once "class.func.php";
$func=new func;

// Configura��o SQL!!
$host = '(local)\SQLEXPRESS'; //Sua instancia do SQL
$user = 'sa'; //Seu usu�rio do SQL; Normalmente � SA
$pass = '36853185Pt'; //Sua senha do SQL

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';
$rPTDB = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=rPTDB';
$itemlog = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ItemLogDB';

// Configura��o SQL!!
$host2 = '(local)\SQLEXPRESS'; //Sua instancia do SQL
$user2 = 'sa'; //Seu usu�rio do SQL; Normalmente � SA
$pass2 = '36853185Pt'; //Sua senha do SQL

$connection_string2 = 'DRIVER={SQL Server};SERVER='.$host2.';DATABASE=accountdb';

?>
