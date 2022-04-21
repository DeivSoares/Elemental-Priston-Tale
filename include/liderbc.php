<div align="center"></div>
<?
 /*----------------------------------------------------------------------
   Script Lider BC Semi Automatico V. 4.0
   Desenvolvidor Por: Jeck(jeckmib@hotmail.com)
   Id�ias: Vahvel(vahve-capeta@hotmail.com)
   Por Postar: Lookin(lokin.bdc@hotmail.com)
   ----------------------------------------------------------------------*/

$BLESS = "C:\Server/BlessCastle.dat"; //Altere para a pasta do seu Servidor+BlessCastle.dat
$fOpen = fopen($BLESS, "r");
        $fRead =fread($fOpen,filesize($BLESS));
        @fclose($fOpen);
     
      // details
       // $LiderBles = ord($fRead,0xF0,3);
      $LiderBles = bin2hex(substr($fRead,0xF0,1));
            $LiderBles2 = bin2hex(substr($fRead,0xF1,1));
         $LiderBles3 = bin2hex(substr($fRead,0xF2,1));
       $LiderBles1 = bin2hex(substr($fRead,0xF3,1));
            $Lider = hexdec("$LiderBles1"."$LiderBles3"."$LiderBles2"."$LiderBles");
// Conex�o com o SQL(Host)
$host = "DRIVER={SQL Server};"."SERVER=PTL\SQLEXPRESS;"."DATABASE=ClanDB"; //Nome Instancia SQL + DB(Database)
$user = "sa";  //Usuario SQL (Gealmente sa)
$pw ="#$pdl32xq";     // Senha Usuario Sql

$conexao = odbc_connect($host, $user, $pw); // Tentando Conectar
$qr = odbc_exec($conexao, "SELECT * FROM CL WHERE MIconCnt =$Lider"); // Script Que Busca Informa�oes do Clan
$linhas = odbc_num_rows($qr);
if($linhas == 0){
echo 'Nenhum Clan';
}
while($dados = odbc_fetch_array($qr)){
$img = $dados['MIconCnt'];
					$membros = $rank['MemCnt'];
					$clanname = $rank['ClanName'];
					$pontos = $rank['Cpoint'];
					$lider = $rank['ClanZang'];
					$frase = $rank['Note'];
					$dir_classe = "http://192.168.1.90/brnxContent/$imagem.bmp";
					$i++;
$nomelider = $dados['ClanZang'];
echo '<center><img src="'.$dir_img.'" width="32" height="32" />';
echo '<center><font color="#ffffff">'.$clan.'</font></center>';
echo '<strong><font color="#FFFFF">Lider: <b><font color="#ffffff">'.$nomelider.'</font></strong>';
}
?>