<?
if (DexteR!=1) exit;

$username=$_SESSION["ID"];
$pasta = $func->numDir($qCharID);

session_unregister("enviado");

//Arquivo do Extrato
$arquivo_extrato = "shop/historic/$username.his";
//Pasta de Controle de Pontos Bonus
$arquivo_bonus = "shop/bonusplayer/$username.arc";
$pega_bonus_zero = "shop/bonusplayer/bonus_zero.arc";
//Verifica se pasta de Bonus Existe
if (!file_exists($arquivo_bonus)) {
copy($pega_bonus_zero, $arquivo_bonus);
}


//Pega os B�nus do Player
$abreB = fopen($arquivo_bonus, "r");
$saldoB = fread($abreB, filesize($arquivo_bonus));
fclose($abreB);

?>
<h4 class="title text-left"><span class="fa fa-angle-right"></span> Extrato de Compras Realizadas</h4><hr />
      <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#333333">
<tr>
        <td align="center" bgcolor="#CCCCCC"><strong>Item</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Spec</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Char</strong></td>
		<td align="center" bgcolor="#CCCCCC"><strong>Quantidade</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Data</strong></td>
        <td align="center" bgcolor="#CCCCCC"><strong>Valor</strong></td>
      </tr>
<?php
//Verifica se arquivo existe
if (file_exists($arquivo_extrato)) {

//ABRE O ARQUIVO
$ponteiro = fopen($arquivo_extrato, "r");
//L�
$conteudo = fread($ponteiro, filesize($arquivo_extrato) );
//FECHA O ARQUIVO
fclose($ponteiro);
//EXPLODE AS LINHAS QUANDO PULAR LINHA
	$linha = explode("\r", $conteudo);

for($i = 0; $i < sizeof($linha); $i++) {


 //SEPARANDO OS DADOS POR ; (PONTO E VIRGULA)
 $parte = explode(";", $linha[$i]);

 $char_pegou =  trim("$parte[0]");
 $nome_item =  trim("$parte[1]");
 $valor_item =  trim("$parte[2]");
 $quantidade =  trim("$parte[3]");
 $spec_item =  trim("$parte[4]");
 $data_compra =  trim("$parte[5]");

 if (!$char_pegou) {} else {
?>
        <tr>
        <td align="center" bgcolor="#FFFFFF"><? echo $nome_item; ?></td>
        <td align="center" bgcolor="#FFFFFF"><? echo $valor_item; ?> </td>
        <td align="center" bgcolor="#FFFFFF"><? echo $char_pegou; ?></td>
		<td align="center" bgcolor="#FFFFFF"><? echo $quantidade; ?></td>
        <td align="center" bgcolor="#FFFFFF"><? echo $spec_item; ?>  </td>
        <td align="center" bgcolor="#FFFFFF"><? echo $data_compra; ?> </td>
      </tr>

  <?
              }
}
}
else
{
}
?>
</table>
</td>
  </tr>
</table>