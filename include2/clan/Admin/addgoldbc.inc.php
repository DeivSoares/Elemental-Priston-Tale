<?
if (PT!=1) exit;
?>
<?
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
include_once "injection.php";
include_once "../configuraADM.php";
?>

<link href="css/style.css" rel="stylesheet" type="text/css">

<div class="notice notice-info">
Enviando gold virtual para lider de Bless Castle
</div>


<form method="post" action="index.php?sess=depositabc">
  <div class="form-group">
            <input type="text" class="form-control" name="id2" id="id2" placeholder="NOME DO CLAN" required/>
            </div>
			
	<div class="form-group">
            <input type="text" class="form-control" name="quantia2" id="quantia2" placeholder="QUANTIA" required/>
            </div>
			<input type="submit" class="btn btn-primary" id="depositar" value="enviar gold virtual" />
<br><br>
  <p><strong>Exemplos</strong>: 1000000= 1kk, 10000000=10kk, 50000000=50kk,100000000=100kk<br />
    Ps: coloque no campo de gold virtual quantidade exemplo 
  1000000 que equivale 1kk n&atilde;o coloque assim 1kk coloque, 1000000</p>

</form>

<?  ?>   
