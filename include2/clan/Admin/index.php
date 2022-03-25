<?
ob_start('ob_gzhandler');
session_start();
header('p3p: CP="CAO PSA OUR"');

include_once "../configuraADM.php";
include_once "injection.php";


//Segurança para o PHP
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



if(!session_is_registered("gmfodoes"))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Priston Tale Origem</title>
    <meta name="keywords" content="priston tale,  mmo, mmorpg">
    <meta name="description" content="Origin Priston Tale">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
	<link rel="stylesheet" href="css/dexter.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</head>



<body id="LoginForm"><b>
<div class="container">
<h1 class="form-heading"></h1>
<div class="login-form">
<div class="main-div">
   <div class="panel">
   <h2><b>Painel de Administração Priston Tale Origem</b></h2>
   <p>Por favor entre com seu usuário e senha</p>
   </div>
<?
    if($_POST['action']!="Logar")
    {
?>
    <form method="post" class="form-horizontal" onSubmit="disabledBttn(this)" action="index.php">

        <div class="form-group">


            <input type="text" class="form-control" placeholder="Usuário" name="username"/>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" placeholder="Senha" name="password"/>

        </div>
        
        <button value="Logar" class="btn btn-primary">Login</button>
		<input type="hidden" name="action" value="Logar">

    </form>
    </div>
</div></div></div></b>
<?
     }
    else
    {
        $required=array(
            "IDADM"=>$_POST[username],
            "PWADM"=>$_POST[password],
        );

//Obtendo login e senha
$gmAPT =$_POST['username'];
$gmpassAPT = $_POST['password'];
$gmAPT = trim($gmAPT);
$gmpassAPT = trim($gmpassAPT);


if (anti_sql($gmAPT) != 0 || anti_sql($gmpassAPT) != 0) {
echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
} else {


        for($i=0;$i<count($required);$i++)
        {
            list($key,$value)=each($required);

            if(!$value)
                echo "<b>$key</b> is required<br>";
            else
                $chkArr[]=true;
        }

        if(count($chkArr)==count($required))
        {

            $connection = odbc_connect( $connection_string, $user, $pass );


            $gmAPT=$_POST[username];
            $query = "SELECT * FROM [ADM].[dbo].[loginGM] WHERE [idGM]='$gmAPT' AND [passGM]='$gmpassAPT'";
            $q = odbc_exec($connection, $query);

            $qt = odbc_do($connection, $query);
            $i = 0;
            while(odbc_fetch_row($qt)) $i++;

            if($i>0)
            {
                session_register("gmfodoes");
                $farr = odbc_fetch_array($q);

                $_SESSION["IDADM"]=$farr[idGM];
				$_SESSION["NICKGM"]=$farr[nickGM];
				$_SESSION["permissao"]=$farr[permissao];

      echo "<div class='notice notice-sucesso'>
			<strong>Dados Corretos!</strong> Aguarde.
			</div>";
            }
            else
       echo "<div class='notice notice-danger'>
			 <strong>Erro!</strong> Usuário ou Senha incorretos.
			 </div>
			<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>
";

        } else {
	
	echo "<div class='notice notice-danger'>
			 <strong>Erro!</strong> Usuário ou Senha incorretos.
			 </div>";
}

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";



    }
    //} Verifica pela GD fechamento
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
