<? if (PT!=1) exit;
?>


     <table width="100%" border="0" cellpadding="3" cellspacing="2">
    <tr>
      <td colspan="2" class="textoPPP" bgcolor="#cccccc"><div align="left"><strong><center> 
        <div align="center"><strong>Todas Contas Cadastradas no Servidor</strong></div>
      </div></td>
    </tr></table>
      <table width="100%" border="0" cellpadding="0" cellspacing="5"><tbody><tr>
    <td height="67" valign="top"><div align="center">
      <p>
      <? 
	  include_once "../configuraADM.php";
	  $conn = odbc_connect($connection_string,$user,$pass) or die ("Erro Ao Conectar");
	  $tabela = "SELECT Userid,Passwd,senhapainel FROM dbo.AllPersonalMember";
	  $executa = odbc_exec($conn,$tabela);
	  ?>
      </p>
 
      <table width="380" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="355" background="-imgs/16.gif"><table width="108%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="14%" height="25" align="left"><div align="center"><span class="style15"><font size="2" face="Tahoma">Posi&ccedil;&atilde;o</font></span></div></td>
                <td width="33%" height="25" align="left"><div align="center"><span class="style15"><font size="2" face="Tahoma">Usu&aacute;rio</font></span></div></td>
                <td width="28%" height="25" align="left"><div align="center"><span class="style15"><font size="2" face="Tahoma">Senha JOGO</font></span></div></td>
                <td width="24%" height="29" align="left"><div align="center"><span class="style15"><font size="2" face="Tahoma">Senha PAINEL</font></span> </div></td>
                <td width="1%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="center" bgcolor="#333333"><img src="style/fundoranking_.png"  width="1" height="1" /></td>
              </tr>
              <tr> </tr>
          </table></td>
        </tr>
      </table>
      <table width="44" border="0" cellspacing="0" cellpadding="0">
        <?
		$i = 1;
while($exe = odbc_fetch_array($executa)){
$usuario = $exe['Userid'];
$senha = $exe['Passwd'];


  ?>
        <tr>
          <td background="-imgs/fundo_contas.gif"><table width="442" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="68" height="19" align="left"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <center><? echo $i; ?></center></font></strong></td>
                
                <td width="117" height="19" align="left"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <center><? echo $usuario; ?></center></font></strong></td>
                <td width="92" height="19" align="left"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <center><? echo $senha; ?></center></font></strong></td>
                <td width="92" height="19" align="left"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <center><? echo $senhapainel; ?></center></font></strong></td>


          </table></td>
        </tr>
        <?
$i++;
}
?>
      </table>
    </div></td>
  </tr></tbody></table>
<!-- /Body -->
</div>
<!-- Footer -->
<!-- /Footer -->
<!-- 0.00961 (s8) -->
</map></body></html>
<?  ?>