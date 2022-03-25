<?if (PT!=1) exit;?>
<?

include_once "../configuraADM.php";
include_once "injection.php";
?>
<div class="notice notice-info">
Mudança de Classe
</div>
<form id="form1" name="form1" method="post" action="">
<div class="form-group">
	<input type="text" class="form-control" name="nick" id="nick" placeholder="Nick do Char" required/>
</div>
<select name="newclasse" id="newclasse" class="form-control">
            <option <?=($_SESSION["charClass"]=="Fighter")?"selected":""?>>Fighter</option>
            <option <?=($_SESSION["charClass"]=="Mechanician")?"selected":""?>>Mechanician</option>
            <option <?=($_SESSION["charClass"]=="Archer")?"selected":""?>>Archer</option>
            <option <?=($_SESSION["charClass"]=="Pikeman")?"selected":""?>>Pikeman</option>
            <option <?=($_SESSION["charClass"]=="Atalanta")?"selected":""?>>Atalanta</option>
            <option <?=($_SESSION["charClass"]=="Knight")?"selected":""?>>Knight</option>
            <option <?=($_SESSION["charClass"]=="Magician")?"selected":""?>>Magician</option>
            <option <?=($_SESSION["charClass"]=="Priestess")?"selected":""?>>Priestess</option>
			<option <?=($_SESSION["charClass"]=="Assasina")?"selected":""?>>Assasina</option>
			<option <?=($_SESSION["charClass"]=="Xamã")?"selected":""?>>Xamã</option>
			<option <?=($_SESSION["charClass"]=="Guerreira")?"selected":""?>>Guerreira</option>
          </select>
<br>
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Mudar classe" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="alterar" />
 
</form>
<?
	if($_POST['acao'] == "alterar"){
	$nick = $_POST['nick'];
	$classe = $_POST['newclasse'];
	if(empty($nick))
	{
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

                $bin = $func->char2Num($classe);

                $bina= pack("h*",$bin);

                // Change character class ----------------------------------------------------------------
                $sourceStr = substr($fRead, 0, 48) . ($func->charResetHair($classe, 1)) . substr($fRead, 69, 43) . ($func->charResetHair($classe, 2)) . substr($fRead, 136, 60) . $bina . substr($fRead, 197, 7) . ($func->charResetState($classe)) . substr($fRead, 224, 284) . ($func->charResetSkill()) . substr($fRead, 524, 0) . ($func->charResetMastery()) . substr($fRead, 556);
                $fOpen = fopen($pasta, "wb"); 
                fwrite($fOpen, $sourceStr, strlen($sourceStr));
                fclose($fOpen);

                
                echo "<div class='notice notice-sucesso'>
<strong>Pronto!</strong> O Char <strong>$nick</strong> agora pertence a classe <strong>$classe</strong><br>
Todos os seus pontos de status e skill foram resetados
</div>";
	
	
	}
	}
	
?>