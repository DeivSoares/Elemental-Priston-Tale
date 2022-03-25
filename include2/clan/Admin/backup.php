<? if (PT!=1) exit; 
if(!$_POST['bk']){ ?>
<div class="notice notice-info">
Backup do SQL SERVER
</div>

<form id="form" name="form" method="post">

         <input type="submit" name="bk" id="bk" class="btn btn-primary" value="Backup" />
        
  </form>

<?
}else{
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
?>
 
<?php

$lugar = "backup.bat";
$abre = exec($lugar);
if(!$abre){
	echo '<div class="notice notice-sucesso">
<strong>Pronto!</strong> Backup realizado com sucesso.
</div>';
}

?>
<?
}
?>


