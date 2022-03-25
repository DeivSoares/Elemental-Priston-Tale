<?if (PT!=1)  exit;?>
<div class="notice notice-info">
Teletransporte Char
</div>

<form id="form1" name="form1" method="post" action="">

<div class="form-group">
	<input type="text" class="form-control" name="nick" id="nick" placeholder="Nick do Char" required/>
</div>
           
          <select name="mapa" id="mapa" class="form-control">
            <option select="select">Mapa</option>
            <option value="00">Mata Das Ac&aacute;&iexcl;cias</option>
            <option value="1">Floresta Bamboo</option>
            <option value="2">Jardim Da Liberdade</option>
            <option value="3">Ricarten</option>
            <option value="4">Ref&uacute;gio Dos An&ccedil;i&otilde;es</option>
            <option value="5">Castelo Dos Perdidos</option>
            <option value="6">Vila Ruinen</option>
            <option value="7">Terra Maldita</option>
            <option value="8">Terra Esquecida</option>
            <option value="9">Navisko</option>
            <option value="10">Oasis</option>
            <option value="11">Campo De Batalha Dos Anci&otilde;es</option>
            <option value="12">Terra Proibida</option>
            <option value="13">Calabou&ccedil;o Antigo 1&ordm; Andar</option>
            <option value="14">Calabou&ccedil;o Antigo 2&ordm; Andar</option>
            <option value="15">Calabou&ccedil;o Antigo 3&ordm; Andar</option>
			<option value="16">Sala do GM</option>
            <option value="17">Floresta Dos Esp&iacute;ritos</option>
            <option value="18">Floresta Das Ilusoes</option>
            <option value="19">Vale Tranquilo</option>
            <option value="20">Estrada Dos Ventos</option>
            <option value="21">Pilai</option>
            <option value="22">Templo Maldito 1&ordm; Andar</option>
            <option value="23">Templo Maldito 2&ordm; Andar</option>
            <option value="24">Caverna Dos Cogumelos</option>
            <option value="25">Caverna Das Abelhas</option>
            <option value="26">Santu&aacute;rio Sombrio</option>
            <option value="27">Estrada De Ferro Do Caos</option>
            <option value="28">Cora&ccedil;&atilde;o De Perum</option>
            <option value="29">Eura</option>
            <option value="30">Bellatra</option>
            <option value="31">Vale Gallubia</option>
            <option value="32">Mapa Quest 4 Tier</option>
            <option value="33">Castelo Bless</option>
            <option value="34">Lago da Gan&atilde;ncia</option>
            <option value="35">Santu&aacute;rio Congelado</option>
            <option value="36">Covil Do Kelvezu</option>
            <option value="37">Ilha Perdida</option>
            <option value="38">Templo Perdido</option>
            <option value="39">Floresta Distorcida</option>
            <option value="40">Endless Tower 1&ordm; Andar</option>
            <option value="41">Endless Tower 2&ordm; Andar</option>			
            </select><br>
          
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Teleportar" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="teleporta" />

    </form>
<br>
<?
	if($_POST['acao'] == "teleporta"){
	$nick = $_POST['nick'];
	if(empty($nick)){
	echo"<div class='notice notice-danger'><strong>Erro!</strong> Preencha o nick do char a ser teleportado</div>";
	}else{
	$pasta = $dirUserData . ( $func->numDir($nick)) . "/" . $nick . ".dat";
	$abre = fopen($pasta, "r");
$le = fread($abre, filesize($pasta));
fclose($abre);

$Source_teleport = substr($le, 0, 484).pack("i",$_POST['mapa']).substr($le, 488);

$abre = fopen($pasta,"wb");
$le = fwrite($abre, $Source_teleport, strlen($Source_teleport));
fclose($abre);
	echo"<div class='notice notice-sucesso'>
<strong>Pronto!</strong> O char foi teleportado!.
</div>";
	
	
	}
	
	
	}
	
	
	
	
    ?></td>
  </tr>
</table>
</body>
</html>
