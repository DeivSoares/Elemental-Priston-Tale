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
<?
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

 <form  name="form_cad" method="post" action="index.php?sessadm=mudarnick" onSubmit="return verifica2()">

     <BR><BR><BR>  
                <td><table width="800" border="0" align="center" cellpadding="4" cellspacing="2">
                  <tr>
                    <td colspan="2" align="center" bgcolor="#D52E2E"><font color="#ffffff"><b><font color="#FFFFFF">Mudar nick do personagem</font></b></td>
                  </tr>
				  
				  
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">ID:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                  <input name="id" type="text" id="id" size="20" maxlength="60">                    </td>
                </tr>
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">Nick Antigo:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                  <input name="antigo" type="text" id="antigo" size="13" maxlength="12">                    </td>
                </tr>
		
				  <tr>
  <td width="35%" align="right"><strong><font color="#000000">Nick Novo:</font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                  <input name="novo" type="text" id="novo" size="13" maxlength="12">                    </td>
                </tr>
		

 	<tr>
  <td width="35%" align="right"><strong><font color="#000000"></font><font color="#666666" size="1"><BR></font></strong></td>
  <td width="65%">                     <input name="acao" type="submit" id="acao" value="Trocar!">	                </td>
                </tr>	    
    
    
<tr>
<td width="35%" align="center">
  
	
	
	<?

if(!$_POST[acao]!="Enviar!")

{



$id =	$_POST['id'];
$antigo = $_POST['antigo'];
$novo = $_POST['novo'];
$pastaid = $func->numDir($antigo);
$pasta = $dirUserData . ( $func->numDir($antigo)) . "/" . $antigo . ".dat";
	$novonick=trim($func->char_filter(trim($novo)),"\x00");
	
	
	
if($id == "")

{ 
echo"<script>alert ('Favor digitar a ID')</script>";
exit();
}

if($antigo == "")

{ 
echo"<script>alert ('Favor digitar o nick antigo')</script>";
exit();
}

if($novo == "")

{ 
echo"<script>alert ('Favor digitar o nick novo')</script>";
exit();
}


                if(!$func->is_valid_string($novonick))
                {

                    $charInfo=$dirUserInfo . ($func->numDir($id)) . "/" . $id . ".dat";


                    if(file_exists($charInfo) && ( filesize($charInfo)==400) )
                    {

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
                          
                        );

                        $charDat = $dirUserData . ($func->numDir($novonick)) . "/" . $novonick . ".dat";

                        if(!file_exists($charDat))
                        {

                            unset($flagArr);
                            $flagArr=array();

                            $sessNameExp=explode("\x00",$antigo);

                            foreach($charNameArr as $key=>$value)
                            {
                                $expValue=explode("\x00",$value);
                                if($sessNameExp[0]==$expValue[0])
                                    $flagArr[]=$key;
                            }

                            // point to each information line
                            $startPoint=$flagArr[0];
                            $endPoint=$startPoint+15;
        // Write info

                            $fRead=false;
                            $fOpen = fopen($charInfo, "r");
                            while (!feof($fOpen)) {
                            @$fRead = "$fRead" . fread($fOpen, filesize($charInfo) );
                            }
                            fclose($fOpen);

                            // Fill in 00 to left character
                            $leftLen=15-strlen($novonick);
                            for($i=0;$i<$leftLen;$i++)
                            {
                                $addOnLeft.=pack("h*",00);
								$addOnLeft2.=pack("h*",00000000);
                            }
                            for($i=0;$i<(15-strlen($id));$i++)
                            {
                                $addOnLeftID.=pack("h*",00);
								$addOnLeft2.=pack("h*",00000000);
                            }
                            $writeName=$novonick.$addOnLeft;
							$writeID=$id.$addOnLeftID;
							
                            $sourceStr = substr($fRead, 0, $startPoint) . $writeName . substr($fRead, $endPoint);

                            $fOpen = fopen($charInfo, "wb"); 
                            fwrite($fOpen, $sourceStr, strlen($sourceStr));
                            fclose($fOpen);


        // Write data
                            $fRead=false;
                            $fOpen = fopen($pasta, "r");
                            while (!feof($fOpen)) {
                            @$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                            }
                            fclose($fOpen);

                            $sourceStr = substr($fRead, 0, 16) . $writeName . substr($fRead, 31);
                            $fOpen = fopen($pasta, "wb"); 
                            fwrite($fOpen, $sourceStr, strlen($sourceStr));
                            fclose($fOpen);
							
							
							
							
							//$fRead=false;
                            //$fOpen = fopen($pasta, "r");
                           // while (!feof($fOpen)) {
                            //@$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                            //}
                            //fclose($fOpen);
							
							//$sourceStr3 = substr($fRead, 0, 720) . $addOnLeft2 . substr($fRead, 735);
                            //$fOpen = fopen($pasta, "wb"); 
                            //fwrite($fOpen, $sourceStr3, strlen($sourceStr3));
                            //fclose($fOpen);
							
							
							
							//$fRead=false;
                            //$fOpen = fopen($pasta, "r");
                            //while (!feof($fOpen)) {
                            //@$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                            //}
                            //fclose($fOpen);
							
							//$sourceStr2 = substr($fRead, 0, 728) . $writeID . substr($fRead, 743);
                            //$fOpen = fopen($pasta, "wb"); 
                            //fwrite($fOpen, $sourceStr2, strlen($sourceStr2));
                            //fclose($fOpen);
							
							
							

                            rename($dirUserData . $pastaid . "/" . $antigo. ".dat", $dirUserData . ($func->numDir($novonick)) . "/" . $novonick. ".dat");
							

                echo"<b><center><font color='green'>Nick alterado com sucesso!</font><br>o char <u>$antigo</u> agora se chama <u>$novonick</u>";

	}
                        else
                        {
                            echo "<b><center><font color='red'>o nome escolhido para trocar j existe,por favor selecione outro!!!";
                        }

                    }
					
                    else
                    {
						//echo $id;
                        echo "<b><center><font color='red'>a informao do char no existe ou esta corrompida!";
                    }
                }
                else
                {
                    echo "<b><center><font color='red'>por favor no utilize caracteres especiais no nick do char!";
                }
	}
	
	
	
	
	?>
	 </td> </tr>	    
	      </table>
        </form>
    </td>
</body>
</html>
