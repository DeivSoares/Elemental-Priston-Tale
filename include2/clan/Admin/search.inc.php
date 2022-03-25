<?if (PT!=1) exit;?>
<?php
include_once "../configuraADM.php";
if($_POST[acao]!="search")
{
?>
<div class="notice notice-info">
Busca de ID por nick 
</div>
<form method="post" onSubmit="disabledBttn(this)" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>">
	
<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="Nick do Char" required/>
</div>
	
<input name="submit" type="submit" class="btn btn-primary" value="Procurar" />
<input name="acao" type="hidden" id="acao" value="search" /></td>
<br> 
</form>
                    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de search ID<br>
                    </strong>1 Passo - Localize o campo branco acima.<br> 
                    2 Passo - No campo em branco coloque o nick do player que voc&ecirc; deseja saber a ID. <br>3 Passo - Clique em Procurar.</p>
                    <p>Apos seguir os 3 passos acima, e clicar em procurar vai abrir uma janela falando assim.<BR>
                     Informa&ccedil;&atilde;o da ID do Player, abaixo grifado estara a id do player, caso n&atilde;o aparece nada este nick n&atilde;o foi localizado no banco de dados.</p>
                  

<?php
}
else
{
$procura = $_POST['id'];

if (anti_sql($procura) != 0) {
echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Uso de Caracteres não Permitidos.
</div>";
} else {

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


$procuraPlayer = ''.$rootDir.'DataServer/userdata/'.subDiretorio($procura).'/'.$procura.'.dat';
if(file_exists($procuraPlayer))
{

	// lê o arquivo para descobrir a ID
	$aberto = fopen($procuraPlayer, "r");
	$conteudoDat =fread($aberto,filesize($procuraPlayer));
	@fclose($aberto);

	$PlayerID = trim(substr($conteudoDat,0x2c0,10),"\x00");

	}
	?>
<div class='notice notice-info'>
<strong>Ol&aacute; Game Master</strong> A id do Player foi encontrada &eacute; ( <strong><? echo $PlayerID; ?></strong> )
</div>Caso n&atilde;o aparece nada entre os parenteses acima o nick citado n&atilde;o foi localizado no banco de dados portanto nick n&atilde;o existe ouo char foi deletado.

  <?
}}
?>
