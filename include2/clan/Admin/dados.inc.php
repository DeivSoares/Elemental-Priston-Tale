<? if (PT!=1) exit;?>
<?
include_once "injection.php";
include_once "../configuraADM.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar com o SQL Server");
?>
<div class="notice notice-info">
Chars na Conta
</div>
<form id="form" name="form" method="post">

<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
</div>          

            <input type="submit" name="button" id="button" class="btn btn-primary" value="Obter informa&ccedil;&otilde;es" />
            <input name="acao" type="hidden" id="acao" class="btn btn-primary" value="info" />
         
        </form>
<br>
<?{
$id = $_POST['id'];
$pesquisa = $dirUserInfo . ( $func->numDir($id)) . "/" . $id . ".dat";
	   if(empty($id)){
	   echo"<div class='notice notice-danger'><strong>Erro!</strong> Preencha a ID.</div>";
	   }else{
	   
		   if(!file_exists($pesquisa)){
		   echo"<div class='notice notice-danger'><strong>Erro!</strong> O arquivo a ser pesquisado n&atilde;o existe.";
		   }else{
		  $abre = fopen($pesquisa,"r");
$dados = fread($abre,filesize($pesquisa));
$personagens=array(
                    "48" => trim(substr($dados,0x30,15)),
                    "80" => trim(substr($dados,0x50,15)),
                    "112"=> trim(substr($dados,0x70,15)),
                    "144"=> trim(substr($dados,0x90,15)),
                    "176"=> trim(substr($dados,0xb0,15)),
                );
				                 
            }
            
				@fclose($abre);



$conn = odbc_connect($connection_string,$user,$pass);
$query_all = "SELECT * FROM [accountdb].[dbo].[AllGameUser]  WHERE [userid]='$id'";
$q_all = odbc_exec($conn, $query_all);
                    $qt_all = odbc_do($conn, $query_all);

                    odbc_fetch_row($qt_all);
					$estado_c = odbc_result($qt_all,12);

 $query = "SELECT * FROM [accountdb].[dbo].[AllPersonalMember]  WHERE [userid]='$id'";
                    $q = odbc_exec($conn, $query);
                    $qt = odbc_do($conn, $query);

                    odbc_fetch_row($qt);
					$senha = odbc_result($qt,3);
					$nome=odbc_result($qt,4);
                    $email=odbc_result($qt,5);
				
?>
<br />
<table class ="ui table table-striped" style="margin-top:-5px" >
<tbody>
<tr>
    <?
	if(count($personagens)>0)
                {
	
	foreach($personagens as $chave=>$valor)
					 {
					echo "<td><center>$valor</td>";
                    }
					}
					?></td>
</tr>
</table>

<?
}
}

?>
