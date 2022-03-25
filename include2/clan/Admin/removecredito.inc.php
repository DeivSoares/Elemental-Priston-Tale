<?
if (PT!=1)  exit;
if($_SESSION['permissao'] < 3){
echo "Você não tem permissão para acessar esta área";
exit;
}
?>
<div class="notice notice-info">
Sistema para remoção de creditos do Shop
</div>

<form id="form1" name="form1" method="post" action="">
<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>

<div class="form-group">
	<input type="text" class="form-control" name="creditos" id="creditos" placeholder="Crédidos" required/>
</div>            
              
              <input type="submit" name="button" id="button" class="btn btn-primary" value="Remover" />
              <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="retira" />
              <br><br>
                    <p><strong>Instru&ccedil;&otilde;es de como usar o sistema de remover cr&eacute;dito de uma conta.<br>
                    </strong>1 Passo - Localize os campos branco acima.<br> 
                    2 Passo - No campos em branco coloque o id do player que voc&ecirc; deseja retirar os cr&eacute;ditos, e no campo de baixo coloque a quantidade de cr&eacute;ditos que voc&ecirc; deseja remover da conta.<br>
                    3 Passo - Clique em Remover.</p>
                    <p>Apos seguir os 3 passos acima, e clicar em  remover vai abrir abrir uma mensagem falando.<BR>
                    qual a&ccedil;&atilde;o que deu, se foi removido com sucesso, ou n&atilde;o etc...</p>
<?php 
		  if($_POST['acao'] == "retira"){
		  $id = $_POST['id'];
		  $creditos = $_POST['creditos'];
		  $arquivo = "$pastapainel/shop/bonusplayer/$id.arc";
		  if(empty($id) || empty($creditos)){
		  echo"<center><script>
		  alert('Preencha todos os campos!!!');
		  history.go(-1);
		  </script>";
		  }
		  if(!file_exists($arquivo)){
		  echo"<div class='notice notice-danger'>
<strong>Erro!</strong> O arquivo de bonus da conta não existe.
</div>";
		  }else{
$abre = fopen($arquivo,"r");
$saldo_atual = fread($abre,filesize($arquivo));
fclose($abre);

$abre2 = fopen($arquivo,"w");
$novos_creditos = $saldo_atual - $creditos;
$atualiza_saldo = fwrite($abre2,$novos_creditos);

if($atualiza_saldo == true){
echo"<div class='notice notice-sucesso'>
<strong>Pronto!</strong> os créditos foram removidos da conta <strong>>$id</strong>
</div>";
}else{
echo"<div class='notice notice-danger'>
<strong>Erro!</strong> Não foi possivel remover os créditos.
</div>";
}

}
}

		  ?></td>
          </tr>
          </table>
    </tr>
  </table>
