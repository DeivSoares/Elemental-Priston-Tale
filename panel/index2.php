<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elemental PT Painel - www.elementalpristontale.com </title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
	
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/main.js"></script>

</head>

<body class="homepage">

    <header id="header">
 
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="default.asp"><img src="images/logo.gif" height="100" width="160" alt="logo">Painel <b> Elemental PT</b></a>
                </div>
				
				
				
		
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       
					   <li class="active"><a href="http://site.elementalpristontale.com:31206/">Home</a></li>
                        
	
<?
if($_SESSION['permissao'] >= 1)
					{ 
					?> 
					
												<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerenciar<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    
   
									<li><a href="index.php?sessadm=alteradados" >Dados da Conta</a></li>                 
											</ul>
                            </li>

	
					
					<?
					}
					if($_SESSION['permissao'] >= 2)
					{ 
				?> 

					
								<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edit Game <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
									<li><a href="index.php?sessadm=removeban" >Ban Sys</a></li>  
									<li><a href="index.php?sessadm=alteradadosadm" >Dados da Conta Adm</a></li>  
									
                                    <li><a href="index.php?sessadm=verid" >Saber ID por Nick</a></li>
                                    <li><a href="index.php?sessadm=mudarnick" >Mudar nick</a></li>
									<li><a href="index.php?sessadm=characc" >Chars na ID</a></li>
                                    <li><a href="index.php?sessadm=mudarclasse" >Mudar Classe</a></li>
									<li><a href="index.php?sessadm=sodeclan" >Clan e SoD</a></li>
								</ul>
                            </li>
	
							

							<?
					}							 
							

                        

$ip = $_SERVER["REMOTE_ADDR"];
$datahoje = date("m-d-Y h:i:s A");

							 ?>                                 
                    </ul>
                </div>
				
	
				
				
				
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
	
	
<td height="40" valign="middle"><a style="color:#16116E"><h3>Ol&aacute; , <strong><a style="color:#A3662D"><? echo $_SESSION["nome"]; ?></strong><a style="color:#5671AB"> seja Bem Vindo ao 'Panel Adminitrador' 
<br><a style="color:#16116E">  Nivel de acesso:  <a style="color:#A3662D"><? echo $_SESSION["permissao"]; ?>
<br> <a style="color:#16116E"> IP:  <a style="color:#A3662D"><? echo $ip; ?>
<br> <a style="color:#16116E"> Data:  <a style="color:#A3662D"><? echo $datahoje; ?>
</style></td>
</tr></h3>
<tr>
  <td height="25" valign="middle"><p>

<a style="color:#FF5555" HREF='?sessadm=logout'align='center'><button><b>Logout</button></b></h2> </a> 

    </td>
</tr>
            </table></td>
        </tr>
        <tr>
        <td>
<?




$sessadm=(!$_GET['sessadm'])?"char":$_GET['sessadm'];
switch($sessadm)
{



//AREA IN Game
	case "removeban":
        include_once "IN-Game/removeban.php";
    break;
	case "alteradados":
        include_once "IN-Game/altera_dados.php";
    break;	      
	case "alteradadosadm":
        include_once "IN-Game/altera_dadosadm.php";
    break;	
    case "verid":
        include_once "IN-Game/pegaid.inc.php";
    break;

	case "characc":
        include_once "IN-Game/characc.inc.php";
    break;
	
    case "mudarclasse":
        include_once "IN-Game/mudarclasse.inc.php";
    break;	
	
    case "mudarnick":
        include_once "IN-Game/mudarnick.inc.php";
    break;

    case "sodeclan":
        include_once "IN-Game/sodeclan.php";
    break;	


	}	
	
?>



		</td>
</tr>
		        <tr><br><br><br><br>
                <td colspan="2"><strong><Center><h3><a style="color:#FF0000">Prezado <? echo $_SESSION["nome"]; ?>,  nos mande sempre dicas e sugestoes sobre o funcionamento do sistema neste <a style="color:#5671AB" href="mailto:admin@primerpg.com">Email</a><a style="color:#FF0000">, assim poderemos melhor servi-los. <br>Obrigado!
				</h3>
	
				<td colspan="2"><strong><Center><a style="color:#5671AB">  <br> 
				<br> <br>
				<a style="color:#5671AB">Dev: PrimeRPG Games<br>	<a href="http://www.PrimeRPG.com/">www.PrimeRPG.com</a><br> <br><a style="color:#5671AB">Version: <a style="color:#271BCD">5.0 (Beta) </strong> 
              </tr></td>
      </table>

		  </td>
        </tr>
      </table>

      <table width="448" border="0" align="center" cellpadding="0" cellspacing="0">


      </table></td>
  </tr>

</table>

</body>
</html>






