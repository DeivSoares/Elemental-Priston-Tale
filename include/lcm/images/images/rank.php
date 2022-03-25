<?php
/* Rank Editado por Jeck Enjoy Respeite os Créditos =D

*/
session_start();
		
	$cfg['rank'] = 25;
		if(isset($_GET['rank'])){
	 		$rank = $_GET['rank'];
		} else {
	 		$rank = "Level";
		}
		
		if(!isset($_GET['pg'])) {
	 		$pg = 1;
		} else {
	 		$pg = $_GET['pg'];
		}
		
		if($pg > 11){
	 		$inicio = 11;
		}else{
	 		$inicio = $pg - 1;
		}
			$ini = $inicio * $cfg['rank'];
			$prox = $cfg['rank'] * $pg + 1;
			$prox_ = $cfg['rank'] * $pg + $cfg['rank'];
		
		if($pg == 2){
	 		$ante = "1-".$cfg['rank'];
		}elseif($pg > 2){
	 		$aa = $pg - 1;
	 		$b = $pg - 2;
	 		$a = $cfg['rank'] * $b;
	 		$ante = $a+'1'."-".$cfg['rank']*$aa;
		}
	
		if($pg == 1 or $pg == ""){
			$asd = " ";
		}else{
	 		$asd = " | ";
		}
?>
<HTML>
<HEAD>
<TITLE>thunderpt - Official RAncking</TITLE>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
		<style type="text/css"> BODY { BACKGROUND-COLOR: #000000 } </style>
		

					<style type="text/css"> 
					BODY { FONT-SIZE: 12px; COLOR: #f9feef; LINE-HEIGHT: 16px; FONT-FAMILY: Tahoma } TD {
	FONT-SIZE: 12px;
	COLOR: #FFFFFF;
	LINE-HEIGHT: 16px;
	FONT-FAMILY: Tahoma
} TH { FONT-SIZE: 12px; COLOR: #f9feef; LINE-HEIGHT: 16px; FONT-FAMILY: Tahoma } .STYLE1 { COLOR: #bfff62 } 
.bordas_tabela {
	border: 1px solid #E1E1E1;
	border-collapse: collapse;
}
.STYLE4 {
	FONT-WEIGHT: bold;
	COLOR: #ffff00
} 
					</style>
<style type="text/css">
					.style19 { FONT-WEIGHT: bold; COLOR: #9ccf00 } .style8 { COLOR: #ffffff } .p2 { FONT-SIZE: 12px; LINE-HEIGHT: 200% } .style111 { FONT-WEIGHT: bold } .style14 { FONT-WEIGHT: bold } .style41 { COLOR: #9ccf00 } a:link {
	color: #FFFFFF;
	font-family: tahoma;
	font-size: 12px;
	font-weight: normal;
	text-decoration: underline;
}

font:hover {
	color: F4FF00;
	font-family: tahoma;
	font-size: 12px;
	font-weight: normal;
	text-decoration: underline;
}

a:visited {
	color: #FFFFFF;
	font-family: tahoma;
	font-size: 12px;
	font-weight: normal;
}

a:hover {
	color: #FFFF00;
	font-family: tahoma;
	font-size: 12px;
	font-weight: normal;
	text-decoration: underline;
}
.style112 {
	color: F4FF00;
	font-weight: normal;
	font-size: 13px;
}
                    </style>
</HEAD>
	<BODY LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0"   onkeypress="if(event.keyCode==13){document.getElementById('imgbtn_reg').click();return false}">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>

                <td align="center">&nbsp;</td>
              </tr>
</table>
			<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" background="">
				<TBODY>
					<tr>
						<td width="1" valign="top">&nbsp;</td>
					    <td width="1" valign="top">&nbsp;</td>
					    <td width="25" valign="top">&nbsp;</td>
						<td width="933" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<TBODY>
									<tr>
										<td width="695" height="19" align="ceter" background=""
											class="cc">&nbsp;											</td>
								  </tr>
									<tr>

										<td><table width="90%" border="0" align="center">
												<TBODY>
													<tr>
														<td><br>
												     
														  <div align="center"><br>
													      <br>
														  </div>
															
															
<center>
															    <br>
															    <form name="form" id="form">
															      <p><img src="toprankind.gif" width="448" height="75"><br>
                                                                  <a href="?act=highscores&amp;rank=Prist"><img src="classe_priest.gif" width="58" height="37" border="0"></a><a href="?act=highscores&amp;rank=Ps"><img src="classe_pike.gif" width="43" height="37" border="0"></a><a href="?act=highscores&amp;rank=Ms"><img src="classe_mech.gif" width="51" height="37" border="0"></a><a href="?act=highscores&amp;rank=Mg"><img src="classe_mago.gif" width="49" height="37" border="0"></a><a href="?act=highscores&amp;rank=Ks"><img src="classe_kina.gif" width="50" height="37" border="0"></a><a href="?act=highscores&amp;rank=Fs"><img src="classe_fs.gif" width="65" height="37"border="0"></a><a href="?act=highscores&amp;rank=Ata"><img src="classe_ata.gif" width="71" height="37" border="0"></a><a href="?act=highscores&amp;rank=As"><img src="classe_as.gif" width="60" height="37" border="0"></a>
															      <div align="center"><strong><a href="?act=highscores&amp;rank=Top250"><font color="#FF0000">Todos</font></a></strong><br>
														  </div>
															    </form>
                          </center>
                                                            
															<div align="center"><strong><a href="Index.php"><font color="#FF0000">Voltar</font></a></strong><br>
														  </div>
															<table width="100%" border="0" cellspacing="0" cellpadding="2" >
                                                              <tr>
                                                                <td width="87%" valign="top"><table width="53%" border="1" cellpadding="2" cellspacing="0" align="center" bordercolor="#EEEEEE" class="bordas_tabela">
                                                                    <tr>
                                                                      <td width="8%" background="img/bg.gif"><div align="center" class="style112">Posição</div></td>
                                                                      <td width="32%" class="style112" background="img/bg.gif">Nickname</td>
                                                                      <td width="20%" background="img/bg.gif"><div align="center" class="style112">Personagem</div></td>
                                                                       <td width="12%" background="img/bg.gif"><div align="center" class="style112">Nível</div></td>
                                                                     
                                                                    </tr>
                                                                    <?php
	  switch($rank){
	  	case "Ms":
	   		$id = Mechanician;
	   	break;
	  	case "Fs":
	   		$id = Fighter;
	   	break;
		  case "Ps":
		   	$id = Pikeman;
		  break;
		  case "As":
		   	$id = Archer;
		  break;
		  case "Mg":
		   	$id = Magician;
		  break;
		  case "Ks":
		   	$id = Knight;
		  break;
		  case "Ata":
		   	$id = Atalanta;
		  break;
		  case "Prist":
		   	$id = Priestess;
		  break;
	 	}
	 	
	 	if($rank == "Level") {
		
		
$dbhost = 'DRIVER={SQL Server};SERVER=VETE\SQLEXPRESS;DATABASE=rPTDB';
$dbuser = "sa";
$dbpass = "245873";

$connection = odbc_connect($dbhost, $dbuser, $dbpass);

$verifica = "SELECT TOP 50 * FROM LevelList WHERE  CharClass < 'Unknown ID: 0' and CharName != '[GM]Meryt' and CharName != '[GM]EsdrasS' and CharName != '[GM]Black' and CharName != '[GM]FegaroX' and CharName != '[GM]FegaroX' and CharName != '[ADM]Ney' and CharName != 'cucaopirata¹' and CharName != '[GM]Knuckles' and CharName != '[GM]DeviL' and CharName != '[GM]Hant' and CharName != '[GM]ThePower' and CharName != '[GM]Flamenguista' and CharName != 'AmoOGMFurius' and CharName != '[GM]Avelin' and CharName != '[GM]Natrix' and CharName != '[ADM]1nFernOPT' and CharName != '[GM]JK' and CharName != '[GM]Sonny' and CharName != '[GM]UnderTaker' and CharName != '[GM]FuriuS' and CharName != '[GM]Folgado' and CharName != '[GM]HantKS' and CharName != '[GM]Deskil' and CharName != '[ADM]Vahvel' and CharName != '[GM]Soluction' and CharName != '[GM]SrBan' and CharName != '[GM]Hant' and CharName != '[GM]Flamenguista' and CharName != '[GM]Meryt' ORDER BY CharLevel DESC ";

$rank = odbc_exec($connection, $verifica);
		  
		  if($pg == 1 or $pg == 0){
		  	$i = 1;
		  }elseif($pg > 1){
		  	$i = $ini+1;
		  }
		  
		  while($dados = odbc_fetch_array($rank)) {
		  	$id=$i+1;
				echo ($i % 2) ? "<tr bgcolor=\"#000000\">" : "<tr bgcolor=\"#202020\">";
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.$dados['CharName'].'</td>';
				echo '<td><center>'.$dados['CharClass'].'</center></td>';
				echo '<td><center>'.$dados['CharLevel'].'</center></td>';
				echo '</tr>';
		    $i++;
		  }
	  	
	  	if($tr > $cfg['rank']){
	   		echo '<table width="90%" border="0" cellpadding="2" cellspacing="0"><tr><td colspan=4><div align="left">';
	   	
		}    
		}
		elseif($rank == "Top100") {
	  	$dbhost = 'DRIVER={SQL Server};SERVER=VETE\SQLEXPRESS;DATABASE=rPTDB';
$dbuser = "sa";
$dbpass = "245873";

$connection = odbc_connect($dbhost, $dbuser, $dbpass);

$verifica = "SELECT TOP 100 * FROM LevelList WHERE  CharClass < 'Unknown ID: 0' and CharName != '[GM]Meryt' and CharName != '[GM]SrBan' and CharName != '[GM]Black' and CharName != '[GM]FegaroX' and CharName != '[GM]InFernal' and CharName != '[ADM]Ney' and CharName != 'cucaopirata¹' and CharName != '[GM]Knuckles' and CharName != '[GM]DeviL' and CharName != '[GM]Hant' and CharName != '[GM]ThePower' and CharName != '[GM]Flamenguista' and CharName != 'AmoOGMFurius' and CharName != '[GM]Avelin' and CharName != '[GM]Natrix' and CharName != '[ADM]1nFernOPT' and CharName != '[GM]JK' and CharName != '[GM]Sonny' and CharName != '[GM]UnderTaker' and CharName != '[GM]FuriuS' and CharName != '[GM]Folgado' and CharName != '[GM]HantKS' and CharName != '[GM]Deskil' and CharName != '[ADM]Vahvel' and CharName != '[GM]Soluction' and CharName != 'Itens105a' and CharName != 'Folgado' and CharName != 'Itens105b' and CharName != 'Itens105c' ORDER BY CharLevel DESC ";

$rank = odbc_exec($connection, $verifica);
		  
		  if($pg == 1 or $pg == 0){
		  	$i = 1;
		  }elseif($pg > 1){
		  	$i = $ini+1;
		  }
		  
		  while($dados = odbc_fetch_array($rank)) {
		  	$id=$i+1;
				echo ($i % 2) ? "<tr bgcolor=\"#000000\">" : "<tr bgcolor=\"#202020\">";
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.$dados['CharName'].'</td>';
				echo '<td><center>'.$dados['CharClass'].'</center></td>';
				echo '<td><center>'.$dados['CharLevel'].'</center></td>';
				echo '</tr>';
		    $i++;
		  }
	  	
	  	if($tr > $cfg['rank']){
	   		echo '<table width="90%" border="0" cellpadding="2" cellspacing="0"><tr><td colspan=4><div align="left">';
	   	
		}    
		}
		elseif($rank == "Top250") {
	  	$dbhost = 'DRIVER={SQL Server};SERVER=VETE\SQLEXPRESS;DATABASE=rPTDB';
$dbuser = "sa";
$dbpass = "245873";

$connection = odbc_connect($dbhost, $dbuser, $dbpass);

$verifica = "SELECT TOP 250 * FROM LevelList WHERE  CharClass < 'Unknown ID: 0' and CharName != '[GM]Meryt' and CharName != '[GM]EsdrasS' and CharName != '[GM]Black' and CharName != '[GM]FegaroX' and CharName != '[GM]InFernal' and CharName != '[ADM]Ney' and CharName != 'cucaopirata¹' and CharName != '[GM]Knuckles' and CharName != '[GM]DeviL' and CharName != '[GM]Hant' and CharName != '[GM]ThePower' and CharName != '[GM]Flamenguista' and CharName != 'AmoOGMFurius' and CharName != '[GM]Avelin' and CharName != '[GM]Natrix' and CharName != '[ADM]1nFernOPT' and CharName != '[GM]JK' and CharName != '[GM]Sonny' and CharName != '[GM]UnderTaker' and CharName != '[GM]FuriuS' and CharName != '[GM]Folgado' and CharName != '[GM]HantKS' and CharName != '[GM]Deskil' and CharName != '[ADM]Vahvel' and CharName != '[GM]Soluction' and CharName != 'Itens105a' and CharName != 'Folgado' and CharName != 'Itens105b' and CharName != 'Itens105c' ORDER BY CharLevel DESC ";

$rank = odbc_exec($connection, $verifica);
		  
		  if($pg == 1 or $pg == 0){
		  	$i = 1;
		  }elseif($pg > 1){
		  	$i = $ini+1;
		  }
		  
		  while($dados = odbc_fetch_array($rank)) {
		  	$id=$i+1;
				echo ($i % 2) ? "<tr bgcolor=\"#000000\">" : "<tr bgcolor=\"#202020\">";
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.$dados['CharName'].'</td>';
				echo '<td><center>'.$dados['CharClass'].'</center></td>';
				echo '<td><center>'.$dados['CharLevel'].'</center></td>';
				echo '</tr>';
		    $i++;
		  }
	  	
	  	if($tr > $cfg['rank']){
	   		echo '<table width="90%" border="0" cellpadding="2" cellspacing="0"><tr><td colspan=4><div align="left">';
	   	
		}    
		}
	 	 else {
	  	$dbhost = 'DRIVER={SQL Server};SERVER=VETE\SQLEXPRESS;DATABASE=rPTDB';
$dbuser = "sa";
$dbpass = "245873";

$connection = odbc_connect($dbhost, $dbuser, $dbpass);

$verifica = "SELECT TOP 50 * FROM LevelList WHERE  CharClass < 'Unknown ID: 0' and CharName != '[GM]Meryt' and CharName != '[GM]EsdrasS' and CharName != '[GM]Black' and CharName != '[GM]FegaroX' and CharName != '[GM]InFernal' and CharName != '[ADM]Ney' and CharName != 'cucaopirata¹' and CharName != '[GM]Knuckles' and CharName != '[GM]DeviL' and CharName != '[GM]Hant' and CharName != '[GM]ThePower' and CharName != '[GM]Flamenguista' and CharName != 'AmoOGMFurius' and CharName != '[GM]Avelin' and CharName != '[GM]Natrix' and CharName != '[ADM]1nFernOPT' and CharName != '[GM]JK' and CharName != '[GM]Sonny' and CharName != '[GM]UnderTaker' and CharName != '[GM]FuriuS' and CharName != '[GM]Folgado' and CharName != '[GM]HantKS' and CharName != '[GM]Deskil' and CharName != '[ADM]Vahvel' and CharName != '[GM]Soluction' and CharName != 'Itens105a' and CharName != 'Folgado' and CharName != 'Itens105b' and CharName != 'Itens105c' and CharClass = '$id'  ORDER BY CharLevel DESC ";

$rank = odbc_exec($connection, $verifica);
		  
		  if($pg == 1 or $pg == 0){
		  	$i = 1;
		  }elseif($pg > 1){
		  	$i = $ini+1;
		  }
		  
		  while($dados = odbc_fetch_array($rank)) {
		  	$id=$i+1;
				echo ($i % 2) ? "<tr bgcolor=\"#000000\">" : "<tr bgcolor=\"#202020\">";
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.$dados['CharName'].'</td>';
				echo '<td><center>'.$dados['CharClass'].'</center></td>';
				echo '<td><center>'.$dados['CharLevel'].'</center></td>';
				echo '</tr>';
	    	 $i++;
		  }
	  	
	  	if($tr > $cfg['rank']){
	   		echo '<table width="90%" border="0" cellpadding="2" cellspacing="0"><tr><td colspan=4><div align="left">';
	   	
		}    
		}
		?><br>
<br>

                                                                </table></td>
                                                              </tr>
                                                            </table>
															
														</td>
													</tr>
										  </table>
											
										</td>
									</tr>

						  </table>
						</td>
						
					</tr>
				</TBODY>
			</table>
			<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>

                <td align="center">&nbsp;</td>
              </tr>
</table>
		
	</FONT></TR></TBODY></TABLE></TR></TBODY></TABLE></TR></TBODY></TABLE></TR></TBODY></TABLE>
	</BODY>
</HTML>
