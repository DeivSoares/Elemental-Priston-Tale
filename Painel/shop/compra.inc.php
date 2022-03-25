<?if (DexteR!=1) exit;?>
<?
error_reporting(0);
include_once "injection.php";
function filter($str){

$var = strip_tags(addslashes($str)); 
return $var;

}
$coditem = filter(trim($_POST['coditem']));
$valor = filter(trim($_POST['valor']));

include ("verifica_valor.php");

if (!$valorcorreto) {
?>
<div class='alert alert-danger text-center'>
<span><b> Erro desconhecido, por favor tente novamente!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
} else {

if($_POST['spec'] == ""){
?>
<div class='alert alert-danger text-center'>
<span><b> Você esqueceu de informar: Personagem, Spec ou Quantidade do Item, por favor tente novamente!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
include_once "anti_sql_injection.php";

} else {

$username= $_SESSION["ID"];
$pasta = $func->numDir($username);

if (isset($_SESSION["enviado"])) {

?>
<div class='alert alert-danger text-center'>
<span><b> Erro desconhecido, por favor tente novamente!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
} else {
if (anti_sql($_POST['coditem']) OR anti_sql(!$_POST['spec']) OR anti_sql(!$_POST['nome']) OR anti_sql(!$_POST['valor']) OR anti_sql(!$_POST['personagem']) OR anti_sql(!$_POST['quantidade'])) {
?>

<div class='alert alert-danger text-center'>
<span><b> Você esqueceu de informar: Personagem, Spec ou Quantidade do Item, por favor tente novamente!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
} else {
if($_POST["quantidade"] <= 0){
?>
<div class='alert alert-danger text-center'>
<span><b> Você esqueceu de informar: Personagem, Spec ou Quantidade do Item, por favor tente novamente!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
}else{
$enviado = "Sim";
session_register("enviado");

$coditem = filter(trim($_POST['coditem']));
$spec = filter(trim($_POST['spec']));
$quantidade = filter(trim($_POST['quantidade']));
$nome = filter(trim($_POST['nome']));
$personagem = filter(trim($_POST['personagem']));
$valorI = filter(trim($_POST['valor']));

$valor = $_POST["quantidade"] * $valorI;
$dados_item=array();

//Dados do Item
for($y=1;$y<=$_POST["quantidade"];$y++){
$dados_item[] = "$personagem $coditem $spec \"Obrigado(a)\"". "\r\n";
}

//Pasta de entrega
$pasta_entrega = "".$rootDir."/PostBox/".$pasta."/".$username.".dat";

//Pasta de Controle de Pontos Bonus
$arquivo_bonus = "shop/bonusplayer/$username.arc";

//Verifica se o player tem Saldo para Comprar o Item
$abreB = fopen($arquivo_bonus, "r");
$saldoB = fread($abreB, filesize($arquivo_bonus));
if ($valor > $saldoB) {


?>
<div class='alert alert-danger text-center'>
<span><b> Saldo insuficiente para efetuar essa compra!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'>
<?
fclose($abreB);

} else {
$desconta = fopen($arquivo_bonus, "w");
//Desconta pontos do saldo
$novo_saldo = $saldoB - $valor;
$salva = fwrite($desconta, $novo_saldo);
fclose($abreB);


//Enviando o Item para o Distribuidor
if (file_exists($pasta_entrega)) {
$fp = fopen($pasta_entrega, "a+");
//Escreve o pedido
foreach($dados_item as $dItens){
$escreve = fwrite($fp, $dItens);
}
// Fecha o arquivo
fclose($fp);
} else {
copy("shop/shop.dat",$pasta_entrega);
$fp = fopen($pasta_entrega, "r+");
//Escreve o pedido
foreach($dados_item as $dItens){
$escreve = fwrite($fp, $dItens);
}
// Fecha o arquivo
fclose($fp);
}

//Numeros das Classes
if ($spec == "1") { $spec = "Lutador"; }
if ($spec == "2") { $spec = "Mecanico"; }
if ($spec == "3") { $spec = "Arqueira"; }
if ($spec == "4") { $spec = "Pike"; }
if ($spec == "5") { $spec = "Alatanta"; }
if ($spec == "6") { $spec = "Cavaleiro"; }
if ($spec == "7") { $spec = "Mago"; }
if ($spec == "8") { $spec = "Sacerdotiza"; }


//Pasta de Logs
$pasta_logs = "shop/logs/$username.log";
//Pasta de Historico
$pasta_historic = "shop/historic/$username.his";

//Data do Log
$data = date("d/m/Y - H:i:s");
//Dados do Log
$dados_log = "$personagem - $coditem ($spec) - $quantidade - $valor AS - $data\r\n";
//Dados do Historico
$dados_historic = "$personagem;$nome;$spec;$quantidade;$data;$valor\r\n";

//Criando Histório e Logs de Entregas
if (file_exists($pasta_logs)) {
$fp = fopen($pasta_logs, "a+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_log");
// Fecha o arquivo
fclose($fp);
} else {
copy("shop/shop.dat",$pasta_logs);
$fp = fopen($pasta_logs, "r+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_log");
// Fecha o arquivo
fclose($fp);
}

if (file_exists($pasta_historic)) {
$fp = fopen($pasta_historic, "a+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_historic");
// Fecha o arquivo
fclose($fp);
} else {
copy("shop/shop.dat",$pasta_historic);
$fp = fopen($pasta_historic, "r+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_historic");
// Fecha o arquivo
fclose($fp);
}


?>

<table width="448" border="0" align="center" cellpadding="6" cellspacing="0">
  <tr>
    <td><p align="justify"><b><img src="imgs/distribuidor.gif" width="150" height="182" align="left"><font color="red"></font></b><font color="black">O item <font color="#990000"><b><? echo $nome; ?></b></font> foi enviado para o <b>Distribuidor de Itens</b> de qualquer uma das cidades, basta logar seu char<b> </b>e pegar o item.</font></p>
    <p align="justify"><font color="#006600"><b>Agradecemos por sua colabora&ccedil;&atilde;o ao server, pois &eacute; com sua ajuda que podemos manter nosso server.</b></font></p>
    <p align="center"><font color="#990000"><meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=shop'></font></p></td>
  </tr>
</table>
<?
} } } } } }
?>