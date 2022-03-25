<?if (PT!=1) exit;?>
<div class="notice notice-info">
Sistema para mandar item pelo Distribuidor
</div>
<?
include_once "../configuraADM.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar");

$query = "SELECT * FROM [ADM].[dbo].[loginGM] WHERE [idGM]='".$_SESSION["NICKGM"]."'";
$excuta_query = odbc_exec($connection,$query);
$qt = odbc_do($connection,$query);
$permisao = odbc_result($qt,3);
?>
          <? if($_POST['acao']!="Enviar"){ ?>
          <form method="post" id=" " action="">
          
<div class="form-group">
	<input type="text" class="form-control" name="nick" id="nick" placeholder="Nick do Player" required/>
</div>		  
		  
<div class="form-group">
	<input type="text" class="form-control" name="item" id="item" placeholder="Codigo do Item" required/>
</div>		  

<select name="classe" class="form-control">
                        <option selected value="0">Sem Classe</option>
                            <option value="1">Lutador</option>
                            <option value="2">Mecanico</option>
                            <option value="3">Arqueira</option>                            
                            <option value="4">Pike</option>
                             <option value="5">Atalanta</option>
                            <option value="6">Cavaleiro</option>
                            <option value="7">Mago</option>
							<option value="8">Prist</option>
                          </select> <br>
						  <input name="acao" type="submit" class="btn btn-primary" id="acao" value="Enviar">
					<br><br>
                  <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema
                        de Distribuidor PHP<br>
                    </strong>1 Passo - Digite a Nick do Player que vai receber
                    o item.<br> 
                    2 Passo - Digite em Item o Codigo do Item.(Ex: da125,da222)<br>
                    3 Passo - Em Classe , escolha a classe do Item.<br>
                    4 Passo - Apos preencher todos campos clique em enviar.</p>
                </div>
                    </form>
                    <?
					} else {
	
	$idGM = $_SESSION["NICKGM"];				
	$nick = $_POST['nick'];
	$item = $_POST['item'];
	$class = $_POST['classe'];
	
	function subDiretorio($pasta)
{
 	$total = 0;
	for($i=0;$i<strlen($pasta);$i++)
	{			
		$total += ord(strtoupper($pasta[$i]));
			if($total >= 256)
			{
				$total = $total - 256;
			}
		
	}
	return $total;
}
	
	if(empty($nick)){
		echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Digite o nick de um char para ver os dados.
</div>";
	}elseif(anti_sql($nick) != 0){
		echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Caracteres especiais foram detectados.
</div>";
	} else {
		$procuraPlayer = ''.$rootDir.'DataServer/userdata/'.subDiretorio($nick).'/'.$nick.'.dat';
		if(!file_exists($procuraPlayer)){
			echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Char não existe.
</div>";
		} else {
			$aberto = fopen($procuraPlayer, "r");
			$conteudoDat =fread($aberto,filesize($procuraPlayer));
			@fclose($aberto);
			
			$procuraPlayer = ''.$rootDir.'DataServer/userdata/'.subDiretorio($nick).'/'.$nick.'.dat';
if(file_exists($procuraPlayer))
{

	// lê o arquivo para descobrir a ID
	$aberto = fopen($procuraPlayer, "r");
	$conteudoDat =fread($aberto,filesize($procuraPlayer));
	@fclose($aberto);

	$PlayerID = trim(substr($conteudoDat,0x2c0,10),"\x00");
}
			//Dados do Item
$dados_item = "$nick $item  $class \"Obrigado por jogar Priston Tale Origem!!\"". "\r\n";

//Pasta de entrega
$pasta_entrega = "".$rootDir."PostBox/".subDiretorio($PlayerID)."/".$PlayerID.".dat";
//Enviando o Item para o Distribuidor
if (file_exists($pasta_entrega)) {
$fp = fopen($pasta_entrega, "a+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_item");
// Fecha o arquivo
fclose($fp);
} else {
copy("shop.dat",$pasta_entrega);
$fp = fopen($pasta_entrega, "r+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_item");
// Fecha o arquivo
fclose($fp);
}
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$datahoje = date("m-d-Y h:i:s A");
		
	$query_4 = "INSERT INTO [ADM].[dbo].[LogsDistribuidor] ([idGM],[item],[Classe],[id],[nick],[data],[ip]) VALUES ('$idGM','$item','$class','$PlayerID','$nick','$datahoje','$ip')";


	$q_4 = odbc_exec($connection, $query_4);

	echo "<div class='notice notice-sucesso'>
<strong>Pronto!</strong> O player $nick recebeu o item: <strong>".$item."</strong> com sucesso no Distribuidor.
</div>";
	 
			
}	} }
?>
