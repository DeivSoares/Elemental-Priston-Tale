<?
header("Content-type:text/html;charset=UTF-8");
?> 
<? if (DexteR!=1) exit;
include_once "injection.php";
?>
<?
/*----------------------------------------------------------------------
Painel Player Versão 0.4
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Editado Por: Jiraya (richard.cva21@hotmail.com(
----------------------------------------------------------------------*/
        if($_SESSION["charLevel"]<90)
        {
           echo "<div class='alert alert-danger text-center'>
<span><b> DarkTale - </b> &Eacute; obrigat&oacute;rio que seu personagem tenha mais que level 90 para
ter acesso ao nosso sistema de altera&ccedil;&atilde;o e distribui&ccedil;&atilde;o de Status !</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
        }
		else
        {
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

            if(anti_sqli($_POST[action]!="state"))
            {
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

            <form method="post" onSubmit="disabledBttn(this)" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <h4 class="title text-left"><span class="fa fa-angle-right"></span> Ajustar Status</h4><hr /> 
              </tr>
              <tr>
                <td><table class="padding_all" width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td width="20%"><strong><font color="black">For&ccedil;a </font></strong></td>
                        <td width="20%"><strong><font color="black">Intelig&ecirc;ncia </font></strong></td>
                        <td width="20%"><strong><font color="black">Talento </font></strong></td>
                        <td width="20%"><strong><font color="black">Agilidade </font></strong></td>
                        <td width="20%"><strong><font color="black">Vitalidade </font></strong></td>
                      </tr>
                      <tr>
                        <td align="center"><input type="text" value="<?=$strength?>" name="strength" size="3" maxlength="4" class="form-control">
                        </td>
                        <td align="center"><input type="text" value="<?=$spirit?>" name="spirit" size="3" maxlength="4" class="form-control">
                        </td>
                        <td align="center"><input type="text" value="<?=$talent?>" name="talent" size="3" maxlength="4" class="form-control">
                        </td>
                        <td align="center"><input type="text" value="<?=$agility?>" name="agility" size="3" maxlength="4" class="form-control">
                        </td>
                        <td align="center"><input type="text" value="<?=$health?>" name="health" size="3" maxlength="4" class="form-control">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
                <td><div class='alert alert-info text-center' role='alert'>
				<span><b> Pontos -  <?=$defaultP-$totalP?></span></td>
              <tr>
                <td align="center">
                  <input value="Redistribuir" class="btn btn-primary" type="submit">
                </td>
              </tr>
            </table>
            <input type="hidden" name="action" value="state">

            </form>

<?
            }
            else
            {
                $checkSubmitP=(anti_sqli($_POST['strength'])+anti_sqli($_POST['spirit'])+anti_sqli($_POST['talent'])+anti_sqli($_POST['agility'])+anti_sqli($_POST['health']))-99;

                if( ($checkSubmitP>$defaultP))
                {
                    echo "<div class='alert alert-warning text-center'>
<span><b> DarkTale - </b> Voc&ecirc; utilizou (". $checkSubmitP .") Pontos de Stats, sendo que voc&ecirc; possui (". $defaultP .") Stats!<br/>Redistribua seus stats conforme a quantidade que voc&ecirc; possui!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=state'>";
                }
                else
                {
                    $charStr=pack('i', anti_sqli($_POST['strength']));
                    $charSpi=pack('i', anti_sqli($_POST['spirit']));
                    $charTal=pack('i', anti_sqli($_POST['talent']));
                    $charAgi=pack('i', anti_sqli($_POST['agility']));
                    $charHea=pack('i', anti_sqli($_POST['health']));
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

                   echo "<div class='alert alert-success text-center'>
                         <span><b> DarkTale - </b> Pontos de Status Atualizados com sucesso!</span>
						 <meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=state'>";
                }

               echo "";
            }
			
			}
			
