<? if (PT!=1) exit; 
if($_POST['acao'] == ''){
?>
<div class="notice notice-info">
Zerar log Distribuidor
</div>
<form id="form" name="form" method="post">
	
          
            <input type="submit" class="btn btn-primary" value="Zerar" />
              <input name="acao" type="hidden" id="acao" value="del"></td>
           </form>
<?
}else{
?>
<form id="form" name="form" method="post">

<?php
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
$conn = odbc_connect($connection_string, $user, $pass);
$del = odbc_exec($conn, "DELETE FROM [ADM].[dbo].[LogsDistribuidor]");

if($del){
echo '<div class="notice notice-sucesso">
<strong>Pronto!</strong> Zerado com sucesso.
</div>';
}else{
echo '<div class="notice notice-danger">
<strong>Erro!</strong> Ocorreu um erro, tente novamente.
</div>';
}
?>

            </td>
                  </tr>
                </table></td>
              </tr>
  </table>
           </form>
<?
}
?>