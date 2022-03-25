<?if (PT!=1) exit;?>
<?php
if($_POST[acao]!="logs")
{
?>

  <form method="post" onSubmit="disabledBttn(this)" action="<?=$_SERVER[PHP_SELF]."?".$_SERVER[QUERY_STRING]?>">
	<table background="imgs/fundo_textura1.gif" width="722" border="0" align="center" cellpadding="0" cellspacing="0">
 <div class="notice notice-info">
Busca de Log's por IP
</div>             
			  
<div class="form-group">
            <input type="text" class="form-control" name="ip" id="ip" placeholder="IP" required/>
</div>  

<select name="tipo" class="form-control">
              <option value="0">Item pego do chão</option>
              <option value="2">Recebeu Item/Gold em trade</option>
              <option value="3">Mixagem completa</option>
              <option value="4">Item ainda para maturar(Age)</option>
              <option value="5">Item comprado do NPC</option>
              <option value="6">Item dropado no chão</option>
              <option value="7">Item vendido no NPC</option>
			  <option value="8">Item/Gold passado em trade</option>
			  <option value="9">Item colocado no Mix</option>
 			  <option value="10">Item colocado no age</option>
			  <option value="12">Item já maturado</option>
			  <option value="22">Gold Recebido em loja/ Item comprado em loja</option>			  
			  <option value="23">Vendeu item em loja/ Comprou em loja(gold)</option>
			  <option value="24">Force Orb Usado</option>
			  <option value="25">Shelton colocado no Orb Master</option>
			  <option value="26">Force Orb completo</option>
		  </select>
		  <br>
                  <input name="submit2" type="submit" class="btn btn-primary" value="Procurar" />
                    <input name="acao" type="hidden" id="acao" value="logs" />
                  <br><br>
                    <p><strong>Instru&ccedil;&otilde;es de como Utilizar o Sistema de Busca de logs por IP<br>
                    <strong>Exemplo</strong>: você, quer fazer uma verificação de ip informe o ip exemplo 192.168.1.100<br>
                    </strong>1 Passo - Digite o IP do Player que você deseja verificar os logs.<br> 
                    2 Passo - Em ação escolha a ação que você deseja ficar informado.<br>
                   <strong>Exemplos</strong>: Item pego do chão, se ele pegou item do chão, mostra se não foi de ninguem que dropou dia hora, etc..<br>
                    3 Passo - Clique em Procurar<br /></p>
                 
           </form>
<?php
}
else
{
$username = $_POST['ip'];
$tipo = $_POST['tipo'];
$tipo = trim($tipo);

				//Verificando se Existe essa ID
				$connection = odbc_connect( $connection_string, $user, $pass );
                $query = "SELECT * FROM [ITEMLogDB].[dbo].[IL]  WHERE [IP]='$username' and [Flag]='$tipo' " ;
                $q = odbc_exec($connection, $query);
                $qt = odbc_do($connection, $query);

            while(odbc_fetch_row($qt)){
			$order=odbc_result($qt,1);
		    $UserID=odbc_result($qt,2);
		    $CharName=odbc_result($qt,3);
            $IP=odbc_result($qt,4);
            $flag=odbc_result($qt,5);
            $TUserID=odbc_result($qt,6);
		    $TCharName=odbc_result($qt,7);
	        $TMoney=odbc_result($qt,8);
		    $TIP=odbc_result($qt,9);
		    $COD1=odbc_result($qt,13);
		    $COD2=odbc_result($qt,12);
	        $data=odbc_result($qt,14);
			
$goldkk = $TMoney/1000000;	
if ($flag == "0") { $txtflag = "Item pego do chão";	}
if ($flag == "2") { $txtflag = "Recebeu Item/Gold em trade";	}
if ($flag == "3") { $txtflag = "Mixagem completa";	}
if ($flag == "4") { $txtflag = "Item ainda para maturar(Age)";	}
if ($flag == "5") { $txtflag = "Item comprado do NPC";	}
if ($flag == "6") { $txtflag = "Item dropado no chão";	}
if ($flag == "7") { $txtflag = "Item vendido no NPC";	}
if ($flag == "8") { $txtflag = "Item/Gold passado em trade";	}
if ($flag == "9") { $txtflag = "Item colocado no Mix";	}
if ($flag == "10") { $txtflag = "Item colocado no age";	}
if ($flag == "12") { $txtflag = "Item já maturado";	}
if ($flag == "22") { $txtflag = "Gold Recebido em loja/ Item comprado em loja";	}
if ($flag == "23") { $txtflag = "Vendeu item em loja/ Comprou em loja(gold)";	}
if ($flag == "24") { $txtflag = "Force Orb Usado";	}
if ($flag == "25") { $txtflag = "Shelton colocado no Orb Master";	}
if ($flag == "26") { $txtflag = "Force Orb completo";	}

if ($flag <> "0" AND $flag <> "2" AND $flag <> "3" AND $flag <> "5" AND $flag <> "7" AND $flag <> "6" AND $flag <> "8" AND $flag <> "9" AND $flag <> "10" AND $flag <> "12" AND $flag <> "22" AND $flag <> "23" AND $flag <> "24" AND $flag <> "25" AND $flag <> "26") { $txtflag = $flag;	}
            if ($q && $qt)
            	{
?>
<table class ="table-striped" width="100%" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#b07f44">
<tr>
<td align="center">Ordem</font></td>
<td align="center">ID</font></td>
<td align="center">Nick</font></td>
<td align="center">IP</font></td>
<td  align="center">A&ccedil;&atilde;o</font></td>
<td align="center">ID quem recebeu </font></td>
<td align="center">Nick quem recebeu </font></td>
<td align="center">Gold</font></td>
<td align="center">IP quem recebeu </font></td>
<td align="center">C&oacute;digo do Item(Baixo)</font></td>
<td align="center">C&oacute;digo do Item(Cima) </font></td>
<td align="center">Data</font></td>
</tr>
<tr>
<td align="center"><? echo $order; ?>&nbsp;</td>
<td align="center"><? echo $UserID; ?>&nbsp;</td>
<td align="center"><? echo $CharName; ?>&nbsp;</td>
<td align="center"><? echo $IP; ?>&nbsp;</td>
<td align="center"><? echo $txtflag; ?>&nbsp;</td>
<td align="center"><? echo $TUserID; ?>&nbsp;</td>
<td align="center"><? echo $TCharName; ?>&nbsp;</td>
<td align="center"><? echo $goldkk; ?> kk</td>
<td align="center"><? echo $TIP; ?>&nbsp;</td>
<td align="center"><? echo $COD2; ?>&nbsp;</td>
<td align="center"><? echo $COD1; ?>&nbsp;</td>
<td align="center"><? echo $data; ?>&nbsp;</td>
</tr>
</table>
<?
} }	} 
?>

