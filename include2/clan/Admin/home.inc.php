<?if (PT!=1) exit;?>
<?php
if($_POST[acao]!="search")
{
header("Content-type:text/html;charset=ISO-8859-15");
?>

<div class="notice notice-info">
<strong>Aviso!</strong> Apenas Game Master do servidor tem acesso a está area.
Seu IP está sendo gravado, no sistema para segurança do servidor
Alguns sistemas do painel possui informações de como ser utilizado siga-o caso tenha dificuldade para usar o sistema.
Para segurança de sua conta, apos utilizar o painel deslogue caso não deslogue sem problemas sera deslogado em alguns minutos automaticamente
</div>
<?
}
?>
<?
include_once "injection.php";
include_once "../configuraADM.php";

$connection = odbc_connect($connection_string, $user, $pass) or die ("Erro ao se conectar com o SQL Server");

      $query= "SELECT * FROM [ClanDB].[dbo].[CT]";		//Query que pega usuarios online
      $excuta_query = odbc_exec($connection, $query);	//Executa a query e verifica os usuarios Online
      $contador_total = AcertarLinhasODBC($connection, $query);	//conta quantas linhas tem na TABELA CT COM FUNÇÃO PARA ARRUMAR BUG DO ODBC_NUM_ROWS

function AcertarLinhasODBC($connection, $query){
	$resultado = odbc_exec($connection, $query);
	$contador=0;
	while($temp = odbc_fetch_into($resultado, &$counter)){
		$contador++;
	}
	return $contador;
}

?>

<div class="notice notice-info">
Player's online: <strong><?php echo $contador_total?></strong>
</div>