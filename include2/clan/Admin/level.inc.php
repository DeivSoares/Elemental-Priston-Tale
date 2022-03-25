<?if (PT!=1)  exit;
if($_SESSION['permissao'] < 3){
echo "Você não tem permissão para acessar esta área";
exit;
}?>
<div class="notice notice-info">
Sistema de Level
</div>

<form id="form1" name="form1" method="post" action="">
      
<div class="form-group">
	<input type="text" class="form-control" name="nick" id="nick" placeholder="Nick do Char" required/>
</div>	  
           
<select name="level" class="form-control">
            <?
                for($i=1; $i<151; $i++)
                {
                    echo "<option ". ( ($i == $_SESSION["charLevel"] )? "selected" : "" ) .">". $i ."</option>";
                }
?>
          </select>
		  <br>
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Alterar N&iacute;vel" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="lvl" />
        
        </form>
   <br>
                    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de level editor<br>
                    </strong>1 Passo - Localize o campo branco acima.<br> 
                    2 Passo - No campo em branco coloque o nick do player que voc&ecirc; deseja alterar o level, escolha o level que você deseja que o player que você citou vá. <br>3 Passo - Clique em Alterar Nivel.</p>
                    <p>Apos seguir os 3 passos acima, e clicar em alterar nivel vai abrir uma janela falando assim.<BR>
                     Informa&ccedil;&atilde;o da do Player, falando se o level do player foi atualizando com sucesso ou oque...</p>
<?
	if($_POST['acao'] == "lvl"){
	
	$nick = $_POST['nick'];
	$lvl = $_POST['level'];
	if(empty($nick)){
	echo"<div class='notice notice-danger'>
<strong>Erro!</strong> Preencha todos os campos.
</div>";
	}else{
	$pasta = $dirUserData.$func->numDir($nick)."/".$nick.".dat";	
	$fp = fopen($pasta,"r");
		$dados = fread($fp,filesize($pasta));
		$classe_char = substr($dados,0xc4,1);
		
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
					case 9: $class = 'Assasina'; break;
					case 10: $class = 'Xamã'; break;
					case 11: $class = 'Guerreira'; break;
                }
	
	$fRead=false;
                $fOpen = fopen($pasta, "r");
                while (!feof($fOpen)) {
                @$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                }
                fclose($fOpen);

                $xphex = fopen('xphex.txt', "r");
                while (!feof($xphex)) 
                {
                @$xp =$xp . fread($xphex, filesize('xphex.txt') );
                }
                fclose($xphex);
                $xp = substr($xp, ($_POST[level] -1 ) * 14 , 12);

                $level1= pack('i', $_POST[level]);

                $level2 =substr ($xp, 0, 4);
                $level2=hexdec("$level2");
                $level2= pack('i', $level2);

                $level3 =substr ($xp, 4, 8);
                $level3=hexdec("$level3");
                $level3= pack('i', $level3);

                $sourceStr = substr($fRead, 0 , 200) . $level1 . substr($fRead, 204, 0). ($func->charResetState($class)) . substr($fRead, 224, 108) . $level3 . substr($fRead, 336 ,68) . $level2 . substr($fRead,408, 100) . ($func->charResetSkill()) . substr($fRead, 524);

                $fOpen = fopen($pasta, "wb"); 
                fwrite($fOpen, $sourceStr, strlen($sourceStr));
                fclose($fOpen);
				echo"<div class='notice notice-sucesso'>
<strong>Pronto!</strong> O char <strong>$nick</strong> agora está no nivel <strong>$lvl</strong>
</div>";
	
	}
	}
?>