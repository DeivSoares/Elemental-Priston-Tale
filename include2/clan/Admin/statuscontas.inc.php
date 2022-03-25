<? if (PT!=1) exit;?>
<?
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}
include_once "injection.php";
include_once "../configuraADM.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar com o SQL Server");
?>
<div class="notice notice-info">
Status das Contas 
</div>

<form id="form1" name="form1" method="post" action="">
<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
<thead>
<tr><th>ID</th><th>SENHA</th><th>STATUS</th><th>DELETAR</th></tr>
</thead>
<tbody>

  <?
 $conn = odbc_connect($connection_string,$user,$pass);
	$query_contas = "SELECT * FROM [accountdb].[dbo].[AllGameUser]";
	$exec_contas = odbc_exec($conn,$query_contas);
	$do_contas = odbc_do($conn,$query_contas);
	while(odbc_fetch_row($do_contas)){
	$usuario = odbc_result($do_contas,1);
	$senha = odbc_result($do_contas,2);
	$status = odbc_result($do_contas,12);
		
	?>

    <tr>
      <td><? echo $usuario?></td>
      <td><? echo $senha?></td>
     <td><?if($status == "0"){
	echo"<font color='green'><b>Unban</font>";
	}else{
	echo"<font color='red'><b>Banido</font>";
	}?></td>
      <td width="70"><label><span class="alert_color">
        <input name="usuario[]" type="checkbox" id="usuario[]" value="<? echo $usuario; ?>" />
      </span></label>      </td>
    </tr>
  </table>
  <?
  }
  ?>
  <br>
        <input type="submit" name="button" id="button" class="btn btn-primary" value="Deletar selecionados" />
        <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="del" />
       <br /><br>
        <?
		if($_POST['acao'] = "del"){
		$usuario = $_POST['usuario'];
		$pri = ucfirst($usuario);
		$conn = odbc_connect($connection_string,$user,$pass);
		for($i = 0; $i < count($usuario); $i++){
		$sql = "DELETE FROM [accountdb].[dbo].[AllGameUser] where userid='$usuario[$i]'";
		$sql2 = "DELETE FROM [accountdb].[dbo].[".$pri ."GameUser] where userid='$usuario[$i]'";
		$sql3 = "DELETE FROM [accountdb].[dbo].[AllPersonalMember] where Userid='$usuario[$i]'";
		$sql4 = "DELETE FROM [accountdb].[dbo].[".$pri ."PersonalMember] where Userid='$usuario[$i]'";
		$exec = odbc_exec($conn,$sql);
		$exec = odbc_exec($conn,$sql2);
		$exec = odbc_exec($conn,$sql3);
		$exec = odbc_exec($conn,$sql4);
				}
		if ($exec){
		echo"<div class='notice notice-sucesso'>
<strong>Pronto!</strong> Conta Deletarda.
		</div>";}
		
		
		
		
		}
		
		
		
		?>
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>