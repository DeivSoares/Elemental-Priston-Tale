<?
if (PT != 1) exit;
if ($_SESSION['permissao'] < 3) {
  echo "Voc� n�o tem permiss�o para acessar esta �rea";
  exit;
}
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<table background="imgs/fundo_textura1.gif" width="716" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="716">
      <table width="99%" border="0" align="center" cellpadding="4" cellspacing="2">
        <tr>
          <td colspan="2" align="center" bgcolor="#000000"><b>
              <font color="#FFFFFF">Ligar o Servidor</font>
            </b></td>
      </table>
      <div align="center"><br />
        <? $fp = @fsockopen($iphost, $portasv, $errno, $errstr, 1);
        if ($fp >= 1) {
          echo '<center><img src=imgs/on.gif>';
        } else {
          echo '<center><img src=imgs/off.gif>';
        } ?>
        <br />
        <br />
        Para ligar o servidor, basta clicar no bot&atilde;o abaixo 'Ligar o Servidor'<br />
        Aten��o veja se o servidor n�o est� ligado antes de clicar em ligar para n�o lagar o host executando 2 exes, ou ent�o verifique se o admin n�o esta fazendo manuten��o no momento.
        <br />
      </div>
      </div>
      </div>
      <form method="post" action="index.php?sessadm=ligarsv">
        <div align="center">
          <label>
            <input type="submit" class="button6" onclick="return confirm('Voc� Tem certeza que deseja ligar o servidor!?')" value="Ligar o Servidor" /></label>
        </div>
      </form><br />
      <strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Ligar o Servidor<br />
      </strong>1 Passo - Clique em ligar o servidor se realmente deseja ligar o servidor.<br />
      2 Passo - quando voc&ecirc; clicar em ligar o servidor automaticamente vai aparecer um alerta confirme oque deseja..<br />
      Se voc&ecirc; deseja realmente ligar o servidor clique em 'Ok' se quer cancelar a a&ccedil;&atilde;o clique em Cancelar<br />
      3 Passo - Apos confirma, vai aparecer que o servidor foi ligado com sucesso.
</table>