<?
if (PT!=1) exit;
?>
<?
if($_SESSION['permissao'] < 3){
echo "Você não tem permissão para acessar esta área";
exit;
}
include_once "injection.php";
include_once "../configuraADM.php";
?>

<div class="notice notice-info">
Adicionando gold no banco de Gold do painel Player
</div>

<form method="post" action="index.php?sess=deposita">
	<div class="form-group">
		<input type="text" class="form-control" name="id2" id="id2" placeholder="ID" required/>
            </div>
	<div class="form-group">
		<input type="text" class="form-control" name="quantia2" id="quantia2" placeholder="QUANTIA" required/>
            </div>
	
	<input type="submit" class="btn btn-primary" id="depositar" value="Depositar no Banco" />
	<br><br>
	<p><strong>Exemplos</strong>: 1000000= 1kk, 10000000=10kk, 50000000=50kk,100000000=100kk<br />
    Ps: coloque no campo de gold virtual quantidade exemplo 
  1000000 que equivale 1kk n&atilde;o coloque assim 1kk coloque, 1000000 </p>
			
</form>

<?  ?>   
