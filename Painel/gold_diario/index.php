<? if (DexteR!=1) exit;
$username=$_SESSION["ID"];
?>

<h4 class="title text-left"><span class="fa fa-angle-right"></span> Gold Diário</h4><hr />
<br>
<center>
<br>
<a href="?sess=gold_diario_rankings" target="_self"><input type="submit" value=" Ranking MAX/MIN " class="btn btn-primary"></a>
<a href="?sess=gold_diario" target="_self"><input type="submit" value=" Sistema de Gold Diário " class="btn btn-primary"></a>
<a href="?sess=gold_diario_saques" target="_self"><input type="submit" value=" Gold's Recebidos " class="btn btn-primary"></a>

<br><br></center>
<div class="ucp_divider"></div>
		
		
	
		
		
		<div class="gold_diario_fundo"></div>
		
	   
		<center><div class="quest_text">
		<div>Neste evento você poderá participar somente 1 vez todos os dias. É muito simples para participar, basta você selecionar o personagem no qual você quer que o gold seja entregue!
</p></div><br>
		
		<div>Você poderá ganhar de 1,000,000 (1kk) até 3,000,000 (3kk), basta ter sorte.
</div>		
		<div>Você poderá tirar o gold com o personagem escolhido na cidade de Ricarten ou Pillai, no Distribuidor!</div><br></div>
        

		
		
		
		
		
		
		
		
		<?
		 if($_POST[acao]!="Clique aqui para receber o gold!")
        {
		?>
		
		<form method="post" class="page_form" accept-charset="utf-8" onSubmit="disabledBttn(this)" action="?sess=gold_diario">
		<table style="width:95%; margin-bottom:5px; margin-top:15px;">
		 <tr align="center">
				<td style="width:15%"><label><h5>ESCOLHA O PERSONAGEM NO QUAL VOCÊ QUER QUE SEJA O GANHADOR DO GOLD:</h5></label></td>
              </tr>
              <tr align="center">
                <td><label>
				 <select style="-webkit-appearance: none;" name="nick" id="nick" class="form-control">
<?
            $qCharID=($_SESSION["charID"])?$_SESSION["charID"]:$_SESSION["ID"];
            $charInfo=$dirUserInfo . ($func->numDir($qCharID)) . "/" . $qCharID . ".dat";

            if(file_exists($charInfo) && ( filesize($charInfo)==240) )
            {
                $fRead=false;
                $fOpen = fopen($charInfo, "r");
                $fRead =fread($fOpen,filesize($charInfo));
                @fclose($fOpen);
				

                // list char information
                $charNameArr=array(
                    "48" => trim(substr($fRead,0x30,15),"\x00"),
                    "80" => trim(substr($fRead,0x50,15),"\x00"),
                    "112"=> trim(substr($fRead,0x70,15),"\x00"),
                    "144"=> trim(substr($fRead,0x90,15),"\x00"),
                    "176"=> trim(substr($fRead,0xb0,15),"\x00"),
                    "208"=> trim(substr($fRead,0xd0,15),"\x00"),
                );

                if(count($charNameArr)>0)
                {
                    foreach($charNameArr as $key=>$value)
                    {
                        $expValue=explode("\x00",$value);
                        if($expValue[0]!=""){ echo "<option >".$expValue[0]."</option>"; }
                    }
                }
                else
                {
                    echo "VAZIO";
                }

            }
            else
            {
                echo "VAZIO";
            }

?>
                </select>
                </label></td>
              </tr>
			  
			  
			  
			  
			  
			  
			  
			  
			  
		</table>
	<center style="margin-bottom:30px;"><br>
		<input type="submit" name="login_submit" class="btn btn-primary" value="Clique aqui para receber o gold!" />
            <input type="hidden" name="acao" value="Clique aqui para receber o gold!">
	</center>
</form>


<?
		
        }
        if($_POST[acao]=="Clique aqui para receber o gold!")
        {
			$ip = $_SERVER["REMOTE_ADDR"];
	 $data = date("d/m/Y");
	 $hora = date("H:i:s");

	$de = "1000000"; // 1kk
	$ate = "3000000"; // 3kk
	$item = "gg101";

	$quantidade = mt_rand($de,$ate);
	
	$goldkk = $quantidade/10000000;
	$goldkk = number_format($quantidade, 0, ',', '.');

	
   function subDiretorio($pasta)
{
 	$total = 0;
	for($i=0;$i<strlen($pasta);$i++)
	{			
		$total += ord(strtoupper($pasta[$i]));
			if($total >= 256)
			{
				$total = $total - 256;
			}
		
	}
	return $total;
}
	$id = $_SESSION["ID"];				
	$nick = $_POST['nick'];
	$ipgold = $_SERVER["REMOTE_ADDR"];

		
	if(empty($nick)){
		echo "<div class='alert alert-warning'>
<button type='button' class='close'><a href='index.php'><span aria-hidden='true'>&times;</span></a></button>
<span><b> Volte amanhã!</span>";
	}elseif (ereg ("'", $nick)){
		 echo "<div class='alert alert-warning'>
<button type='button' class='close'><a href='index.php'><span aria-hidden='true'>&times;</span></a></button>
<span><b> Volte amanhã!</span>";
	} else {
		
		$queryid = "SELECT * FROM [painel].dbo.[Gold_Diario] WHERE [ID]='$id' AND [Data]='$data'";
                $q = odbc_exec($connection, $queryid);

                $qtid = odbc_do($connection, $queryid);
                $i = 0;
                while(odbc_fetch_row($qtid)) $i++;

				
                if($i>0){
                    echo "<div class='alert alert-danger'>
<span><b> O Gold Diário só pode ser retirado uma vez por dia. Volte amanhã!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=gold_diario'>";
	}else{
		
		$queryid = "SELECT * FROM [painel].dbo.[Gold_Diario] WHERE [IP]='$ipgold' AND [Data]='$data'";
                $q = odbc_exec($connection, $queryid);

                $qtid = odbc_do($connection, $queryid);
                $i = 0;
                while(odbc_fetch_row($qtid)) $i++;

				
                if($i>0){
                    echo "<div class='alert alert-warning'>
<span><b> Detectamos que você está tentando receber o Gold Diário em outra conta!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=gold_diario'>"
;
	}else{
			
		//Dados do Item
		$dados_item = "$nick $item $quantidade \"Evento Gold Diario\"". "\r\n";

		//Pasta de entrega
		$pasta_entrega = "".$rootDir."/PostBox/".subDiretorio($id)."/".$id.".dat";
		
	
	$query_4 = "INSERT INTO [painel].dbo.[Gold_Diario] ([ID],[Nick],[Ouro],[Data],[Hora],[IP]) VALUES ('$id','$nick','$quantidade','$data','$hora','$ipgold')";

	$q_4 = odbc_exec($connection, $query_4);
	
	
    if ($q_4){
	
//Enviando o Item para o Distribuidor
if (file_exists($pasta_entrega)) {
$fp = fopen($pasta_entrega, "a+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_item");
// Fecha o arquivo
fclose($fp);
} else {
copy("C:/inetput/wwwroot/painel/item_diario/shop.dat",$pasta_entrega);
$fp = fopen($pasta_entrega, "r+");
//Escreve o pedido
$escreve = fwrite($fp, "$dados_item");
// Fecha o arquivo
fclose($fp);
}   
	echo "<div class='alert alert-success'>
<span><b> Parabéns ".$nome." seu personagem $nick ganhou $goldkk em gold!</span>
<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=gold_diario'>";
	} else {
		echo "<div class='warning-message'>Algum erro ocorreu, contate o adminsitrador!</div>
		<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?sess=gold_diario'>";
	}
			
		}	}  }}
?>