<?
if (PT!=1)  exit;
?>

<div class="notice notice-info">
Adicionar creditos direto ao Shop 
</div>
         
<form id="form1" name="form1" method="post" action="">
	<div class="form-group">
            <input type="text" class="form-control" name="id" id="id" placeholder="ID" required/>
    </div>
         
          <div class="form-group">
            <input type="text" class="form-control" name="creditos" id="creditos" placeholder="CRÉDITOS" required/>
            </div>
        <div class="form-group">
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Adicionar" />
            <input name="acao" type="hidden" id="acao" value="envia" />
            </div>
                  
                    <p><strong>Instru&ccedil;&otilde;es de como usar o sistema de adicionar cr&eacute;dito em uma conta.<br>
                    </strong>1 Passo - Localize os campos branco acima.<br> 
                    2 Passo - No campos em branco coloque o id do player que voc&ecirc; deseja por os cr&eacute;ditos, e no campo de baixo coloque a quantidade de cr&eacute;ditos que voc&ecirc; deseja adicionar na conta.<br>
                    3 Passo - Clique em Adicionar.</p>
                    <p>Apos seguir os 3 passos acima, e clicar em adicionar vai abrir abrir uma mensagem falando.<BR>
                    qual a&ccedil;&atilde;o que deu, se foi adicionado com sucesso, ou n&atilde;o etc...</p>


<?php 
		  if($_POST['acao'] == "envia"){
		  $id = $_POST['id'];
		  $creditos = $_POST['creditos'];



}

		  ?>
    

