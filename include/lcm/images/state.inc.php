<?if (XPT!=1) exit;?>
<?


            $fOpen = fopen($_SESSION["charDir"], "r");
            $fRead =fread($fOpen,4096);

            @fclose($fOpen);

            // details
            $str1 = bin2hex(substr($fRead,0xcc,1));
            $str2 = bin2hex(substr($fRead,0xcd,1));
            $strength = hexdec("$str2"."$str1");

            $spi1 = bin2hex(substr($fRead,0xd0,1));
            $spi2 = bin2hex(substr($fRead,0xd1,1));
            $spirit = hexdec("$spi2"."$spi1");

            $tal1 = bin2hex(substr($fRead,0xd4,1));
            $tal2 = bin2hex(substr($fRead,0xd5,1));
            $talent = hexdec("$tal2"."$tal1");

            $agi1 = bin2hex(substr($fRead,0xd8,1));
            $agi2 = bin2hex(substr($fRead,0xd9,1));
            $agility = hexdec("$agi2"."$agi1");

            $hea1 = bin2hex(substr($fRead,0xdc,1));
            $hea2 = bin2hex(substr($fRead,0xdd,1));
            $health = hexdec("$hea2"."$hea1");

            $defaultP=$func->checkStatePoints($_SESSION["charLevel"]);

            $totalP=($strength+$spirit+$talent+$agility+$health)-99;

            if($_POST[action]!="state")
            {
?>

            <form method="post" onSubmit="disabledBttn(this)" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><img src="imgs/box/state.gif" alt="statement" width="110" height="9"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="padding_all">
                  <tr>
                    <td width="20%" bgcolor="#92C5DC"><span style="font-weight: bolder"><img src="imgs/box/strength.gif" alt="strength" width="62" height="10" /></span></td>
                    <td width="20%" bgcolor="#92C5DC"><span style="font-weight: bolder"><img src="imgs/box/spirit.gif" alt="spirit" width="38" height="10" /></span></td>
                    <td width="20%" bgcolor="#92C5DC"><span style="font-weight: bolder"><img src="imgs/box/talent.gif" alt="talent" width="46" height="10" /></span></td>
                    <td width="20%" bgcolor="#92C5DC"><span style="font-weight: bolder"><img src="imgs/box/agility.gif" alt="agility" width="47" height="10" /></span></td>
                    <td width="20%" bgcolor="#92C5DC"><span style="font-weight: bolder"><img src="imgs/box/health.gif" alt="health" width="48" height="10" /></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#e5e5e5"><input type="text" value="<?=$strength?>" name="strength" size="3" maxlength="3"></td>
                    <td bgcolor="#e5e5e5"><input type="text" value="<?=$spirit?>" name="spirit" size="3" maxlength="3"></td>
                    <td bgcolor="#e5e5e5"><input type="text" value="<?=$talent?>" name="talent" size="3" maxlength="3"></td>
                    <td bgcolor="#e5e5e5"><input type="text" value="<?=$agility?>" name="agility" size="3" maxlength="3"></td>
                    <td bgcolor="#e5e5e5"><input type="text" value="<?=$health?>" name="health" size="3" maxlength="3"></td>
                  </tr>


                </table></td>
              </tr>
              <tr>
                <td align="right">P: <?=$defaultP-$totalP?></td>
              </tr>
              <tr>
                <td><input type="submit" value="change" class="button"></td>
              </tr>
            </table>
            <input type="hidden" name="action" value="state">

            </form>

<?
            }
            else
            {
                $checkSubmitP=($_POST['strength']+$_POST['spirit']+$_POST['talent']+$_POST['agility']+$_POST['health'])-99;

                if( ($checkSubmitP>$defaultP))
                {
                    echo "YOUR SUBMISSION PONTS (". $checkSubmitP .") IS LARGER THAN DEFAULT POINTS (". $defaultP .") !";
                }
                else
                {
                    $charStr=pack('i', $_POST['strength']);
                    $charSpi=pack('i', $_POST['spirit']);
                    $charTal=pack('i', $_POST['talent']);
                    $charAgi=pack('i', $_POST['agility']);
                    $charHea=pack('i', $_POST['health']);
                    $charStateStr=$charStr . $charSpi . $charTal . $charAgi . $charHea;

                    $fRead=false;
                    $fOpen = fopen($_SESSION["charDir"], "r");
                    while (!feof($fOpen)) {
                    @$fRead = "$fRead" . fread($fOpen, filesize($_SESSION["charDir"]) );
                    }
                    fclose($fOpen);

                    $sourceStr = substr($fRead, 0, 204) . $charStateStr . substr($fRead, 224);
                    $fOpen = fopen($_SESSION["charDir"], "wb"); 
                    fwrite($fOpen, $sourceStr, strlen($sourceStr));
                    fclose($fOpen);

                    echo "YOUR POINTS HAVE BEEN EDITED!";
                }

                echo "<br><a href=\"$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\">BACK</a>";
            }


?>