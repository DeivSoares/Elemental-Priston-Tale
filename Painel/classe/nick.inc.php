<meta charset="utf-8" />
<?
include_once "injection.php";
if($func->saldo($_SESSION["ID"],"20") == false){
	echo "<div class='alert alert-danger text-center'>
                                    <span> Voc&ecirc; n&atilde;o tem cr&eacute;ditos suficientes para Alterar seu Nick!</span>
									<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
}else{
if($_POST[acao]=="nick"){
	$newName=trim($func->char_filter(trim($_POST["nick"])),"\x00");
	if(!$func->is_valid_string($newName)){
		$charInfo=$dirUserInfo . ($func->numDir($_SESSION["charID"])) . "/" . $_SESSION["charID"] . ".dat";
		if(file_exists($charInfo) && ( filesize($charInfo)==240) ){
			$fOpen = fopen($charInfo, "r");
			$fRead =fread($fOpen,filesize($charInfo));
			@fclose($fOpen);
			$charNameArr=array(
			"48" => trim(substr($fRead,0x30,15),"\x00"),
			"80" => trim(substr($fRead,0x50,15),"\x00"),
			"112"=> trim(substr($fRead,0x70,15),"\x00"),
			"144"=> trim(substr($fRead,0x90,15),"\x00"),
			"176"=> trim(substr($fRead,0xb0,15),"\x00"),
			"208"=> trim(substr($fRead,0xd0,15),"\x00"),
			);
			$charDat = $dirUserData .($func->numDir($newName))."/". $newName.".dat";
			if(!file_exists($charDat)){
				unset($flagArr);
				$flagArr=array();
				$sessNameExp=explode("\x00",$_SESSION["charName"]);
				foreach($charNameArr as $key=>$value){
					$expValue=explode("\x00",$value);
					if($sessNameExp[0]==$expValue[0])
					$flagArr[]=$key;
				}
				$startPoint=$flagArr[0];
				$endPoint=$startPoint+15;
				$fRead=false;
				$fOpen = fopen($charInfo, "r");
				while(!feof($fOpen)){
					@$fRead = "$fRead".fread($fOpen,filesize($charInfo));
				}
				fclose($fOpen);
				$leftLen=15-strlen($newName);
				for($i=0;$i<$leftLen;$i++){
					$addOnLeft.=pack("h*",00);
				}
				$writeName=$newName.$addOnLeft;
				$sourceStr = substr($fRead, 0, $startPoint) . $writeName . substr($fRead, $endPoint);
				$fOpen = fopen($charInfo, "wb"); 
				fwrite($fOpen, $sourceStr, strlen($sourceStr));
				fclose($fOpen);
				$fRead=false;
				$fOpen = fopen($_SESSION["charDir"], "r");
				while(!feof($fOpen)){
					@$fRead = "$fRead".fread($fOpen, filesize($_SESSION["charDir"]));
				}
				fclose($fOpen);
				$sourceStr = substr($fRead, 0, 16) . $writeName . substr($fRead, 31);
				$fOpen = fopen($_SESSION["charDir"], "wb"); 
				fwrite($fOpen, $sourceStr, strlen($sourceStr));
				fclose($fOpen);
				rename($dirUserData.$_SESSION["charNum"]."/".$_SESSION["charName"].".dat",$dirUserData.($func->numDir($newName))."/".$newName.".dat");
                                echo "<div class='alert alert-success text-center'>
<span> Parab&eacute;ns seu nick foi alterado com sucesso!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
				$func->atualiza_saldo($_SESSION["ID"],"20");
				$_SESSION["charDir"]=$dirUserData . ($func->numDir($newName)) . "/" . $newName. ".dat";
				$_SESSION["charName"]=$newName;
				$_SESSION["charNum"]=$func->numDir($newName);
			}else{
                                echo "<div class='alert alert-warning text-center'>
<span> Desculpe mais um Player, j&aacute; esta utilizando este Nick!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
			}
		}else{
			echo "CHARACTER INFORMATION IS NOT EXISTING OR CORRUPTED!
			<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
		}
	}else{
                echo "<div class='alert alert-warning text-center'>
<span> Por favor, use somente letras de A-Z e Numeros de 1-9 nao use caracteres invalidos, pois sao desconciderados!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
	}
	echo "";
}}
?>