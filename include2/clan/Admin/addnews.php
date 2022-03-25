<?if (PT!=1) exit;?>
<?
if($_POST[acao]!="Enviar")
{
?>
<div class="notice notice-info">
Adicionar Notícia
</div>
<form  name="form_cad" method="post" action="index.php?sess=addnews" onSubmit="return verifica2()">

<div class="form-group">
	<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título da Notícia" required/>
</div>          

<select name="classe" id="classe" class="form-control">
<option value="0" selected="selected">Novidade</option>
<option value="1">Evento</option>
<option value="2">Update</option>
</select><br>

<div class="form-group">
	<input type="text" class="form-control" name="link" id="link" placeholder="Link da Notícia no Foum" required/>
</div>

<input name="acao" type="submit" class="btn btn-primary" id="acao" value="Enviar">
<input name="acao" type="hidden" id="acao" value="Enviar"></td>
<br><br>

</form>
<?
           }
        else
           {

//Verificando se n&atilde;o vai ter injection no script
$titulo = $_POST['titulo'];
$link = $_POST['link'];
$classe = $_POST['classe'];

if ($classe == 0) {
$classeTXT = "NOVIDADE";
}
if ($classe == 1) {
$classeTXT = "EVENTO";
}
if ($classe == 2) {
$classeTXT = "UPDATE";
}


if (anti_sql($titulo1) != 0) {
echo "<div class='notice notice-danger'>
<strong>Erro!</strong> Uso de Caracteres não Permitidos.
</div>";
} else {

				//Verificando se Existe essa ID
				$connection = odbc_connect( $connection_string, $user, $pass );
                $titulo=$_POST[titulo];
                $query_verid = "SELECT * FROM [Web].[dbo].[Noticia] WHERE [titulo]='$titulo'";

                $q_verid = odbc_exec($connection, $query_verid, $query_verid1);
				$qt_verid = odbc_do($connection, $query_verid, $query_verid1);
                $i = 0;
                while(odbc_fetch_row($qt_verid)) $i++;
                           if($i==1) {
                    echo"<div class='notice notice-danger'>
<strong>Erro!</strong> Já existe essa título <strong>$_POST[titulo]</strong> cadastrada.
</div>";

						   } else {
					$gm = $_SESSION["NICKGM"];
					$datahoje = date("d-m-Y");
					
                    
                    $query = "INSERT INTO [Web].[dbo].[Noticia]([titulo],[categ],[gm],[link],[data]) VALUES ('$titulo','$classeTXT','$gm','$link','$datahoje')";
                    $q = odbc_exec($connection, $query);

            if ($q)
            	{
?>
<div class="notice notice-sucesso">
<strong>Notícia Cadastrada com sucesso!</strong><br> Título: <? echo"$titulo";?> <br> Classe: <? echo"$classeTXT";?> <br> Link: <? echo"$link";?> <br> GM: <? echo"$gm";?>
</div>

<?
}}}}
?>



