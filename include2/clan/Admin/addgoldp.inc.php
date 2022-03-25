<?if (PT!=1) exit;
if($_SESSION['permissao'] < 3){
echo "<div class='notice notice-danger'><strong>Erro!</strong>Você não tem permissão para acessar esta área</div>";
exit;
}?>
<div class="notice notice-info">
Adicionar Gold direto ao Char
</div>

<form id="form1" name="form1" method="post" action="">
  
    <div class="form-group">
		<input type="text" class="form-control" name="nick" id="nick" placeholder="NICK DO CHAR" required/>
            </div>
    <div class="form-group">
		<input type="text" class="form-control" name="gold" id="gold" placeholder="QUANTIA" required/>
            </div>
    
        <input type="submit" name="button" class="btn btn-primary" id="button" value="Adicionar" />
        <input name="acao" type="hidden"  class="btn btn-primary" id="acao" value="addgold" />

                    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Adicionar gold no inventario do player.<br />
  </strong>1 Passo - Digite o nick do player que voc&ecirc; deseja mandar o gold o personagem.<br />
2 Passo - Em GOLD ADICIONAR coloque a quantidade de gold que deseja mandar para o personagem dele.<br />
<strong>Exemplos</strong>:1000000= 1kk, 10000000=10kk, 50000000=50kk,100000000=100kk<br />
3 Passo - Clique em adicionar, vai falar que o gold foi enviado com sucesso para o player.<br> Maximo de gold que pode enviar, 500000000=500kk
<?
	if($_POST['acao'] == "addgold"){
	$gold = $_POST['gold'];
	$nick = $_POST['nick'];
	if(empty($gold) && empty($nick)){
	echo"<b><font color='red'>preencha todos os campos!!";
	}else{
	
	$pasta = $dirUserData . ( $func->numDir($nick)) . "/" . $nick . ".dat";
	
	$_POST['gold']=$func->getInt($_POST['gold']);

            if( $_POST['gold']<=500000000)
            {
                $fRead=false;
                $fOpen = fopen($pasta, "r");
                while (!feof($fOpen)) {
                @$fRead = "$fRead" . fread($fOpen, filesize($pasta) );
                }
                fclose($fOpen);

                $gold=pack("i",$_POST['gold']);

                $sourceStr = substr($fRead, 0, 340) . $gold . substr($fRead, 344);
                $fOpen = fopen($pasta, "wb"); 
                fwrite($fOpen, $sourceStr, strlen($sourceStr));
                fclose($fOpen);


                echo "<div class='notice notice-sucesso'>
<strong>Pronto!</strong> você adicionou ".$_POST['gold']." em gold ao char $nick.
</div>";
            }
            else
            {
                echo "<div class='notice notice-danger'>
<strong>Erro!</strong> DINHEIRO MAXIMO PERMITIDO é de 500000000.
</div>";
            }

	
	
	
	
	}
	}
	
	
	
	
	?></td>
  </tr>
</table>
</body>
</html>
