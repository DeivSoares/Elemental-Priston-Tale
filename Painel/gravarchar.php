<?php
/*----------------------------------------------------------------------
Painel Player Versão 0.4
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Editado Por: Jiraya (richard.cva21@hotmail.com(
----------------------------------------------------------------------*/
$nomechar = $_POST["newchar"];
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$id = $_SESSION["ID"];
$dados = "$nomechar;$dia;$mes;$ano;$id\r\n";

//nome do arquivo texto:
$arq = "Logs/personagens.txt";

$abre = fopen($arq, "r");
$total = @fread($abre, filesize($arq));
fclose($abre);

@$abre = fopen($arq, "w");
$total = "$dados  $total";
@$salva = fwrite($abre, $total);

//fecha o arquivo
@fclose($abre);
?>

