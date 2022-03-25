<?if (PT!=1) exit;?>
<?

include_once "injection.php";
include_once "../configuraADM.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar com o SQL Server");

function AcertarLinhasODBC($conn,$tabela){
	$resultado = odbc_exec($conn,$tabela);
	$contador=0;
	while($temp = odbc_fetch_into($resultado, &$counter)){
		$contador++;
	}
	return $contador;
}


$total = "SELECT * FROM [Jeck].dbo.[Premiado]";
$contagemtotal= AcertarLinhasODBC($connection, $total);


?>
<div class="notice notice-info">
Total De Sorteados no Logado Premiado : <strong><? echo $contagemtotal; ?></strong>
</div>

<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
        <tr>
          <td>Char</td>
          <td>Data</td>
          <td>Hora</td>
          <td>Premio</td>
        </tr>
<?
		$conta = "SELECT * FROM [Jeck].dbo.[Premiado]";
$contaa = odbc_exec($connection, $conta);

while($exe= odbc_fetch_array($contaa)){

{
       
		$nick= $exe['Nick'];
		$data= $exe['DATA'];
		$hora= $exe['HORA'];
		$premio = $exe['PREMIO'];
	
		?>
        <tr>
          <td><? echo $nick; ?></td>
          <td><? echo $data; ?> </td>
          <td><? echo $hora;  ?></td>
          <td><? echo $premio; ?></td>
        </tr> 
<? } } ?>
</table>





