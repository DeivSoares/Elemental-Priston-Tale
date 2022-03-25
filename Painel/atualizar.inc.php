<? if (DexteR!=1) exit;?>
<?
/*----------------------------------------------------------------------
Painel Player Versão 0.4
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Editado Por: Jiraya (richard.cva21@hotmail.com(
----------------------------------------------------------------------*/

include_once "incluir/configura.php";
include_once "injection.php";

if(anti_sqli($_POST[action]!="changepw"))
{

$username=$_SESSION["ID"];

                    $connection = odbc_connect( $connection_string, $user, $pass );
                    $query = "SELECT * FROM [accountdb].[dbo].[AllPersonalMember]  WHERE [userid]='$username'";
                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);

                    odbc_fetch_row($qt);
                    $nome=odbc_result($qt,6);
                    $sobrenome=odbc_result($qt,7);
                    $email=odbc_result($qt,12);
					$cidade=odbc_result($qt,16);
					$estado=odbc_result($qt,17);
					$sexo=odbc_result($qt,28);
					$nasc_dia=odbc_result($qt,25);
					$nasc_mes=odbc_result($qt,26);
					$nasc_ano=odbc_result($qt,27);
					$perg=odbc_result($qt,4);
					$resp=odbc_result($qt,5);
                    if(!$email)
   		                 {
					     echo "";
					     }

?>
            <h4 class="title text-left"><i class="pe-7s-angle-right"></i>Alterar Dados</h4><hr />
            <form  name="form_cad" method="post" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>" onSubmit="return verifica2()">
									<div class="row">
									<div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ID</label><br>
                                                <input type="hidden" name="username" class="form-control" value="<?=$_SESSION["ID"]?>">
												<?=$_SESSION["ID"]?>
												
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Senha Atual do Jogo</label>
                                                <input type="password" name="oldpwd" size="20" maxlength="15" class="form-control">
												
                                            </div>
											
                                        </div>
										
									</div>
									<div class="row">
									<div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nova Senha do Jogo</label>
                                                <input type="password" name="pwd1" size="20" maxlength="15" class="form-control">
												
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Repete nova senha</label>
                                                <input type="password" name="pwd2" size="20" maxlength="15" id="pwd2" class="form-control">
												
                                            </div>
                                        </div>
										
									</div>
									<div class="row">
									<div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                 <input name="nome" type="text" id="nome" value="<? echo $nome; ?>" size="20" maxlength="32" class="form-control" />
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sobrenome</label>
                                                 <input name="sobrenome" type="text" id="sobrenome" value="<? echo $sobrenome; ?>" size="20" maxlength="32" class="form-control">
                                            </div>
                                        </div>
									</div>
									<div class="row">
									<div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                 <input name="email" type="text" id="email" value="<? echo $email; ?>" size="20" maxlength="100" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Repete E-mail</label>
                                                <input name="email2" type="text" id="email2" value="<? echo $email; ?>" size="20" maxlength="100" class="form-control">
                                            </div>
                                        </div>
									</div><br/>
									
                          <center>              
                         <input type="submit" value="Atualizar dados" class="btn btn-primary">
                         <input type="hidden" name="action" value="changepw">
              </center><br/>
            </form>

<?
            }
            else
            {
      
//Verificando se n&atilde;o vai ter injection no script
$senha0 = anti_sqli($_POST['oldpwd']);
$senha1 = anti_sqli($_POST['pwd1']);
$senha2 = anti_sqli($_POST['pwd2']);
$nome = anti_sqli($_POST['nome']);
$sobrenome = anti_sqli($_POST['sobrenome']);
$email = anti_sqli($_POST['email']);

if (anti_sql($chaveregistro) != 0 || anti_sql($senha0) != 0 || anti_sql($senha1) != 0 || anti_sql($senha2) != 0 || anti_sql($nome) != 0 || anti_sql($sobrenome) != 0 || anti_sql($email) != 0) {
echo "<div class='alert alert-warning text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
                                    <span><b> ElementalPT - </b> Erro, caracteres não permitidos foram digitados!</span>";
} else {



                    $required=array(
                    "Senha Antiga"=>$_POST[oldpwd],
                    "Nova Senha"=>$_POST[pwd1],
                    "Repete Nova Senha"=>$_POST[pwd2],
                    "Seu Nome"=>$_POST[nome],
                    "Sobrenome"=>$_POST[sobrenome],
                    "E-mail"=>$_POST[email],
                    "Repete E-mail"=>$_POST[email2],
                    "Dia que nasceu"=>$_POST[nasc_dia],
                    "Mês que nasceu"=>$_POST[nasc_mes],
                    "Ano que nasceu"=>$_POST[nasc_ano],
                );

                for($i=0;$i<count($required);$i++)
                {
                    list($key,$value)=each($required);

                    if(!$value)
                        echo "<div class='alert alert-danger text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
<span><b> ElementalPT - </b> $key</b> é obrigatório</span>";
                    else
                        $chkArr[]=true;
                }

                if(count($chkArr)==count($required))
                {

                    if($_POST[pwd1]==$_POST[pwd2])
                    {
                        $connection = odbc_connect( $connection_string, $user, $pass );
						
						$queryrpt = "SELECT * FROM [accountdb].[dbo].[AllPersonalMember] WHERE [userid]='$_SESSION[ID]'";
                        $qrpt = odbc_exec($connection, $queryrpt);

                        $qtrpt = odbc_do($connection, $queryrpt);
                        $irpt = 0;
                        while(odbc_fetch_row($qtrpt)) $irpt++;

                        if($irpt>0)
                        {

                        $usernameP=($_SESSION["ID"]==$_POST[username])?$_SESSION["ID"]:$_POST[username];

                        $query = "SELECT * FROM [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."GameUser] WHERE [userid]='$usernameP' AND [Passwd]='$_POST[oldpwd]'";
                        $q = odbc_exec($connection, $query);

                        $qt = odbc_do($connection, $query);
                        $i = 0;
                        while(odbc_fetch_row($qt)) $i++;

                        if($i>0)
                        {

                            if(!$func->is_valid_string($_POST[pwd1]))
                            {

                   	$nome = $_POST[nome];
                    $sobrenome = $_POST[sobrenome];
                    $email = $_POST[email];
                    $nasc_dia = $_POST[nasc_dia];
                    $nasc_mes = $_POST[nasc_mes];
                    $nasc_ano = $_POST[nasc_ano];


                    //Tabela separada dos players por letras iniciais
					$query = "UPDATE [accountdb].[dbo].[".( strtoupper($usernameP[0]) ) ."GameUser] SET [Passwd]='$_POST[pwd1]' WHERE [userid]='$usernameP' AND [Passwd]='$_POST[oldpwd]'";
                    $q = odbc_exec($connection, $query);

					//Tabela All User
                    $query2 = "UPDATE [accountdb].[dbo].[AllGameUser] SET [Passwd]='$_POST[pwd1]' WHERE [userid]='$usernameP' AND [Passwd]='$_POST[oldpwd]'";
					 $q2 = odbc_exec($connection, $query2);
					//Tabela All Peronagem

                    $query3 = "UPDATE [accountdb].[dbo].[AllPersonalMember] SET [Passwd]='$_POST[pwd1]',[CUserName1]='$nome',[CUserName2]='$sobrenome',[Email]='$email',[DiaNasc]='$nasc_dia',[MesNasc]='$nasc_mes',[AnoNasc]='$nasc_ano',[ip]='$ip' WHERE [userid]='$usernameP' AND [Passwd]='$_POST[oldpwd]'";
					$q3 = odbc_exec($connection, $query3);



							     if ($q && $q2 && $q3)
                                {
echo "<div class='alert alert-success text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php'>×</a></button>
                                    <span><b> ElementalPT - </b> Todos os dados foram atualizados com sucesso!</span>";
                                //Apagando arquivo da chave
                                }
                            }
                            else
                            {
                                    echo "<div class='alert alert-danger text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
<span><b> ElementalPT - </b> Tente Novamente!</span>";
                            }
							
					   	}
                        else
                        {
									echo "<div class='alert alert-danger text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
<span><b> ElementalPT - </b> Senha Antiga está incorreta!</span>";
							}

                     	}
                        else
                        {
                           			 echo "<div class='alert alert-danger text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
<span><b> ElementalPT - </b> Senha Antiga está incorreta!</span>";
                             }
							 
						}
                    	else
                   		{
                       				 echo "<div class='alert alert-danger text-center' role='alert'>
<button type='button' aria-hidden='true' class='close'><a href='index.php?sess=mudasenha'>×</a></button>
<span><b> ElementalPT - </b> Tente Novamente!</span>";

                    }

                }

                echo "";
            }

			}

 
?>