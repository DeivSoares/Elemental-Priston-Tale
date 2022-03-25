<? if (PT!=1) exit; 
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
?>

<?php
include_once "injection.php";
include_once "../configuraADM.php";

$hotuk = "hotuk.ini";
$file = "$rootDir$hotuk";
$post = stripslashes($_POST['hotuk']);
$fp = file_put_contents($file, $post);

if($fp){
echo "
<script>
alert(\"Hotuk editada com sucesso!\");
</script>
";
echo "<script>history.go(-1);</script>";
}else{
echo "
<script>

alert(\"Falha!\");
</script>
";
echo "<script>history.go(-1);</script>";
}
?>