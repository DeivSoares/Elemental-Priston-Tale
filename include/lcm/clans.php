<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
<title>Clans</title>
<style>
#Clans tr { /* Bota o Mouse estilo mãozinha quando passa por cima da tabela (mãozinha e meiu gay eu sei) */
	cursor:pointer;
	cursor:hand;
}
#Clans td {/* muda o esquema de corres da tabela de clans */
	background:#7b7171;
}
#Chars td {/* muda o esquema de corres da tabela de chars */
	background:#7b7171;
}
dl,dd { /* tirra a margin do DL e do DD*/
	margin: 0; 
}
dd {	/* coloca 3px de espaço interno na DD*/
	padding:3px;
}
ul { 	/* Configura a UL para não ter magin e não exibir como lista alen de linha no centro*/
	text-align:center;
	list-style: none; 
	margin:0px;
}

body {	/* Muda a cor de fundo da pagina de Clans*/
	background-color: #000005;
}





</style>
<script type="text/javascript" src="js/jquery.js"></script>
<!--

O script acima inclui a biblioteca do Jquery na pagina oque e muito importante pro slide quando clica

    +--------------------------------------------------------------------------------------------------------+
    |							Criador Por aron Peyroteo Cardoso											 |
    |							http://aron.thebestnight.com												 |
    +--------------------------------------------------------------------------------------------------------+
    
    
O script abaixo e oque faz o slide quando clica

-->
<script>
	$(document).ready(function(){
		$("dd").hide();
		$("dt a").click(function(){
			$(this).parent().next().slideToggle("slow");
			return false;
		});
	});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>
<td ><font color="white"face="tahoma"><CENTER><b>LISTA DE CLANS<b><BR>Clique para abrir</CENTER></font></td>
   </tr><BR>
 <table width="25%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr id="Clans">
    <td width="10%" height="30" align="center">&nbsp;</td>
    <td width="25%" height="30" align="center"><font color="white"face="arial"size="2"><b>Clan<b></font></td>
    <td width="35%" height="30" align="center"><font color="white"face="arial"size="2"><b>Lider<b></font></td>
    <td width="25%" height="30" align="center"><font color="white"face="arial"size="2"><b>Membros<b></font></td>
  </tr>
  <tr>
    <td colspan="4" align="center">
<?php
	  include("config.php");    //inclui o arquivo config.php contem os dados de conexão
	  include("func.php");      //inclui o arquivo func contem funções para o script  
	  
      $query1="SELECT * FROM [ClanDB].[dbo].[CL] ORDER BY MemCnt DESC";		//Query que pega todos os clans
	  $excuta_query1= odbc_exec($conectar, $query1);				//executa a query que pega todos os clans
	  
	  while($loop_CT=odbc_fetch_array($excuta_query1)){		//faz um loop com nos clans
?>
<dl>
<dt><a href="/">
<table border="0" cellpadding="3" cellspacing="1" id="Clans">
  <tr>
    <td width="10%" height="30" align="center"><?="<img src='".$cnf['clan'].$loop_CT['MIconCnt'].".bmp' border='0'>"?></td>
    <td width="25%"><?=$loop_CT['ClanName']?></td>
    <td width="35%"><?=$loop_CT['ClanZang']?></td>
    <td width="25%" align="center"><?=$loop_CT['MemCnt']?></td>
  </tr>
</table>
</a></dt>
    <dd><table width="85%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFE1A4">
          <tr id="Chars">
            <td width="50" height="25" align="center">Class</td>
            <td width="250" align="center">Nome</td>
            <td width="75" align="center">Level</td>
            <td width="75" align="center">Status</td>
          </tr>
        <?php
                $query2="SELECT * FROM [ClanDB].[dbo].[UL] WHERE ClanName='$loop_CT[ClanName]' ORDER BY ChLv DESC";		 //Query que pega usuarios do clan
                $excuta_query2 = odbc_exec($conectar, $query2);		//Executa a query que pega os usuarisos do clan
                while($loop_UL=odbc_fetch_array($excuta_query2)){ 	//faz um loop com os dados dos usuarios 
            ?>        
          <tr id="Chars">
            <td align="center"><?="<img src='imagens/spec/".char2Name($loop_UL['ChType']).".gif' alt='".char2Name($loop_UL['ChType'])."' border='0'>"?>                </td>
            <td><?=$loop_UL['ChName']?></td>
            <td align="center"><?=$loop_UL['ChLv']?></td>
            <td align="center">
			<?php 
			echo CharOnline($conectar, $loop_UL['ChName']);	//função que verifica se o usuario esta online retorna a imagem
			?></td>
          </tr>
        <?php
                }//fecha o loop dos usuarios do clan
        ?>
      </table>
    </dd>
</dl>
<?php
     }	//fecha o loop dos clans

	//Final Feliz =D
?>
</td>
  </tr>
</table>
</body>
</html>
