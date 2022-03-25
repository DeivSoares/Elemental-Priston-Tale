<?if (PT!=1) exit;?>
<?

include_once "../configuraADM.php";
include_once "injection.php";
?>
<div class="notice notice-info">
Mudar o Nick
</div>
<form id="form1" name="form1" method="post" action="">

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>
<div class="form-group">
	<input type="text" class="form-control" name="antigo" id="antigo" placeholder="Nick" required/>
</div>
<div class="form-group">
	<input type="text" class="form-control" name="novo" id="novo" placeholder="Novo Nick" required/>
</div>         
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Alterar Nick!" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="troca" />
        
        </form>
<?
	if($_POST[acao] == "troca"){
$id =	$_POST['id'];
$antigo = $_POST['antigo'];
$novo = $_POST['novo'];
$pastaid = $func->numDir($antigo);
$pasta = $dirUserData . ( $func->numDir($antigo)) . "/" . $antigo . ".dat";
	$novonick=trim($func->char_filter(trim($novo)),"\x00");

                if(!$func->is_valid_string($novonick))
                {

                    $charInfo=$dirUserInfo . ($func->numDir($id)) . "/" . $id . ".dat";


                    if(file_exists($charInfo) && ( filesize($charInfo)==240) )
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
                            }
                            $writeName=$novonick.$addOnLeft;

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

                            rename($dirUserData . $pastaid . "/" . $antigo. ".dat", $dirUserData . ($func->numDir($novonick)) . "/" . $novonick. ".dat");

                            echo"<div class='notice notice-sucesso'>
<strong>Nick alterado com sucesso!</strong> O char <strong>$antigo</strong> agora se chama <strong>$novonick</strong>
</div>";
	
	
	}
                        else
                        {
                            echo "<div class='notice notice-danger'>
<strong>Erro!</strong> O nome escolhido para trocar j existe,por favor selecione outro.
</div>";
                        }

                    }
                    else
                    {
                        echo "<div class='notice notice-danger'>
<strong>Erro!</strong> A informação do char não existe ou está corrompida.
</div>";
                    }
                }
                else
                {
                    echo "<div class='notice notice-danger'>
<strong>Erro!</strong>Ppor favor no utilize caracteres especiais no nick do char.
</div>";
                }
	}
	
	
	
	
	?></td>
  </tr>
</table>
</body>
</html>
