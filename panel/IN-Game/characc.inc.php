<? 
 mb_http_output( "iso-8859-1" );
 ob_start("mb_output_handler");
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 if (ArcadeADM!=2) exit; 
if($_SESSION['permissao'] < 2){
?><br><br><br><H3>


<?echo "Por favor, procure o administrador. Voce nao tem acesso a essa area.";?></h3><?
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

 <form  name="form_cad" method="post" action="index.php?sessadm=characc" onSubmit="return verifica2()">

     <BR><BR><BR>  
                <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Ver nomes de Chars em ID</font></b></td>
                  </tr>
				  
				  
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">ID:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                  <input name="id" type="text" id="id" size="20" maxlength="60">                    </td>
                </tr>

 	<tr>
  <td width="35%" align="right"><strong><font color="#000000"></font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                     <input name="acao" type="submit" id="acao" value="Pesquisar!">	                </td>
                </tr>	    
    
    

      </table>
        </form>
    </td>
  


	
	
	<?

if(!$_POST[acao]!="Enviar!")

{


$id = $_POST['id'];
$pesquisa = $dirUserInfo . ( $func->numDir($id)) . "/" . $id . ".dat";
	   if(empty($id)){
	   echo"<b><font color='red'><center>Preencha a ID</center></font></b>";
	   }else{
	   
		   if(!file_exists($pesquisa)){
		   echo"<font color='red'>o arquivo a ser pesquisado n&atilde;o existe!!!";
		   }else{
		  $abre = fopen($pesquisa,"r");
$dados = fread($abre,filesize($pesquisa));
$personagens=array(
                    
					"48" => trim(substr($dados,0x30,15)),
                    "80" => trim(substr($dados,0x50,15)),
                    "112"=> trim(substr($dados,0x70,15)),
                    "144"=> trim(substr($dados,0x90,15)),
                    "176"=> trim(substr($dados,0xb0,15)),
                );
				                 
            }
            
				@fclose($abre);



$conn = odbc_connect($connection_string,$user,$pass);
$query_all = "SELECT * FROM [accountdb].[dbo].[AllGameUser]  WHERE [userid]='$id'";
$q_all = odbc_exec($conn, $query_all);
                    $qt_all = odbc_do($conn, $query_all);

                    odbc_fetch_row($qt_all);
					$estado_c = odbc_result($qt_all,12);


					
					
                    ?>



<table width="800" border="2" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Nick dos personagens</font></b></td>
                  </tr>
	<font color="#FF0000">
    <td><?
	if(count($personagens)>0)
                {
	
	foreach($personagens as $chave=>$valor)
					 {
					echo "<b>ID: $id - Nick: $valor&nbsp;&nbsp;";?><BR><?
                    }
					}
					?></td></font></br>

</table>
</body>
</html>

<?
}
}

?>
