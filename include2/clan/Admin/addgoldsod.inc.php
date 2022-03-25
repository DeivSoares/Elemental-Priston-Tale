<?
if (PT!=1) exit;
?>
<?
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
header("Content-type:text/html;charset=ISO-8859-15");
include_once "injection.php";
include_once "../configuraADM.php";
?>

<div class="notice notice-info">
Enviando gold virtual para lider de Bellatra
</div>
 
<form method="post" action="index.php?sess=depositasod">

<div class="form-group">
		<input type="text" class="form-control" name="ID2" id="ID2" placeholder="NOME DO CLAN" required/>
</div>
<div class="form-group">
		<input type="text" class="form-control" name="Iquantia2D2" id="quantia2" placeholder="QUANTIA" required/>
</div>
<input type="submit" class="btn btn-primary" id="depositar" value="enviar gold virtual" />
<br><br>
  <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de mandar gold para lider de sod.<br />
  </strong>1 Passo - Digite o nome do clan que voc&ecirc; deseja mandar o gold para o retirar o gold na secretaria karina.<br />
2 Passo - Em GOLD VIRTUAL coloque a quantidade de gold que deseja mandar para o lider do clan de sod.<br />
<strong>Exemplos</strong>:1000000= 1kk, 10000000=10kk, 50000000=50kk,100000000=100kk<br />
3 Passo - Clique em enviar gold virtual, vai falar que o gold foi enviado com sucesso para o clan so comunicar o lider para pegar o gold na secretaria karina pronto.</p>
</form>

<?  ?>   
