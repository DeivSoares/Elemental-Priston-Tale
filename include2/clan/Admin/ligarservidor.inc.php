<?
if (PT!=1) exit;
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Voc� n�o tem permiss�o para acessar esta �rea</div>";
exit;
}
?>
<div class="notice notice-info">
Ligar o Servidor 
</div>
<? $fp = @fsockopen($iphost, $portasv, $errno, $errstr, 1); if($fp >= 1){  echo '<center><img src=imgs/on.gif>';} else{ echo '<center><img src=imgs/off.gif>'; } ?>
                  <br />
                  <br />
      <p>Para ligar o servidor, basta clicar no bot&atilde;o abaixo 'Ligar o Servidor'<br/>
      Aten��o veja se o servidor n�o est� ligado antes de clicar em ligar para n�o lagar o host executando 2 exes, ou ent�o verifique se o admin n�o esta fazendo manuten��o no momento.</p>
      <br />
	  
<form method="post" action="index.php?sess=ligarsv">

<input type="submit" class="btn btn-primary" value="Ligar o Servidor"/>
</form><br />

    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Ligar o Servidor<br />
    </strong>1 Passo - Clique em ligar o servidor se realmente deseja ligar o servidor.<br />
2 Passo - quando voc&ecirc; clicar em ligar o servidor automaticamente vai aparecer um alerta confirme oque deseja..<br />
Se voc&ecirc; deseja realmente ligar o servidor clique em 'Ok' se quer cancelar a a&ccedil;&atilde;o clique em Cancelar<br />
3 Passo - Apos confirma, vai aparecer que o servidor foi ligado com sucesso.</p>