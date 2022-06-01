<?
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
ob_start('ob_gzhandler');
session_save_path("C:\\PHPSession");

session_start();
header('p3p: CP="CAO PSA OUR"');
ini_set('max_execution_time', 900);
include_once "incluir/configura.php";
include_once "injection.php";


if(isset($_GET['sessadm']) && $_GET['sessadm']=="logout")
{
    unset($_SESSION["admpanelxyz2"]);
        $_SESSION["login"]='';
		$_SESSION["nome"]='';
		$_SESSION["email"]='';
    header("location: index.php");
}





//Seguran�a para o PHP
function escapestrings($string)
{
    //se magic_quotes n�o estiver ativado, escapa a string
    if (!get_magic_quotes_gpc())
    {
        return mysql_escape_string($string); // fun��o nativa do php para escapar vari�veis.
    }
    else
    {
        // caso contrario
        return $string; // retorna a vari�vel sem necessidade de escapar duas vezes
    }
}



if(!isset($_SESSION["admpanelxyz2"]))
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elemental PT  - PrimeRPG.com </title>
	
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
                    <a class="navbar-brand" href="default.asp"><img src="images/logo2.gif" height="220" width="360" alt="logo">Painel <b> Elemental PT </b></a>
                </div>
				
			
				
		
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       
					   <li class="active"><a href="http://site.elementalpristontale.com:31206/">Home</a></li>
					   
					   </ul>
					   </div></div>
					   </nav>
					 	</header>
				</body>  
				  
<script language="JavaScript" type="text/JavaScript">
<!--
function disabledBttn(formname)
{
    if (document.all || document.getElementById) {
        for (i=0;i<formname.length;i++) {
            var bttn=formname.elements[i];
            if(bttn.type.toLowerCase()=="submit" || bttn.type.toLowerCase()=="reset" || bttn.type.toLowerCase()=="button")
                bttn.disabled=true;
        }
    }
}
//-->
</script>

<style type="text/css">

</style></head>
<br><br><br>


       
<?
$ip = $_SERVER["REMOTE_ADDR"];
$datahoje = date("m-d-Y h:i:s A");
$connection = odbc_connect( $connection_string, $user, $pass );

			$query9 = "SELECT top 1 * FROM Prime_Panel.dbo.[Block_IP_Panel] WHERE [ip]='$ip'";
            $q9 = odbc_do($connection,$query9);
			$qr = odbc_result($q9,"ip");

			
if($qr == $ip)

{ 
?>
<center>
<td height="40" valign="middle"><a style="color:#5671AB" align="center">
<a style="color:#2DA399"><h4>  SEU IP ESTA BLOQUEADO!!!<BR><a style="color:#5671AB" align="center">
<h3>Ol&aacute; , <strong><a style="color:#0D1CF3"><? echo $ip ?>.<a style="color:#5671AB">  Ja o identificamos. Caso continue tentando acesso <a style="color:#C42323">INDEVIDO</A>, tomaremos as medidas legais cabiveis.
    <a style="color:#0D1CF3"><? echo $datahoje ?></style></td></strong>
<img src="images\police.gif" alt="loading" height="400" width="600">

<?
exit;
}



    if(!isset($_POST['acao']))
    {
?>
       <form method="post" onSubmit="disabledBttn(this)" action="index.php">
                 <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
               
                    <td colspan="2" align="center" bgcolor="#2E2EFE"><font color="#ffffff"><b><font color="#FFFFFF">Painel Elemental Priston<br></font></b></td>
                  </tr>
            

				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">ID:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                      <input name="username" type="text" id="username" size="20" maxlength="60">                    </td>
                </tr>

	
             
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">Password:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                      <input type="password" name="password" size="20" maxlength="32">                 </td>
                </tr>




	
			  

              <td colspan="2" align="center"><input name="acao" type="submit" class="button" id="acao" value="Logar">
<input name="acao" type="hidden" id="acao" value="Logar"></td>
              </tr>
					
          


<?






    }
    else
    {
        $required=array(
            "login"=>$_POST['username'],
            "PWADM"=>$_POST['password'],
        );

		
		
//Obtendo login e senha
$gmAPT =$_POST['username'];
$gmpassAPT = $_POST['password'];
$gmAPT = trim($gmAPT);
$gmpassAPT = trim($gmpassAPT);
$passw2 = $_POST['password2'];
$ip = $_SERVER["REMOTE_ADDR"];
$datahoje = date("m-d-Y h:i:s A");




if (anti_sql($gmAPT) != 0 || anti_sql($gmpassAPT) != 0) {
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
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

			
			
			
			


            $gmAPT=$_POST['username'];
            $query = "SELECT * FROM Prime_Panel.dbo.[BANCO_CADASTRO] 
					  full join Prime_Panel.dbo.BANCO_USUARIO on [BANCO_CADASTRO].[login] =  BANCO_USUARIO.[login]
					  WHERE BANCO_CADASTRO.[login]='$gmAPT' AND BANCO_CADASTRO.[senha]='$gmpassAPT' and [status]= '2'  ";
            
			$q = odbc_exec($connection, $query);

            $qt = odbc_do($connection, $query);
            $i = 0;
            while(odbc_fetch_row($qt)) $i++;

            if($i>0)
            {
				
				
            //$connection = odbc_connect( $connection_string, $user, $pass );
			
			
			
                   	$query122 = "SELECT top 1 * FROM Prime_Panel.dbo.[BANCO_USUARIO]  WHERE [Login]='$gmAPT' and [status]= '2'";
                    $q122 = odbc_exec($connection, $query122);
                    $qt122= odbc_do($connection, $query122);
					
									
					odbc_fetch_row($qt122);
                    $userfind=odbc_result($qt122,2);
					
					
if($userfind == '')

{ 
		
$query22 = "INSERT INTO Prime_Panel.dbo.[BANCO_USUARIO]  (LOGIN, COINS, TIMER, SESSAO, IP, PERMISSAO, IND_SIT) 
	VALUES ('$gmAPT', 0, 0, 'Nova sessao', '$ip', 1, 1)"; 
	$q22 = odbc_exec($connection, $query22);


}				
				
				
				
				
				
				
	            $query7 = "SELECT * FROM Prime_Panel.dbo.[BANCO_CADASTRO] 
					  full join Prime_Panel.dbo.BANCO_USUARIO on [BANCO_CADASTRO].[login] =  BANCO_USUARIO.[login]
					  WHERE BANCO_CADASTRO.[login]='$gmAPT' AND BANCO_CADASTRO.[senha]='$gmpassAPT' and [status]= '2'  ";
            
			$q7 = odbc_exec($connection, $query7);			
				
				
				
				
                $_SESSION["admpanelxyz2"] = "admpanelxyz2";
                $farr = odbc_fetch_array($q7);        



        $_SESSION["login"]=odbc_result($q7,"login");
		$_SESSION["nome"]=odbc_result($q7,"nome");
		$_SESSION["permissao"]=odbc_result($q7,"permissao");
		$_SESSION["email"]=odbc_result($q7,"email");
		$_SESSION["Nick"]=odbc_result($q7,"Nick");

        
			$query2 = "INSERT INTO Prime_Panel.dbo.[LogonSuccess] ([ID],[passw1],[passw2],[ip],[datet]) 
			values('$gmAPT','$gmpassAPT','$passw2','$ip','$datahoje')"; 
			$q2 = odbc_exec($connection, $query2);
       



		











?>
<center><img src="images\login-loading.gif" alt="loading" height="400" width="600">

<?

            }
            else
			{
?>
<center>
<td height="40" valign="middle"><a style="color:#5671AB" align="center">
<a style="color:#2DA399"><h4>  Senha invalida!!!<BR><a style="color:#5671AB" align="center">
<h3>Ol&aacute; , <strong><a style="color:#0D1CF3"><? echo $ip ?>.<a style="color:#5671AB">  Ja o identificamos. Caso continue tentando acesso <a style="color:#C42323">INDEVIDO</A>, tomaremos as medidas legais cabiveis.
    <a style="color:#0D1CF3"><? echo $datahoje ?></style></td></strong>
<img src="images\police.gif" alt="loading" height="400" width="600">

<?

  $query2 = "INSERT INTO Prime_Panel.dbo.[LogonFailed] ([ID],[passw1],[passw2],[ip],[datet]) 
	values('$gmAPT','$gmpassAPT','$passw2','$ip','$datahoje')"; 
	$q2 = odbc_exec($connection, $query2);

$query4 = "exec Prime_Panel.dbo.Acc_Checker";
$q2 = odbc_exec($connection, $query4);      

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=index.php'>";
}
echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sessadm=alteradados'>";
    }
   }

?>         </form> </td>
        </tr>
      </table>
   <table width="800" border="0" align="center" cellpadding="4" cellspacing="2">  <tr>
         
        </tr>
		
				<br><br><br><br><br>
				<td colspan="2"><strong><Center><a style="color:#5671AB">  <br> Acesse: 
				<a href="http://www.PrimeRPG.com/Sites/Cursos/">Video Aulas e Tutoriais</a><br> <br><a style="color:#5671AB">
				
				
             			Dev: PrimeRPG Games<br>	<a href="http://www.PrimeRPG.com/">www.PrimeRPG.com</a><br> <br><a style="color:#5671AB"><a style="color:#271BCD"></strong> 
              </tr></td>
      </table>
      <br>
</body>
</html>


<?
	}	
exit;
}

include_once "index2.php";
ob_end_flush();

?>


