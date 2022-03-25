<? if (PT!=1) exit; 
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
?>

<?php
include_once "injection.php";
include_once "../configuraADM.php";

$banned = "banned.ini";
$file = "$rootDir$banned";
$fp = file_get_contents($file);

?>
<div class="notice notice-info">
Editar Banned.ini Excalibur
</div>
<form id="form1" name="form1" method="post" action="index.php?sess=bannededit">
                    
                        <textarea name="banned" cols="80" rows="30" id="banned"><?php echo $fp; ?></textarea>

                   
                        <input type="submit" name="Editar" id="Editar" class="btn btn-primary" value="Editar" />
                      
                  </form>                  
 