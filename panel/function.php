<?php
function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}
function Clean(&$var,$valor,$start,$len,$qtd)
{
	for ($ai = 0; $ai < $qtd; $ai++)
		$var = substr_replace($var, $valor, $start + $ai, $len);
}
function Inverse($string,$len)
{
	$tam = strlen($string);
	$j = 0;
	$rr = '';
	for ($i = ($tam / $len); $i > 0;$i--)
	{
		$j++;
		$rr .= substr($string,$tam - ($len * $j) ,$len);
	}
	return $rr;
}
function MaxShortValue($valor)
{
	$valor = dechex($valor);
	if (strtoupper(substr($valor,0,2)) == 'FF')
		return 0xFFFF0000 | hexdec($valor);
	else
		return hexdec($valor);
}
function TesteInverseBin($valor)
{
	if (substr($valor,0,4) == 'FFFF')
		return substr($valor,2,6);
	else
		return $valor;
}
function MyDecHex($valor)
{
	return sprintf("%08x",$valor);
}
?>