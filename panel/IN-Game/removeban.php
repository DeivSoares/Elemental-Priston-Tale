<? 
 mb_http_output( "iso-8859-1" );
 ob_start("mb_output_handler");
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 if (ArcadeADM!=2) exit; 
if($_SESSION['permissao'] < 2){
?><br><br><br><H3><?echo "Por favor, procure o administrador. Voce nao tem acesso a essa area.";?></h3><?
exit;
}
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elemental PT - PrimeRPG.com </title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
</head>

<HEAD>

 <form  name="form_cad" method="post" action="index.php?sessadm=removeban" onSubmit="return verifica2()">

     <BR><BR><BR>  
                <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Sistema de Ban</font></b></td>
                  </tr>
				  
				  
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">ID:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                      <input name="id2" type="text" id="id2" size="20" maxlength="60"> 
  
  <select name="action"  class="imput1">

                        <option selected value="0">Desbanir</option>
                        <option value="0">Desbanir</option>
                        <option value="1">Banir</option>
						


                      </select>	                   </td>
             
				

			 </tr>

 	<tr>
  <td width="35%" align="right"><strong><font color="#000000"></font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                     <input name="acao" type="submit" id="acao" value="Enviar!">	                </td>
                </tr>	    
    </td>
	</table>
   </div>
 </form>
 <?php


include_once "incluir/configura.php";
//include_once "injection.php";


if(!$_POST[acao]!="Enviar!")

{

$username = $_POST['id2'];
$action=$_POST['action'];

if($username == '')
{ 
echo "<script>alert('Digite uma ID...');</script>";
exit();
}
		$connection = odbc_connect($connection_string, $user, $pass);

                    

					$query = "UPDATE [accountdb].[dbo].[".( strtoupper($username[0]) ) ."GameUser] SET [blockchk]='$action' where userid= '$username'";
					$q = odbc_exec($connection, $query);

				if($q){
			echo '<script>alert("Dados modificados com sucesso!");</script>';
			
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='1;URL=index.php?sessadm=removeban'>";
		}else{
			echo '<script>alert("Erro ao Modificar os dados!");history.go(-1);</script>';
			exit;
		}	


	}



 

?>
 </p>
 