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

 <form  name="form_cad" method="post" action="index.php?sessadm=verid" onSubmit="return verifica2()">

     <BR><BR><BR>  
                <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Saber ID pelo Nick do personagem</font></b></td>
                  </tr>

				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">Nick do player:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                      <input name="nick" type="text" id="nick" size="20" maxlength="60">                    </td>
                </tr>
	 <tr>
  <td width="35%" align="right"><strong><font color="#000000"></font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                      <input type="submit" name="acao" id="acao" value="Pegar">                 </td>
                </tr>			  

</table>
</form>
  <p><a style="color:#ffffff">

  <?
if ($_POST['acao'] == "Pegar") {
  
  
 include_once 'incluir/configura.php'; 
  

 



 
  		$nick=$_POST['nick'];
        $charDatPRE = $dirUserData . ( $func->numDir($nick) ) . "/" . $nick . ".dat";
        
	if (file_exists($charDatPRE)) {


		$fOpen = fopen($charDatPRE, "r");
        $fRead =fread($fOpen,filesize($charDatPRE));
        fclose($fOpen);
		
        $charIDPRE = trim(substr($fRead,0x2ec,18),"\x00");
		$pastaPRE = $func->numDir($charIDPRE);
		$pasta = $func->numDir($charIDPRE);

								} else {
									echo $dirUserData;
								$charIDPRE = "O nick $nick não tem uma ID, verifique novamente que está colocando um nick incorreto!";
								
								}	
?>  

<table width="100%" border="4" align="center" cellpadding="4" cellspacing="2">
 <BR><BR><BR> <tr>
    <td height="100" align="center" bgcolor="#fffffe"><b>Id do Personagem:</b> <? echo $charIDPRE; ?></td>
</tr>
</table>
<? } ?>





