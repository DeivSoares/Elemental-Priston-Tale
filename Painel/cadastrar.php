<?
ob_start('ob_gzhandler');

session_start();

include_once "incluir/configura.php";
include_once "injection.php";

if (!$_POST['aceitatermos']) 
	{
	echo "<b><div align=\"center\"><img src=\"imgs/alerta.png\"><br><font color=red>Voc&ecirc;  tem que concordar com as regras do servidor<br> para poder fazer uma conta! </div><br><br>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=cadtermos.php'>";
	}
		else 
			{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>        
        <!-- META SECTION -->
        <title>Painel de Controle ElementalPT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>

<body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
<?
    if($_POST[action]!="signup")
    {
?>
					<form name="form_cad" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>" method="post" enctype="multipart/form-data" onSubmit="disabledBttn(this);return verifica()">
						<div class="form-group">
						<div class="row">
									<div class="col-md-3"><br/><font color="#fff">ID</div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input name="username" size="20" maxlength="15" type="text" class="form-control">
                                            </div>
                                        </div>
										
									</div><br/>
									<div class="row">
									<div class="col-md-3"><br/><font color="#fff">Senha</div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input name="password" size="20" maxlength="15" type="password" class="form-control">
                                            </div>
                                        </div>
										
									</div><br/>
									<div class="row">
									<div class="col-md-3"><br/><font color="#fff">Nome</div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input name="nome" size="20" maxlength="32" id="nome" type="text" class="form-control">
												
                                            </div>
                                        </div>
									</div><br/>
									<div class="row">
									<div class="col-md-3"><br/><font color="#fff">Sobrenome</div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input name="sobrenome" size="20" maxlength="32" id="sobrenome" type="text" class="form-control">
                                            </div>
                                        </div>
										
									</div><br/>
									<div class="row">
									<div class="col-md-3"><br/><font color="#fff">E-mail:</div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input name="email" size="20" maxlength="100" id="email" type="text" class="form-control">
                                            </div>
                                        </div>
										
									</div><br/><center>
							<label>
                          <button class="btn btn-primary" type="submit">Registrar</button></center>
                          </label>

                            <input name="hidden" type="hidden" class="button" value="Registrar">
                            <input name="aceitatermos" type="hidden" class="button" id="aceitatermos" value="<? echo $_POST['aceitatermos']; ?>"></td>

                    <input type="hidden" name="action" value="signup">
				  
</div> 
</form>
 <?
    }
    else
    {

//Verificando se n&atilde;o vai ter injection no script

$login = anti_sqli(trim($_POST['username']));
$senha = anti_sqli(trim($_POST['password']));
$nome = anti_sqli(trim($_POST['nome']));
$sobrenome = anti_sqli(trim($_POST['sobrenome']));
$email = anti_sqli(trim($_POST['email']));

if (anti_sql($login) != 0 || anti_sql($senha) != 0 || anti_sql($nome) != 0 || anti_sql($sobrenome) != 0 || anti_sql($email) != 0 || anti_sql($resp) != 0) {
echo"<div class='alert alert-danger text-center'>
<span><b> (sinDS1 | sin29) - </b> Erro, caracteres n&atilde;o permitidos foram digitados! <br> N&atilde;o use UNDERLINE ( _ ) no Email ou em outro campo!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=cadtermos.php'>";
} else {

        $required=array(
            "Login"=>$_POST[username],
            "Senha do Jogo"=>$_POST[password],
			"E-mail"=>$_POST[email],
			"Nome"=>$_POST[nome],
			"Sobrenome"=>$_POST[sobrenome],
        );



        for($i=0;$i<count($required);$i++)
        {
            list($key,$value)=each($required);

            if(!$value)
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=cadtermos.php'>";
            else
                $chkArr[]=true;
        }

        if(count($chkArr)==count($required))
        {

            $connection = odbc_connect( $connection_string, $user, $pass );

            if(!$func->is_valid_string($_POST[username]) && !$func->is_valid_string($_POST[password]))
            {

                $usernameP=anti_sqli($_POST[username]);
                $query = "SELECT * FROM [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."GameUser] WHERE [userid]='$usernameP'";
                $q = odbc_exec($connection, $query);

                $qt = odbc_do($connection, $query);
                $i = 0;
                while(odbc_fetch_row($qt)) $i++;

                if($i>0)
                    echo"<div class='alert alert-danger text-center'>
<span><b> (sinDS1 | sin29) - </b> O Login <b>$_POST[username]</b> J� existe essa ID registrada!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=cadtermos.php'>";
                else
                {
				$ipnob = $_SERVER['REMOTE_ADDR'];

$ini = 0;
$executando_email = odbc_do($connection,$tabela_ip) or die (odbc_error());
if($ini>0){
echo '<div class="alert alert-warning text-center">
<span><b> (sinDS1 | sin29) - </b> Ol� <strong>'.$nome.'</font></strong>
voc� j� se registro em nosso Banco de Dados hoje, tente usar este sistema mais tarde!</span>
<meta HTTP-EQUIV="Refresh" CONTENT="2;URL=cadtermos.php">';
}else{
	
	

$email = anti_sqli($_POST['email']);

$tabela_email = "SELECT * FROM [accountdb].[dbo].[ALLPersonalMember] WHERE [email]='$email'";
$ini = 0;
$executando_email = odbc_do($connection,$tabela_email) or die (odbc_error());
while(odbc_fetch_row($executando_email)) $ini++;
if($ini>0){
echo'<div class="alert alert-warning text-center">
<span><b> (sinDS1 | sin29) - </b> J&aacute; existe o email <strong>'.$email.'</strong>
registrado em nosso Banco de Dados, favor informar outro diferente</span>
<meta HTTP-EQUIV="Refresh" CONTENT="2;URL=cadtermos.php">';
}else{



                    $datahoje = date("d-m-Y H:i:s");

                    $query = "INSERT INTO [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."GameUser] ([userid],[Passwd],[GPCode],[RegistDay],[DisuseDay],[inuse],[Grade],[EventChk],[SelectChk],[BlockChk],[SpecialChk],[Credit],[DelChk],[Channel]) values('" . $_POST[username] . "','" . $_POST[password] . "','PTP-RUD001','$datahoje','12-12-2020','0','U','0','0','0','0','0','0','" . $_SERVER['REMOTE_IP'] . "')";
                    $query2 = "INSERT INTO [accountdb].[dbo].[AllGameUser] ([userid],[Passwd],[GPCode],[RegistDay],[DisuseDay],[inuse],[Grade],[EventChk],[SelectChk],[BlockChk],[SpecialChk],[Credit],[DelChk],[Channel]) values('" . $_POST[username] . "','" . $_POST[password] . "','PTP-RUD001','$datahoje','12-12-2020','0','U','0','0','0','0','0','0','" . $_SERVER['REMOTE_IP'] . "')";

                   //Cadastrando Dados do user
                    $login = stripslashes($_POST['username']);
                    $pw = stripslashes($_POST['pw']);
                    $email = stripslashes($_POST['email']);
					$perg = stripslashes($_POST['perg']);
                    $resp = stripslashes($_POST['resp']);
                    $dn = stripslashes($_POST['dn']);
                    $nome = stripslashes($_POST['nome']);
                    $sobrenome = stripslashes($_POST['sobrenome']);
                    $sexo = stripslashes($_POST['sexo']);

                    $ip = $_SERVER["REMOTE_ADDR"];
                    $query3 = "INSERT INTO [accountdb].[dbo].[AllPersonalMember] ([PMNo],[Userid],[Passwd],[Question],[Reply],[CUserName1],[CUserName2],[Age],[Email],[Add1],[Add2],[Add3],[RegistDay],[DiaNasc],[MesNasc],[AnoNasc],[sexo],[ip],[pais]) VALUES ('0','" . $_POST[username] . "','" . $_POST[password] . "','$perg','$resp','$nome','$sobrenome','$dn','$email','$cidade','$estado','$amigo','$datahoje','$nasc_dia','$nasc_mes','$nasc_ano','$sexo','$ip','$pais')";
                    $query4 = "INSERT INTO [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."PersonalMember] ([PMNo],[Userid],[Passwd],[CUserName1],[CUserName2],[Email],[Add1],[Add2],[Add3],[RegistDay]) VALUES ('0','" . $_POST[username] . "','" . $_POST[password] . "','$nome','$sobrenome','$email','$cidade','$estado','$amigo','$datahoje')";

                    $q = odbc_exec($connection, $query);
                    $q2 = odbc_exec($connection, $query2);
                    $q3 = odbc_exec($connection, $query3);
                    $q4 = odbc_exec($connection, $query4);
                    if ($q && $q2 && $q3 && $q4)


echo"<div class='alert alert-success text-center'>
<span><b> (sinDS1 | sin29) - </b> Dados Cadastrados com sucesso!<br/>
ID - <b>$login<br/></b>
Nome - $nome $sobrenome<br/>
Email - $email</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";

              } }
 		}
            }else{
		echo '';
		}
		}
			else
                echo"<div class='alert alert-danger text-center'>
<span><b> (sinDS1 | sin29) - </b> POR FAVOR ENTRE NOVAMENTE COM ID E SENHA SEM UTILIZAR CARACTERES ESPECIAIS!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=cadtermos.php'>";

        }
       echo "";
    } }

?>     
</div>
</div>        
</div>
</body>
</html>
<?
exit;
ob_end_flush();
?>