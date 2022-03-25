<? if (PT!=1) exit; 
if($_GET['acao'] == ''){
?>
<?
if($_SESSION['permissao'] < 3){
echo "Voce nao tem permissao para acessar esta area";
exit;
}
?>
<div class="notice notice-info">
Sistema para editar extrato
</div>

<form id="form" name="form" method="post" action="index.php?sess=editarextrato&acao=editar">

<div class="form-group">
<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>           
      <input type="submit" name="Alterar" id="Alterar" class="btn btn-primary" value="Enviar" />
</form>
<?
}elseif($_GET['acao'] == 'editar'){
?>
<div class="notice notice-info">
Sistema para editar extrato
</div>

<form id="form" name="form" method="post" action="index.php?sess=editarextrato&acao=gravar&id=<?php echo $_POST['id']; ?>">
  <td width="59%">                       
     <p align="center">
       <label>
         <?php
	   $file = "$extrato".$_POST['id'].".his";
	   if(!file_exists($file)){
		   echo '<div class="notice notice-danger">
<strong>Erro!</strong> ID inexistente!.
</div>';
		   exit;
	   }
	   $fp = fopen($file, "r");
	   $fr = @fread($fp, filesize($file));
	   
	   echo '<div class="notice notice-info">
ID <strong>'.$_POST['id'].'</strong></div>';
?>
</form>

<?
}elseif($_GET['acao'] == 'gravar'){
?>
<div class="notice notice-info">
Sistema para editar extrato
</div>
<?php

$id = $_GET['id'];
if(anti_sql($id) != 0){
echo "Caracteres inválidos!";
exit;
}

$file = "$extrato".$_GET['id'].".his";
if(!file_exists($file)){
echo 'ID inexistente!';
exit;
}

$fp = fopen($file, "w");
$fw = fwrite($fp, stripslashes($_POST['extrato']));

if($fw){
echo '<div class="notice notice-sucesso">
<strong>Pronto!</strong> Extrato editado com sucesso.
</div>';
}else{
echo '<div class="notice notice-danger">
<strong>Erro!</strong> Ocorreu um erro, tente novamente!.
</div>';
}

?>
<?
}
?>
