<? 
 mb_http_output( "iso-8859-1" );
 ob_start("mb_output_handler");
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 if (ArcadeADM!=2) exit; 
if($_SESSION['permissao'] < 2){
?><br><br><br><H3><?echo "Por favor, procure o administrador. Voce nao tem acesso a essa area.";?></h3><?
exit;
}

include_once "incluir/configura.php";
//include_once "injection.php";

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

 <form  name="form_cad" method="post" action="index.php?sessadm=mudarclasse" onSubmit="return verifica2()">

     <BR><BR><BR>  
                <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Mudar personagens de classe</font></b></td>
                  </tr>
				  
				  
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">Nick:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                  <input name="nick" type="text" id="nick" size="20" maxlength="60">                    </td>
                </tr>
        <tr>
          <td>Escolha a classe:</td>
          <td><select name="newclasse" id="newclasse">
            <option <?=($_SESSION["charClass"]=="Fighter")?"selected":""?>>Fighter</option>
            <option <?=($_SESSION["charClass"]=="Mechanician")?"selected":""?>>Mechanician</option>
            <option <?=($_SESSION["charClass"]=="Archer")?"selected":""?>>Archer</option>
            <option <?=($_SESSION["charClass"]=="Pikeman")?"selected":""?>>Pikeman</option>
            <option <?=($_SESSION["charClass"]=="Atalanta")?"selected":""?>>Atalanta</option>
            <option <?=($_SESSION["charClass"]=="Knight")?"selected":""?>>Knight</option>
            <option <?=($_SESSION["charClass"]=="Magician")?"selected":""?>>Magician</option>
            <option <?=($_SESSION["charClass"]=="Priestess")?"selected":""?>>Priestess</option>

		
                  </select></td>
        </tr>
		
 	<tr>
  <td width="35%" align="right"><strong><font color="#000000"></font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                     <input name="acao" type="submit" id="acao" value="Mudar de Classe!">	                </td>
                </tr>	    
    
    

      </table>
        </form>
    </td>
  


	
	
	<?

if(!$_POST[acao]!="Mudar de Classe!")


{
	$nick = $_POST['nick'];
	$classe = $_POST['newclasse'];
	if(empty($nick))
	{
	echo"<b><center><font color='red'>preencha todos os campos!";
	}else{
	$pasta = $dirUserData.$func->numDir($nick)."/".$nick.".dat";	
	$fp = fopen($pasta,"r");
		$dados = fread($fp,filesize($pasta));
		$classe_char = substr($dados,0xbc,1);
		
		switch (ord($classe_char))
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
	$fRead=false;
                $fOpen = fopen($pasta, "r");
                while (!feof($fOpen)) {
                @$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                }
                fclose($fOpen);

                $bin = $func->char2Num($classe);

                $bina= pack("h*",$bin);

                // Change character class ----------------------------------------------------------------
                



				
				$sourceStr = substr($fRead, 0, 48) . ($func->charResetHair($classe, 1)) . substr($fRead, 69, 43) . ($func->charResetHair($classe, 2)) . substr($fRead, 136, 60) . $bina . substr($fRead, 197, 7) . ($func->charResetState($classe)) . substr($fRead, 224, 284) . ($func->charResetSkill()) . substr($fRead, 524, 0) . ($func->charResetMastery()) . substr($fRead, 556);
                $fOpen = fopen($pasta, "wb"); 
                fwrite($fOpen, $sourceStr, strlen($sourceStr));
                fclose($fOpen);
				
				
				
				


                
                echo "<b><center><font color='green'>O Char <u>$nick</u> agora pertence a classe <u>$classe</u>";
                echo "<b><center><font color='green'>Todos os seus pontos de status e skill foram resetados!!!";
	
	
	}
	}
	
	?></td>
  </tr>
</table>
</body>
</html>
