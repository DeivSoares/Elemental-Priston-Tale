<?if (PT!=1)  exit;
if($_SESSION['permissao'] < 3){
echo "Voc� n�o tem permiss�o para acessar esta �rea";
exit;
}
?>
<div class="notice notice-info">
Mover o Char para outra conta
</div>
<form id="form1" name="form1" method="post" action="">

<div class="form-group">
	<input type="text" class="form-control" name="nick" id="nick" placeholder="Nick do Char" required/>
</div>

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID para onde o char vai" required/>
</div>

            <input type="submit" name="button" id="button" class="btn btn-primary" value="Mover char" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="move" />
 
        </form>
<?
	if($_POST[acao] == "move"){
	$id = $_POST['id'];
	$char = $_POST['nick'];
	$pasta = $dirUserData . ( $func->numDir($char)) . "/" . $char . ".dat";
	
$accMove=trim($func->char_filter(trim($id)),"\x00");

                if(!$func->is_valid_string($accMove))
                {

                    $charInfo=$dirUserInfo . ($func->numDir($accMove)) . "/" . $accMove . ".dat";

                    if(file_exists($charInfo) && ( filesize($charInfo)==240) )
                    {

                        $fRead=false;
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

                        $chkEmpArr=array();
                        $chkChar=array();
                        foreach($charNameArr as $key=>$value)
                        {
                            if(empty($value)) $chkEmpArr[]=$key;
                            else $chkChar[]=$key;
                        }

                        if(count($chkChar)<5)
                        {

                            // point to each information line
                            $startPoint=$chkEmpArr[0];
                            $endPoint=$startPoint+15;

                            // update account information for new account information-------------------------
                            // Fill in 00 to left character
                            $addOnLeft=false;
                            $leftLen=15-strlen($char);
                            for($i=0;$i<$leftLen;$i++)
                            {
                                $addOnLeft.=pack("h*",00);
                            }
                            $writeName=$char.$addOnLeft;

                            $fRead=false;
                            $fOpen = fopen($charInfo, "r");
                            while (!feof($fOpen)) {
                            @$fRead = "$fRead" . fread($fOpen, filesize($charInfo) );
                            }
                            fclose($fOpen);

                            $sourceStr = substr($fRead, 0, $startPoint) . $writeName . substr($fRead, $endPoint);
                            $fOpen = fopen($charInfo, "wb"); 
                            fwrite($fOpen, $sourceStr, strlen($sourceStr));
                            fclose($fOpen);


                            // empty character in account information-------------------------------------
                            $charInfo=$dirUserInfo . ($func->numDir($id)) . "/" . $id . ".dat";

                            $fRead=false;
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

                            $chkCharLine=array();
                            foreach($charNameArr as $key=>$value)
                            {
                                if($char==$value) $chkCharLine[]=$key;
                            }

                            // point to each information line
                            $startPoint=$chkCharLine[0];
                            $endPoint=$startPoint+15;

                            // Fill in 00 to left character
                            $addOnLeft=false;
                            for($i=0;$i<15;$i++)
                            {
                                $addOnLeft.=pack("h*",00);
                            }

                            $fRead=false;
                            $fOpen = fopen($charInfo, "r");
                            while (!feof($fOpen)) {
                            @$fRead = "$fRead" . fread($fOpen, filesize($charInfo) );
                            }
                            fclose($fOpen);


                            $sourceStr = substr($fRead, 0, $startPoint) . $addOnLeft . substr($fRead, $endPoint);
                            $fOpen = fopen($charInfo, "wb"); 
                            fwrite($fOpen, $sourceStr, strlen($sourceStr));
                            fclose($fOpen);

                            // update data information---------------------------------------------------------------------
                            // Fill in 00 to left character
                            $addOnLeft=false;
                            $leftLen=10-strlen($accMove);
                            for($i=0;$i<$leftLen;$i++)
                            {
                                $addOnLeft.=pack("h*",00);
                            }
                            $writeAccName=$accMove.$addOnLeft;

                            $fRead=false;
                            $fOpen = fopen($pasta, "r");
                            while (!feof($fOpen)) {
                            @$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                            }
                            fclose($fOpen);

                            $sourceStr = substr($fRead, 0, 704) . $writeAccName . substr($fRead, 714);
                            $fOpen = fopen($pasta, "wb"); 
                            fwrite($fOpen, $sourceStr, strlen($sourceStr));
                            fclose($fOpen);

                            echo "<div class='notice notice-sucesso'>
<strong>Pronto!</strong> O char  <strong>". $char ."</strong> foi movido para a conta<strong> ". $accMove."</strong> com sucesso</div>";

                            
                        }
                        else
                        {
                            echo "<div class='notice notice-danger'>
<strong>Erro!</strong> A conta esta cheia,impossivel mover o char.
</div>";
                        }


                    }
                    else
                    {
                        echo "<div class='notice notice-danger'>
<strong>Erro!</strong> As informacoes do char nao existem ou estao corrompidas.
</div>";
                    }



                }
                else
                {
                    echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Preencha os campos corretamente.
</div>";
                }


                

            }
			
	
	
	
	
	
	
	
	
	?></td>
  </tr>
</table>
</body>
</html>
