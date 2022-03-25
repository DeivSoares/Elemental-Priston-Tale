<?
header("Content-type:text/html;charset=UTF-8");
?> 
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<?
/*----------------------------------------------------------------------
Painel SparkyPT
----------------------------------------------------------------------*/
if (DexteR!=1) exit;

$username=$_SESSION["ID"];
$pasta = $func->numDir($qCharID);

session_unregister("enviado");

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
<div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal">
                    <li class="xn-logo">
                        <a href="index.php?sess=shop">Item Shop</a>
                        <a href="#" class="x-navigation-control"></a><hr>
                    </li>                          
					<li class="xn-openable">
                        <a href="#"><span class="xn-text">Defesa</span></a>
                        <ul>
                            <li><a href="?sess=Armor">Armaduras</a></li>
                            <li><a href="?sess=Robe">Roupões</a></li>
                            <li><a href="?sess=Shield">Escudos</a></li>
							<li><a href="#">Orbs</a></li>
							
                        </ul>
                    </li>
					<li class="xn-openable">
                        <a href="#"><span class="xn-text">Set's</span></a>
                        <ul>
                            <li><a href="?sess=Boots">Botas</a></li>
                            <li><a href="?sess=Gauntlets">Luvas</a></li>
                            <li><a href="?sess=Armlets">Braceletes</a></li>
							<li><a href="?sess=RingAmulet">Anéis</a></li>
							<li><a href="?sess=RingAmulet">Amuletos</a></li>
							<li><a href="?sess=Sheltons">Sheltons</a></li>
							
                        </ul>
                    </li>
					<li class="xn-openable">
                        <a href="#"><span class="xn-text">Armas</span></a>
                        <ul>
                            <li><a href="?sess=Arcos">Arcos</a></li>
                            <li><a href="?sess=Sword">Espadas</a></li>
                            <li><a href="?sess=Spear">Foices</a></li>
							<li><a href="?sess=Garras">Garras</a></li>
							<li><a href="?sess=Javelin">Lanças</a></li>
							<li><a href="?sess=Axe">Machados</a></li>
							<li><a href="?sess=Hammer">Martelos</a></li>
							<li><a href="?sess=Staff">Varinhas</a></li>
							
                        </ul>
                    </li> 
                    <!-- END SIGN OUT -->                                        
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- PAGE CONTENT WRAPPER -->
               
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
<?php
//Verifica se arquivo existe
if (file_exists($arquivo)) {

//ABRE O ARQUIVO
$ponteiro = fopen($arquivo, "r");
//L�
$conteudo = fread($ponteiro, filesize($arquivo) );
//FECHA O ARQUIVO
fclose($ponteiro);
//EXPLODE AS LINHAS QUANDO PULAR LINHA
	$linha = explode("\r", $conteudo);

if(!isset($colunas)) $colunas = 2;
$y=1;

	for($i = 0; $i < sizeof($linha); $i++) {


 //SEPARANDO OS DADOS POR ; (PONTO E VIRGULA)
 $parte = explode(";", $linha[$i]);

 $codigo_item = trim("$parte[0]");
 $nome_item =  trim("$parte[1]");
 $level_item =  trim("$parte[2]");
 $valor_item =  trim("$parte[3]");
 $spec_item =  trim("$parte[4]");
 $tipo_item =  trim("$parte[5]");
 $peso_item =  trim("$parte[6]");

 $resto = $y % $colunas;
?>
<div class="row">
<div class="col-md-4">
<br/>
<div class='alert alert-info text-center' role='alert'>
<span><b> <? echo $nome_item; ?></span></div>
<center>
<?php
$verifica_imagem[$i] = "shop/imgitens/it$codigo_item.bmp";
if (file_exists($verifica_imagem[$i])) {
echo "<img src='shop/imgitens/it$codigo_item.bmp' class='img-thumbnail'";
?>
<br/>
<hr/>

<?php
} else {
echo "<img src='http://sparkypt.no-ip.org/Painel/imgs/loading.gif' width='20' height='20'/>";
}
?>
</center>
<form name="form1" method="post" action="<? echo $_SERVER[PHP_SELF]; ?>?sess=compra">
	<select name="personagem" id="personagem" class="form-control">
                <option  value="" selected>Selecione o Personagem</option>
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
                    echo "Vazio";
                }

            }
            else
            {
                echo "Vazio";
            }

?></select>
<br/>
<? include ("shop/spec.inc.php"); ?><br/>
			<select name="quantidade" id="quantidade" class="form-control">
             <option value="0" selected="selected">Selecione a Quantidade</option>
			 <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
             <option value="8">8</option>
             <option value="9">9</option>
             <option value="10">10</option>
            </select>
<br/>
<center>
Level: <? echo $level_item; ?> - Valor: </font><? echo $valor_item; ?> Coins</center>
<?
			if ($valor_item > $saldoB) {
?>
<div class='alert alert-danger text-center' role='alert'>
<span><b> Voçê não possui COINS suficientes</span></div>

<? } else { ?>
		  <center>
		  <input name="nome" type="hidden" id="nome" value="<? echo $nome_item; ?>">
          <input name="valor" type="hidden" id="valor" value="<? echo $valor_item; ?>">
          <input name="acao" type="hidden" id="acao" value="Comprar">
          <input name="coditem" type="hidden" id="coditem" value="<? echo $codigo_item; ?>">
          <input name="arquivo" type="hidden" id="coditem" value="<? echo $arquivo; ?>">
          <br><? if($valor_item == 0){ echo "<br/>N�o Disponivel Para Compra <br/>"; }else{ ?>
          <input type="hidden" name="acao" value="nick">
		  <a href="#" class="mb-control" data-box="#comprar"><span class="btn btn-primary">Comprar</span></a>
		  
          <? } }?> </center>
		  <!-- Comprar BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="comprar">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-shopping-cart"></span><strong>Item Shop</strong></div>
                    <div class="mb-content">
                        <p>Tem certeza que deseja comprar este item?</p>                    
                        <p>Pressione Sim para efetuar a comprar.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary btn-lg" value="Sim">
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Comprar BOX-->
		  </form><br/>
</div>
<?
        if( $resto == 0) print "\n</tr>\n<tr>\n";

        $y++;

    }

             if( $resto != 0) print "\n</tr>";
}
else
{
}
?>
<br/><br/><br/><br/><br/>