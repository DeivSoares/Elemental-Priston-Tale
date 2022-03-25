<? if (PT!=1) exit;

$ipsv=$_SERVER['REMOTE_ADDR'];
$statussv = @fsockopen($ipsv, $portasv, $ERROR_NO, $ERROR_STR, (float)1.5);

	if($statussv){
	echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Servidor já esta em execução.
</div>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='4;URL=?sess=home'>";
		} else {
	include "verificarexec.php";
	if (!$oExec++){
	echo "<div class='notice notice-sucesso'>
<strong>Pronto!</strong> Servidor Ligado com Sucesso.
</div>>";
 		} else {
	echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Erro ao ligar o servidor.
</div>";
} }
?>
<?