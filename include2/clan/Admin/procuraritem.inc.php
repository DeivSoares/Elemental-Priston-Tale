<?
if (PT!=1) exit;
 
?>
<?
include_once "injection.php";
?>
<div class="notice notice-info">
Procurar ITEMS em um Personagem
</div>

<form id="form1" name="form1" method="post" action="index.php?sess=itemresultado">
<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="Nick do Char" required/>
</div>

<div class="form-group">
	<input type="text" class="form-control" name="iten" id="iten" placeholder="Nome do Item" required/>
</div>  
<input name="button" type="submit" class="btn btn-primary" id="button" value="Procurar" /> 
</form>
<br>
      <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Procurar item em um char<br />
        </strong>1 Passo - Procure saber o nick do player que voc&ecirc; quer verifica se possui o item x.<br />
        2 Passo - Digite o nick do player no campo de cima e no de baixo o nome do item certinho com letras maiusculas e minusculas apos isso clique em Procurar.<br />
        quando voc&ecirc; clicar em procurar vai aparecer se existe o item x no player ou n&atilde;o.<br />
        
  <?  ?>

               