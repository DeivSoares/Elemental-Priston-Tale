<script>
  function click() {
    if (event.button == 2 || event.button == 3) {
      oncontextmenu = 'return false';
    }
  }
  document.onmousedown = click
  document.oncontextmenu = new Function("return false;")
</script>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title></title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    <!--
    .style1 {
      font-size: 10px;
      color: #000000;
    }

    .style2 {
      font-size: 9px
    }
    -->
  </style>
</head>

<body background="images/meio_meio.jpg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="340" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Cavaleiro">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/06.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Pikeman">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/04.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Mecanico">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/02.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Lutador">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/01.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Mago">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/07.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Atalanta">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/05.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Arqueira">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/03.gif" width="29" height="26">
          </font>
        </td>
      </form>
      <form name="form1" method="post" action="toplevel.php">
        <td align="center">
          <font size="1" face="Verdana">
            <input name="classe" type="hidden" value="Sacerdotiza">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField" src="images/classe/08.gif" width="29" height="26">
          </font>
        </td>
      </form>
    </tr>
  </table>
  <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <form name="form1" method="post" action="toplevel.php">
        <td align="right">
          <font size="1" face="Verdana">
            <input name="classe2" type="hidden" value="">
          </font>
          <font face="Verdana" size="1">
            <input type="image" name="imageField2" src="images/geral.gif" width="37" height="17">
          </font>
        </td>
      </form>
    </tr>
  </table>
  <font face="Verdana" size="1">
    <?
    include_once "incluir/configura.php";

    $classechar = $_POST['classe'];


    $connection = odbc_connect($connection_string, $user, $pass);

    if ($classechar <> "") {
      $query = "SELECT TOP 50 * FROM [rPTDB].[dbo].[LevelList] Where [CharClass]='$classechar' AND (CharName NOT LIKE 'ADM-Lowang') AND (CharName NOT LIKE 'Teste2') AND (CharName NOT LIKE 'PoderosoGM') AND (CharName NOT LIKE 'ADM-Orin') AND (CharName NOT LIKE 'GM-Hermes') AND (CharName NOT LIKE '[GM]Kakashi') AND (CharName NOT LIKE 'ares') AND (CharName NOT LIKE 'Gaia') AND (CharName NOT LIKE 'GM-Papazone') AND (CharName NOT LIKE 'KronuZ') AND (CharName NOT LIKE 'GM-Midgard') AND (CharName NOT LIKE 'Pix0ka') AND (CharName NOT LIKE 'HadesGM') AND (CharName NOT LIKE 'HermesGM') AND (CharName NOT LIKE 'Orin') AND (CharName NOT LIKE 'GM-Design') AND (CharName NOT LIKE 'LexusGM') AND (CharName NOT LIKE 'gm-pandora') AND (CharName NOT LIKE 'gm-ryu') AND (CharName NOT LIKE 'gm-reaper') AND (CharName NOT LIKE 'vahvel') AND (CharName NOT LIKE 'GM-slim') AND (CharName NOT LIKE 'Administrador') AND (CharName NOT LIKE 'GmDeath') AND (CharName NOT LIKE '[ADM]Vahvel') AND (CharName NOT LIKE '[GM]Soluction') AND (CharName NOT LIKE 'lowang') AND (CharName NOT LIKE '[ADM]SyncMaster') AND (CharName NOT LIKE 'Teste') AND (CharName NOT LIKE 'DKinJR') AND (CharName NOT LIKE 'GMFasT') AND (CharName NOT LIKE 'Kelvezu') AND (CharName NOT LIKE '[GM]Meryt') AND (CharName NOT LIKE 'GM-FreeCell') AND (CharName NOT LIKE 'GM-Sune') AND (CharName NOT LIKE 'Error1111') AND (CharName NOT LIKE 'GM-Alucard') AND (CharName NOT LIKE 'Hermes') AND (CharName NOT LIKE 'GM-Dark') ORDER BY CharLevel DESC";
    } else {
      $query = "SELECT TOP 50 * FROM [rPTDB].[dbo].[LevelList] WHERE (CharName NOT LIKE 'ADM-Lowang') AND (CharName NOT LIKE 'Teste2') AND (CharName NOT LIKE 'PoderosoGM') AND (CharName NOT LIKE 'ADM-Orin') AND (CharName NOT LIKE 'GM-Hermes') AND (CharName NOT LIKE '[GM]Kakashi') AND (CharName NOT LIKE 'ares') AND (CharName NOT LIKE 'Gaia') AND (CharName NOT LIKE 'GM-Papazone') AND (CharName NOT LIKE 'KronuZ') AND (CharName NOT LIKE 'GM-Midgard') AND (CharName NOT LIKE 'Pix0ka') AND (CharName NOT LIKE 'HadesGM') AND (CharName NOT LIKE 'HermesGM') AND (CharName NOT LIKE 'Orin') AND (CharName NOT LIKE 'GM-Design') AND (CharName NOT LIKE 'LexusGM') AND (CharName NOT LIKE 'gm-pandora') AND (CharName NOT LIKE 'gm-ryu') AND (CharName NOT LIKE 'gm-reaper') AND (CharName NOT LIKE 'vahvel') AND (CharName NOT LIKE 'GM-slim') AND (CharName NOT LIKE 'Administrador') AND (CharName NOT LIKE 'GmDeath') AND (CharName NOT LIKE '[ADM]Vahvel') AND (CharName NOT LIKE '[GM]Soluction') AND (CharName NOT LIKE '[GM]Osbourne') AND (CharName NOT LIKE 'Teste') AND (CharName NOT LIKE 'lowang') AND (CharName NOT LIKE 'DKinJR') AND (CharName NOT LIKE 'ADM-Kisame') AND (CharName NOT LIKE 'Kisame') AND (CharName NOT LIKE '[GM]Meryt') AND (CharName NOT LIKE 'GM-FreeCell') AND (CharName NOT LIKE 'GM-Sune') AND (CharName NOT LIKE 'Error1111') AND (CharName NOT LIKE 'GM-Alucard') AND (CharName NOT LIKE 'Hermes') AND (CharName NOT LIKE 'GM-Dark') ORDER BY CharLevel DESC";
    }
    $q = odbc_exec($connection, $query);
    $qt = odbc_do($connection, $query);

    ?>

  </font>

  <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100%" colspan="4">
        <img border="0" src="images/toprankind.png" width="350" height="77">
      </td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#CCCCCC">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?
          $i = 0;

          while ($rank = odbc_fetch_array($qt)) {
            $nome = $rank['CharName'];
            $level = $rank['CharLevel'];
            $classe = $rank['CharClass'];
            $i++;




          ?>
            <tr>
              <td height="25" align="center" bgcolor="#333333" width="11%"><strong>
                  <font color="#FFFFFF" size="1" face="Verdana"><? echo $i; ?></font>
                </strong></td>
              <td height="25" align="center" bgcolor="#333333" width="26%"><strong>
                  <font color="#FFFFFF" size="1" face="Verdana"><? echo $classe; ?></font>
                </strong></td>
              <td height="25" align="center" bgcolor="#333333" width="52%"><strong>
                  <font color="#FFFFFF" size="1" face="Verdana"><? echo $nome; ?></font>
                </strong></td>
              <td height="25" align="center" bgcolor="#333333" width="11%"><strong>
                  <font color="#FFFF00" size="1" face="Verdana"><? echo $level; ?></font>
                </strong></td>
            </tr>
            <tr>
              <td colspan="4" align="center" bgcolor="#666666">
                <font face="Verdana" size="1" color="#FFFFFF"><img src="1" width="1" height="1"></font>
              </td>
            </tr>

          <?
          }
          ?>
        </table>
      </td>
    </tr>

    <tr>
      <td colspan="4">
        <font face="Verdana" size="1">
          <img src="images/rodape.JPG" width="350" height="10">
        </font>
      </td>
    </tr>
  </table>
  <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <div align="justify"><strong>
            <div align="center">
              <font face="Verdana" size="1" color="#FFFFFF">OBS:</font><span class="style1">
          </strong><span class="style2">
            <font face="Verdana"> Coloque seu char no rank pelo painel de Controle. </font>
          </span></span></div>
      </td>
    </tr>
  </table>
</body>

</html>