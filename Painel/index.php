<?
/*----------------------------------------------------------------------
Painel Player Versão 1.0
Desenvolvidor Por: DexteR (lecosb@gmail.com)
----------------------------------------------------------------------*/
ob_start('ob_gzhandler');

session_start();

header('p3p: CP="CAO PSA OUR"');
//$erro=error_reporting(0);
include_once "incluir/configura.php";
include_once "injection.php";

include_once "verifica_tempo.php";



if($_GET['sess']=="logout")
{
 session_destroy();
   /* $_SESSION["charDir"]='';
    $_SESSION["charNum"]='';
    $_SESSION["charID"]='';
    $_SESSION["charName"]='';
    $_SESSION["charLevel"]='';
    $_SESSION["charClass"]='';*/
    header("location: index.php");
}

//Segurança para o PHP

//foreach ($_GET as $key=>$getvar){ $_GET[$key] = mssql_escape($getvar); } 
//foreach ($_POST as $key=>$postvar){ $_POST[$key] = mssql_escape($postvar); } 


function escapestrings($string)
{
    //se magic_quotes não estiver ativado, escapa a string
    if (!get_magic_quotes_gpc())
    {
        return mysql_escape_string($string); // função nativa do php para escapar variáveis.
    }
    else
    {
        // caso contrario
        return $string; // retorna a variável sem necessidade de escapar duas vezes
    }
}



if(!$_SESSION["ID"])
{
?>
<?
header("Content-type:text/html;charset=UTF-8");
?> 
<!DOCTYPE html>
<html lang="pt-br" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Painel de Controle ElementalPT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="../images/favicons/favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>

        <header>
            <img src="../images/banner2.png" alt="Logo Elemental Priston Tale" style="width: 200px;">
        </header>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Painel de Controle</strong>, ElementalPT</div>
<?
    if($_POST['action']!="Logar")
    {
	require	'gerarrand.php';
	$strRand = gerar_string_randonica();
?> 
                    <form method="post" class="form-horizontal" onSubmit="disabledBttn(this)" action="index.php">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Usuário" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Senha" name="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="cadtermos.php" class="btn btn-link btn-block">Cadastrar</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" value="Logar">Logar</button>
                        </div>
                    </div>
					<input type="hidden" name="action" value="Logar">
                    </form>
                </div>
                <div class="login-footer">
                    <div>
                        &copy; Elemental Priston Tale - 2022
                    </div>
                </div>
            </div>
            
        </div>
<?
    }
    else
    {
        $required=array(
            "o Usuário"=>$_POST[username],
            "a Senha"=>$_POST[password],
        );

//Obtendo login e senha
$usuarioAPT = anti_sqli(escapestrings($_POST['username']));
$senhaAPT = anti_sqli(escapestrings($_POST['password']));
$usuarioAPT = trim($usuarioAPT);
$senhaAPT = trim($senhaAPT);


if (anti_sql($usuarioAPT) != 0 || anti_sql($senhaAPT) != 0 ) {
echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
} else {


        for($i=0;$i<count($required);$i++)
        {
            list($key,$value)=each($required);

            if(!$value)
                echo "<div class='login-success'>
 <span> Você esqueceu de informar $key!</span>
 <meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
            else
                $chkArr[]=true;
        }

        if(count($chkArr)==count($required))
        {
		
            $connection = odbc_connect( $connection_string, $user, $pass );
			
            $querysenha = "SELECT * FROM [accountdb].[dbo].[AllPersonalMember] WHERE [Userid]='$usuarioAPT'";
            $qsenha = odbc_exec($connection, $querysenha);

            $qtsenha = odbc_do($connection, $querysenha);
            $i2 = 0;
            while(odbc_fetch_row($qtsenha)) $i2++;
                        $email=odbc_result($qtsenha,12);

            if($i2>0)
            {

            $usernameP=anti_sqli($_POST[username]);
            $query = "SELECT * FROM [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."GameUser] WHERE [userid]='$usuarioAPT' AND [Passwd]='$senhaAPT'";
            $q = odbc_exec($connection, $query);

            $qt = odbc_do($connection, $query);
            $i = 0;
            while(odbc_fetch_row($qt)) $i++;
                        $email=odbc_result($qt,12);

            if($i>0)
            {

		///////////////////////////////
                session_register("usercode");
                $farr = odbc_fetch_array($q);

                $_SESSION["ID"]=$farr[userid];

      echo "<div class='login-success'>
 <span> Dados Corretos, Aguarde!</span>";
            }
            else
       echo "<div class='login-success'>
 <span> Usuário ou Senha incorretos!</span>";

        } else {
	
	echo "<div class='login-success'>
 <span> Usuário ou Senha incorretos!</span>";;
}

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";



    }
    //} Verifica pela GD fechamento
    }
	}


?>
<?
exit;
}
require "index2.php";
ob_end_flush();
?>        
    </body>
</html>






