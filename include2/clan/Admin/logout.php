<?
include "../configuraADM.php";
function navegador()
{
$navegador = $_SERVER['HTTP_USER_AGENT'];
$nome = strlen("Mozilla");
$i = substr($navegador,0,$nome);
$ok = "Mozilla";
	if($i == $ok){
		return false;
	}else{
		echo "O uso do Mozilla Firefox e OBRIGATORIO para acessar esta pagina.";
		exit;
	}
}
navegador();
?>


<body id="LoginForm">
<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">

</body>
</html>