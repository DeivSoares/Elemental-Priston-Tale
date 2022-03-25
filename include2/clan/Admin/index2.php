<?
if (PT!=1) exit;
$get = $_GET['sessadm'];
if($get == "deslogar"){
	session_unregister("gmfodoes");
	unset($_SESSION["IDADM"]);
	unset($_SESSION["NICKGM"]);
	header("Location: logout.php");
}
header("Content-type:text/html;charset=ISO-8859-15");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="ISO-8859-15">
	<title>Priston Tale Origem</title>
    <meta name="keywords" content="priston tale,  mmo, mmorpg">
    <meta name="description" content="Origin Priston Tale">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+SC" rel="stylesheet">
	<link rel="stylesheet" href="css/dexter.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.min.css">
</head>




<body id="LoginForm"><b>
<header class="dexter">
<div class="is-menu-bar animated fadeInDown">
<div class="content">

<nav id="nav">
<ul id="navigation" style="z-index:999;">
<li><a href="index.php">Inicio</a></li>
<li><a href="#">Suporte</a>
<ul>
<li><a href="?sess=logsID">Via ID</a></li>
<li><a href="?sess=logsIP">VIA IP</a></li>
<li><a href="?sess=logsCOD">VIA CODIGO DO ITEM</a></li>
<li><a href="?sess=procuraritem">PROCURAR ITEM</a></li>
<li><a href="?sess=dados">CHARS NA CONTA</a></li>
<li><a href="?sess=status">STATUS DA CONTA</a></li>
<li><a href="?sess=distribuidor">ITEM DISTRIBUIDOR</a></li>
<li><a href="?sess=log_dis">LOG ITEM DISTRIBUIDOR</a></li>
<li><a href="?sess=zerarlog_dis">ZERAR LOG ITEM DISTRIBUIDOR</a></li>
</ul>
</li>

<li><a href="#">Servidor</a>
<ul>
<li><a href="?sess=backup">BACKUP SQL</a></li>
<li><a href="?sess=bugdat">VERIFICAR DAT</a></li>
<li><a href="?sess=ligar">LIGAR SERVIDOR</a></li>
<li><a href="?sess=addgold">BANCO VIRTUAL</a></li>
<li><a href="?sess=addgoldbc">GOLD BC CLAN</a></li>
<li><a href="?sess=addgoldsod">GOLD SOD CLAN</a></li>
<li><a href="?sess=moverchar">MOVER CHAR</a></li>
<li><a href="?sess=multimanager">ATUALIZAR RANKING</a></li>
<li><a href="?sess=hotuk">EDITAR HOTUK</a></li>
<li><a href="?sess=uon">USU&#193;RIOS ONLINE</a></li>
<li><a href="?sess=banned">EDITAR EXCALIBUR</a></li>

</ul>
</li>

<li><a href="#">Player</a>
<ul>
<li><a href="?sess=search">VER ID PELO NICK</a></li>
<li><a href="?sess=search">DADOS PLAYER</a></li>
<li><a href="?sess=banir">PUNIR PLAYER</a></li>
<li><a href="?sess=listaban">LISTA PUNIDOS</a></li>
<li><a href="?sess=banidosdoserver">LISTA BANIDOS</a></li>
<li><a href="?sess=mudarnick">MUDAR NICK</a></li>
<li><a href="?sess=mudarclasse">MUDAR CLASSE</a></li>
<li><a href="?sess=addgoldp">ADD GOLD AO CHAR</a></li>
<li><a href="?sess=teleport">TELEPORTAR CHAR</a></li>
<li><a href="?sess=level">UP PLAYER</a></li>
</ul>
</li>

<li><a href="#">Premia&#199;&#195;o</a>
<ul>
<li><a href="?sess=premiado">PREMIAR USER ON</a></li>
<li><a href="?sess=premiados">LISTA DE PREMIADOS</a></li>
</ul>
</li>

<li><a href="#">Shop</a>
<ul>
<li><a href="?sess=informacao">OBTER INFORMA&#199;&#213;ES</a></li>
<li><a href="?sess=addcredito">ADICIONAR CR&#201;DITO</a></li>
<li><a href="?sess=removecredito">REMOVER CR&#201;DITO</a></li>
<li><a href="?sess=editarextrato">EDITAR EXTRATO</a></li>
</ul>
</li>

<li><a href="#">News</a>
<ul>
<li><a href="?sess=addnews">Adicionar Not&#205;cia</a></li>
</ul>
</li>

<li><a href="index.php?sessadm=deslogar">Sair</a></li>
</ul>
</nav>
</div>
</div>
</header>

<div class="container">
<h1 class="form-heading"></h1>
<div class="login-form">
<div class="main-div1">
<div class="panel">

<br>
<h2><b>Painel de Administra&#231;&#227;o Priston Tale Origem</b></h2>
</div><br>
<hr>



<?
$sess=(!$_GET[sess])?"home":$_GET[sess];
switch($sess)
{

   case "banir":
        include_once "banir.inc.php";
    break;

    case "listaban":
        include_once "punidos.inc.php";
    break;

    case "home":
        include_once "home.inc.php";
    break;
	
	    case "level":
        include_once "level.inc.php";
    break;
	
	    case "zerarrank":
        include_once "zerarrank.inc.php";
    break;
	
	case "contas":
        include_once "contas.inc.php";
    break;

	case "logsID":
        include_once "logID.inc.php";
    break;
	
		case "recover":
        include_once "restore.inc.php";
    break;

		case "recovercabelo":
        include_once "recovercabelo.inc.php";
    break;
	
			case "moverchar":
        include_once "moverchar.inc.php";
    break;

     case "contas_2":
    include_once "contas_2.inc.php";
    break;
	
			case "teleport":
        include_once "teleport.inc.php";
    break;

			case "multimanager":
        include_once "multimanager.inc.php";
    break;
	
			case "addgoldp":
        include_once "addgoldp.inc.php";
    break;
		
	
	case "logsIP":
        include_once "logIP.inc.php";
    break;
	
	
	case "logsCOD":
        include_once "logCOD.inc.php";
    break;
	
	case "search":
        include_once "search.inc.php";
    break;
	
		case "deletaitemlog":
        include_once "deletaitemlog.inc.php";
    break;
	
	case "resetsod":
        include_once "resetsodplayer.inc.php";
    break;

	case "deposita":
        include_once "depositar.inc.php";
    break;

	case "addgold":
        include_once "addgold.inc.php";
    break;
	
		case "depositabc":
        include_once "depositarbc.inc.php";
    break;

	case "addgoldbc":
        include_once "addgoldbc.inc.php";
    break;
	
			case "depositasod":
        include_once "depositarsod.inc.php";
    break;

	case "addgoldsod":
        include_once "addgoldsod.inc.php";
    break;


	case "resetsod":
        include_once "resetsod.inc.php";
    break;
	
	case "mudarnick":
        include_once "mudarnick.inc.php";
    break;

	case "mudarclasse":
        include_once "mudarclasse.inc.php";
    break;
	
		case "deletaclans":
        include_once "deletaclans.inc.php";
    break;
		
	
	case "ligar":
        include_once "ligarservidor.inc.php";
    break;

	case "bugdat":
        include_once "bugdat.inc.php";
    break;

	case "adados":
        include_once "adados.php";
    break;
		
	case "ligarsv":
        include_once "completa_ligarservidor.inc.php";
    break;
	
		case "clan":
        include_once "clan.inc.php";
    break;
	
	case"addcredito":
		  include_once"addcredito.inc.php";
		  break;
		  
		   case"removecredito":
		  include_once"removecredito.inc.php";
		  break;
	
			case "zerarct":
        include_once "zerarct.inc.php";
    break;

	
	case "delclan":
        include_once "delclan.inc.php";
    break;
	
		case "procuraritem":
        include_once "procuraritem.inc.php";
    break;
	
	case "itemresultado":
        include_once "itemresultado.inc.php";
    break;

	case "banidosdoserver":
        include_once "banidosdoserver.php";
    break;

	case "allcontas":
        include_once "allcontas.inc.php";
    break;

	case "deletarconta":
        include_once "deletarconta.inc.php";
    break;

	case "delconta":
        include_once "delconta.inc.php";
    break;
	
	case "hotuk":
		include "hotuk/index.php";
	break;
	
	case "hotukedit":
		include "hotuk/editar.php";
	break;

	case "uon":
		include "uon.php";
	break;
	
	case "informacao":
        include_once "informer.php";
    break;
	
	case "editarextrato":
		include "edita_extrato.php";
	break;
	case "premiado":
        include_once "premiado.php";
    break;
	
	case "distribuidor":
        include_once "distribuidor.inc.php";
    break;
	
	case "premiados":
        include_once "lista_permiados.php";
    break;
	
	case "backup":
		include "backup.php";
	break;
	
	case "log_dis":
		include "log_distribuidor.php";
	break;
	
	case "dados":
        include_once "dados.inc.php";
    break;
	
	case "status":
        include_once "statuscontas.inc.php";
    break;
	
	case "zerarank":
        include_once "zerarank.php";
    break;
	
	case "banned":
		include "excalibur/index.php";
	break;
	
	case "bannededit":
		include "excalibur/editar.php";
	break;

	case "zerarsod":
		include "zerarsod.php";
	break;
	
	case "zerarlog_dis":
		include "zerarlogdistribuidor.php";
	break;
	
	case "addnews":
		include "addnews.php";
	break;
	
	case "addnews1":
		include "addnews1.php";
	break;
	
	case "removernews":
		include "removernews.php";
	break;
}
?>

</b>    
</div>
</div>
</div>
</div>






</body>
</html>