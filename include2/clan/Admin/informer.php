<? if (PT!=1) exit;
if($_POST['acao'] == ''){ ?>
<?
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
?>
<div class="notice notice-info">
Sistema de cr&eacute;ditos
</div>

<form id="form" name="form" method="post">

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>                     

<input type="submit" name="Obter" id="Obter" class="btn btn-primary" value="Enviar" />
<input name="acao" type="hidden" id="acao" class="btn btn-primary" value="acao" />

<?
}else{
?>
<div class="notice notice-info">
Sistema de cr&eacute;ditos
</div>

<form id="form" name="form" method="post">

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>                     

<input type="submit" name="Obter" id="Obter" class="btn btn-primary" value="Enviar" />
<input name="acao" type="hidden" id="acao" class="btn btn-primary" value="acao" />
<br><br>
<?php

if(anti_sql($_POST['id']) != 0){
echo 'Digite um id válido!';
exit;
}

$file = "$creditos".$_POST['id'].".arc";

if(!file_exists($file)){
echo 'ID n&atilde;o encontrada!';
exit;
}

$fp = fopen($file, "r");
$fr = fread($fp, filesize($file));
fclose($fp);

echo '<div class="notice notice-sucesso">
O ID : <strong>'.$_POST['id'].'</strong> possui <strong>'.$fr.'</strong> cr&eacute;ditos.
</div>';

?>
<?
}
?>