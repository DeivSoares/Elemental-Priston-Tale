<? if (DexteR!=1) exit;

$username=$_SESSION["ID"];
$pasta = $func->numDir($qCharID);

session_unregister("enviado");

//Pasta de Controle de Pontos Bonus
$arquivo_bonus = "shop/bonusplayer/$username.arc";
$pega_bonus_zero = "shop/bonusplayer/bonus_zero.arc";
//Verifica se pasta de Bonus Existe
if (!file_exists($arquivo_bonus)) {
@copy($pega_bonus_zero, $arquivo_bonus);
}


//Pega os Bônus do Player
@$abreB = fopen($arquivo_bonus, "r");
@$saldoB = fread($abreB, filesize($arquivo_bonus));
@fclose($abreB);
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <title>Painel de Controle ElementalPT</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.png" type="image/x-icon" />  
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme.css"/>                                 
    </head>
<?
$username=$_SESSION["ID"];
include'incluir/configura.php';
$conecta = odbc_connect( $connection_string, $user, $pass );
$query = "SELECT * FROM [ClanDb].[dbo].[CT] WHERE [UserID]='$username'";
$executa = odbc_exec($conecta,$query);
while($busca_resulta = odbc_fetch_array($executa)){
$id_online = $busca_resulta['UserID'];
}
?>
<?
$username=$_SESSION["ID"];
$conecta = odbc_connect( $connection_string, $user, $pass );
$query = "SELECT * FROM [accountdb].[dbo].[AllGameUser] WHERE [userid]='$username'";
$executa = odbc_exec($conecta,$query);
while($busca_resulta = odbc_fetch_array($executa)){
$banido = $busca_resulta['BlockChk'];
}
if($banido == "1"){
header("location: banido.php");
}else{
}
?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation fixed">
                    <li class="xn-logo">
                        <a href="index.php">ElementalPT</a>
                        <a href="#" class="x-navigation-control"></a><hr>
                    </li>                
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span><span class="xn-text">Personagens</span></a>
                        <ul>
                            <li><a href="?sess=criarchar">Criar Personagem</a></li>  
							<li class="xn-title">Lista de Personagens</li> 
							<?
            $qCharID=($_SESSION["charID"])?$_SESSION["charID"]:$_SESSION["ID"];
            $charInfo=$dirUserInfo . ($func->numDir($qCharID)) . "/" . $qCharID . ".dat";

            if(file_exists($charInfo) && ( filesize($charInfo)==240) )
            {
                $fRead=false;
                $fOpen = fopen($charInfo, "r");
                $fRead =fread($fOpen,filesize($charInfo));
                @fclose($fOpen);

                // list char information
                $charNameArr=array(
                    "48" => trim(substr($fRead,0x30,15),"\x00"),
                    "80" => trim(substr($fRead,0x50,15),"\x00"),
                    "112"=> trim(substr($fRead,0x70,15),"\x00"),
                    "144"=> trim(substr($fRead,0x90,15),"\x00"),
                    "176"=> trim(substr($fRead,0xb0,15),"\x00"),
					"208"=> trim(substr($fRead,0xd0,15),"\x00"),
                );

                if(count($charNameArr)>0)
                {
                    foreach($charNameArr as $key=>$value)
                    {
                        $expValue=explode("\x00",$value);
                        echo "<li><a href=\"?char=".$expValue[0]."\">".$expValue[0]."</a></li>";
                    }
                }
                else
                {
                    echo "<li>Nenhum Personagem</li>";
                }

            }
            else
            {
                echo "<li>Nenhum Personagem</li>";
            }
?>
                        </ul>
                    </li>             
					<li>
                  
                    </li>                    
                    <li>
                        <a href="?sess=mudasenha"><span class="fa fa-gear"></span><span class="xn-text">Conta</span></a>
                    </li>                    
                    <li>
                        <a href="#" class="mb-control" data-box="#sair"><span class="fa fa-sign-out"></span><span class="xn-text">Sair</span></a>  
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
						<div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Elemental Priston Tale</h3>
                                        <span>Painel de Controle</span>
                                    </div> 
                                </div>
                                <div class="panel-body panel-body-table">
<br />
<?
$nomedochar = $_SESSION["ID"];

//Vendo se o Player est&aacute; Banido
$connection = odbc_connect( $connection_string, $user, $pass );
$query_ban = "SELECT * FROM [accountdb].[dbo].[".( strtoupper($nomedochar[0]) ) ."GameUser] WHERE [userid]='$nomedochar'";
$q_ban = odbc_exec($connection, $query_ban);
$qt_ban = odbc_do($connection, $query_ban);
while(odbc_fetch_row($qt_ban)) {
$verbanido = odbc_fetch_array($q_ban);
$taban=$verbanido[BlockChk];
}
if ($taban == "1") {
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=banido.php'>";
}
?>

<?
$nomedochar = $_SESSION["ID"];
//$nomedochar = $_SESSION["charID"];
$connection = odbc_connect( $connection_string, $user, $pass );
$query = "SELECT * FROM [ClanDb].[dbo].[CL]  WHERE UserID = '$nomedochar' ";
$qLider = odbc_exec($connection, $query);
$qtLider = odbc_do($connection, $query);

$i = 0;
                while(odbc_fetch_row($qtLider)){
                $nomeclan=odbc_result($qtLider,2);

                 $i++;

                if($i==0) {} else {
?>
<?
}}
$CHAR=($_GET["char"])?$_GET["char"]:$_POST["char"];

if( !$CHAR )
{
	$query = "SELECT * FROM [clanDB].[dbo].[CL]";
	$go = odbc_do($connection,$query);
function AcertarLinhasODBC($conexao,$query){
	$resultado = odbc_exec($conexao,$query);
	$contador=0;
	while($temp = odbc_fetch_into($resultado, &$counter)){
		$contador++;
	}
	return $contador;
}
	$online = AcertarLinhasODBC($connection,$query);
?>
							

<!--  Dados Char -->
<?
if($_SESSION["charDir"])
{
$nickchar = $_SESSION["charName"];
$query_clan = "SELECT * FROM [ClanDb].[dbo].[UL]  WHERE ChName = '$nickchar'";
$q_clan = odbc_exec($connection, $query_clan);
$clan = odbc_fetch_array($q_clan);
$nomeclan = $clan['ClanName'];
$numeroclan = $clan['MIconCnt'];

?>
<?
//Checar se eles estao online ou offline
$query_online = "SELECT * FROM [ClanDb].[dbo].[CT] WHERE ChName = '$charmember'";
$membon = odbc_do($connection, $query_online);
$estaon = 0;
while(odbc_fetch_row($membon)) $estaon++;

?>
<div class="content">
<div class="header">
<h4 class="title text-left"><span class="fa fa-angle-right"></span> Dados do Personagem</h4><hr />
                            </div>
                                <form method="post" onSubmit="disabledBttn(this)" action="index.php?sess=mudarnick">
                                    <div class="row">
									<div class="col-md-3"> </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Personagem </label>
												<? if($estaon == 0) { echo "<img src='imgs/off_member.gif' >";} else { echo "<img src='imgs/on_member.gif' >";} ?>
                                                <input type="text" size="15" maxlength="15" name="nick" value="<?=$_SESSION["charName"]?>" class="form-control">
                                            </div>
                                        </div>																
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alterar Nick</label><br>
                                                <input type="hidden" name="acao" value="nick">
												<a href="#" class="mb-control" data-box="#nick"><span class="btn btn-primary">Alterar</span></a>
												<input type="text" class="form-coins" disabled placeholder="Company" value="Valor 20 Coins"> 
												<?=$func->img($_SESSION["ID"],"20")?>
                                            </div>
                                        </div>
                                    </div>
									<!-- Nick BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="nick">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><strong>ElementalPT</strong></div>
                    <div class="mb-content">
                        <p>Tem certeza que deseja alterar seu nick?</p>                    
                        <p>Pressione Sim para alterar.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary btn-lg" value="Sim">
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Nick BOX-->
									</form>
									<form method="post" onSubmit="disabledBttn(this)" action="index.php?sess=mudarclasse">
									<div class="row">
									<div class="col-md-3"> </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Classe</label><br>
												<img src="imgs/<?=$_SESSION["charClass"]?>.png" width="35" height="35" border="1">
                                                <select name="class" class="form-class">
                        <option <?=($_SESSION["charClass"]=="Fighter")?"selected":""?>>Fighter</option>
                        <option <?=($_SESSION["charClass"]=="Mechanician")?"selected":""?>>Mechanician</option>
                        <option <?=($_SESSION["charClass"]=="Archer")?"selected":""?>>Archer</option>
                        <option <?=($_SESSION["charClass"]=="Pikeman")?"selected":""?>>Pikeman</option>
                        <option <?=($_SESSION["charClass"]=="Atalanta")?"selected":""?>>Atalanta</option>
                        <option <?=($_SESSION["charClass"]=="Knight")?"selected":""?>>Knight</option>
                        <option <?=($_SESSION["charClass"]=="Magician")?"selected":""?>>Magician</option>
                        <option <?=($_SESSION["charClass"]=="Priestess")?"selected":""?>>Priestess</option>
                        </select>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alterar Classe</label><br>
                                              <input name="acao" type="submit" class="btn btn-primary" id="acao" onclick ="return confirm('Tem certeza que deseja alterar a sua classe e pagar 40 Cr&eacute;ditos?')" value="Alterar">
											  <input type="text" class="form-coins" disabled placeholder="Company" value="Valor 40 Coins"> 
												<?=$func->img($_SESSION["ID"],"40")?></td>
                                            </div>
                                        </div>
                                </form>
                            </div>
							
							<div class="row">
							<div class="col-md-3"> </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Level</label><br>
                                                <input type="text" class="form-level" disabled placeholder="Company" value="<?=$_SESSION["charLevel"]?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Clan</label><br>
                                                <input type="text" class="form-control" disabled placeholder="Sem Clan" value="<? echo $nomeclan; ?>">
                                            </div>
                                        </div>
                                        
                            </div><br/>
							<center>
							<a href="?sess=state"><span class="btn btn-primary">Ajustar Status</span></a>
							<a href="?sess=skill"><span class="btn btn-primary">Ajustar Skills</span></a>
							</div>
							
							
							
							
							
							
							<hr />
<? } ?>
<?
/* */
$sess=(!$_GET[sess])?"criarchar":$_GET[sess];
switch($sess)
{

    case "coins":
        include_once "coins.inc.php";
    break;
	
	 case "criarchar":
        include_once "criar.inc.php";
    break;

    case "skill":
        ($_SESSION["charDir"])?include_once "skill.inc.php":"";
    break;

    case "state":
        ($_SESSION["charDir"])?include_once "state.inc.php":"";
    break;

    case "mudasenha":
        include_once "atualizar.inc.php";
    break;
	
	 case "mudarnick":
        include_once "classe/nick.inc.php";
    break;
	
	case "mudarclasse":
        include_once "classe/classe.inc.php";
    break;

/* Gold Diário */

	case "gold_diario":
        include_once "gold_diario/index.php";
    break;
	
	case "gold_diario_rankings":
        include_once "gold_diario/rankings.php";
    break;
	
	case "gold_diario_saques":
        include_once "gold_diario/saques.php";
    break;
	
/* Clan */
			
	case "admclan":
        include_once "clan/admclan.inc.php";
    break;

        //Lider vê membros do clan
    case "membros":
        include_once "clan/membrosdoclan.inc.php";
    break;
	
//Shop
    case "shop":
	$arquivo = $rootPainel."Shop/itens/armaduras.ite";
	$nomecat = "Shop";
	include_once $rootPainel."Shop/itens.inc.php";
	break;

    case "compra":
        include_once "shop/compra.inc.php";
    break;

    case "extrato":
        include_once "shop/extrato.inc.php";
    break; 
	//Pegando Shop
case "Armor":
$arquivo = $rootPainel."Shop/itens/armaduras.ite";
$nomecat = "Armaduras";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Robe":
$arquivo = $rootPainel."Shop/itens/roupao.ite";
$nomecat = "Roupões";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Shield":
$arquivo = $rootPainel."Shop/itens/escudos.ite";
$nomecat = "Escudos";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Boots":
$arquivo = $rootPainel."Shop/itens/botas.ite";
$nomecat = "Botas";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Gauntlets":
$arquivo = $rootPainel."Shop/itens/luvas.ite";
$nomecat = "Luvas";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Armlets":
$arquivo = $rootPainel."Shop/itens/braceletes.ite";
$nomecat = "Braceletes";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Arcos":
$arquivo = $rootPainel."Shop/itens/arcos.ite";
$nomecat = "Arcos";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Spear":
$arquivo = $rootPainel."Shop/itens/foices.ite";
$nomecat = "Foices";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Garras":
$arquivo = $rootPainel."Shop/itens/garras.ite";
$nomecat = "Garras";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Javelin":
$arquivo = $rootPainel."Shop/itens/lancas.ite";
$nomecat = "Lanças";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Sword":
$arquivo = $rootPainel."Shop/itens/espadas.ite";
$nomecat = "Espadas";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Staff":
$arquivo = $rootPainel."Shop/itens/staff.ite";
$nomecat = "Varinhas";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Axe":
$arquivo = $rootPainel."Shop/itens/machados.ite";
$nomecat = "Machados";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "RingAmulet":
$arquivo = $rootPainel."Shop/itens/aneis.ite";
$nomecat = "Anéis e Amuletos";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Sheltons":
$arquivo = $rootPainel."Shop/itens/pedras.ite";
$nomecat = "Sheltons";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Orb":
$arquivo = $rootPainel."Shop/itens/orb.ite";
$nomecat = "Orbs";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Premium":
$arquivo = $rootPainel."Shop/itens/premium.ite";
$nomecat = "Premium";
include_once $rootPainel."Shop/itens.inc.php";
break;

case "Hammer":
$arquivo = $rootPainel."Shop/itens/hammer.ite";
$nomecat = "Hammer";
include_once $rootPainel."Shop/itens.inc.php";
break;
	
/* Suporte */

case "abresuporte":
include_once $rootPainel."suporte/abre_suporte.inc.php";
break;

case "listasuporte":
include_once $rootPainel."suporte/lista_suporte.inc.php";
break;

case "supacompanha":
include_once $rootPainel."suporte/acompanha.inc.php";
break;
}
?>
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="sair">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span><strong>Sair</strong> ?</div>
                    <div class="mb-content">
                        <p>Tem certeza que deseja sair?</p>                    
                        <p>Pressione Não se quiser continuar. Pressione Sim para sair do usuário atual.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="?sess=logout" class="btn btn-primary btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
		
		<!-- Classe BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="classe">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span><strong>Sair</strong> ?</div>
                    <div class="mb-content">
                        <p>Tem certeza que deseja sair?</p>                    
                        <p>Pressione Não se quiser continuar. Pressione Sim para sair do usuário atual.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="?sess=logout" class="btn btn-primary btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Classe BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="js/plugins.js"></script>   		
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->  

<!--  Iclude Paginas -->

<?
}
else
{

    $charDat = $dirUserData . ( $func->numDir($CHAR) ) . "/" . $CHAR . ".dat";

    if(file_exists($charDat) && ( (filesize($charDat)==16384) || (filesize($charDat)==111376) || (filesize($charDat)==220976) ) )
    {

        $fOpen = fopen($charDat, "r");
        $fRead =fread($fOpen,filesize($charDat));
        @fclose($fOpen);

        // details
        $charLevel = substr($fRead,0xc8,1);
        $charClass = substr($fRead,0xc4,1);
        $charName = trim(substr($fRead,0x10,15),"\x00");
        $charID = trim(substr($fRead,0x2c0,10),"\x00");

        if( (strtolower($charID)==strtolower($_SESSION["ID"]))  )

        {

            if($CHAR==$charName)
            {

                switch (ord($charClass))
                {
                    case 1: $class = 'Fighter'; break;
                    case 2: $class = 'Mechanician'; break;
                    case 3: $class = 'Archer'; break;
                    case 4: $class = 'Pikeman'; break;
                    case 5: $class = 'Atalanta'; break;
                    case 6: $class = 'Knight'; break;
                    case 7: $class = 'Magician'; break;
                    case 8: $class = 'Priestess'; break;
                }

                $_SESSION["charDir"]=$charDat;
                $_SESSION["charNum"]=$func->numDir($CHAR);
                $_SESSION["charID"]=$charID;
                $_SESSION["charName"]=$charName;
                $_SESSION["charLevel"]=ord($charLevel);
                $_SESSION["charClass"]=$class;


				if ($_POST["vaibank"] == "1") {
    			header("location: index.php?sess=bank");
    			} else {
				header("location: index.php");
				}


            }
            else
            {
                $expName=explode("\x00",$charName);

                $fRead=false;
                $fOpen = fopen($charDat, "r");
                while (!feof($fOpen)) {
                @$fRead = "$fRead" . fread($fOpen, filesize($charDat) );
                }
                fclose($fOpen);

                // Fill in 00 to left character
                $addOnLeft=false;
                $leftLen=32-strlen($expName[0]);
                for($i=0;$i<$leftLen;$i++)
                {
                    $addOnLeft.=pack("h*",00);
                }
                $writeName=$expName[0].$addOnLeft;

                $sourceStr = substr($fRead, 0, 16) . $writeName . substr($fRead, 48);
                $fOpen = fopen($charDat, "wb");
                fwrite($fOpen, $sourceStr, strlen($sourceStr));
                fclose($fOpen);


                echo "CLEAR UP YOUR FILE, RE-ENTER!";
            }


        }
        else
        {
            echo "ERRO ESTE CHAR NÃO É SEU, VOCÊ ESTA SENDO REDICIONADO.!";header("Location: index.php?sess=logout");
        }


    }
    else
    {
        echo "<div class='alert alert-danger text-center' role='alert'>
Personagem CORROMPIDO!
</div>";
    }

    echo "<center><a href=index.php>VOLTAR</a>";

}

?>	
    </body>
</html>