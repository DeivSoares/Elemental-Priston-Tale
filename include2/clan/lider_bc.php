<?php
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$bp = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=UserDB';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';

$BLESS = "H:/nova soucer/server/BlessCastle.dat";
$fOpen = fOpen($BLESS, "r");
$fRead =fread($fOpen,filesize($BLESS));
@fclose($fOpen);
$LiderBles = bin2hex(substr($fRead,0xF0,1));
$LiderBles2 = bin2hex(substr($fRead,0xF1,1));
$LiderBles3 = bin2hex(substr($fRead,0xF2,1));
$LiderBles1 = bin2hex(substr($fRead,0xF3,1));

$PontosBless1 = bin2hex(substr($fRead,0x118,1));
$PontosBless2 = bin2hex(substr($fRead,0x119,1));
$PontosBless3 = bin2hex(substr($fRead,0x11A,1));
$PontosBless4 = bin2hex(substr($fRead,0x11B,1));

$TaxaBless = bin2hex(substr($fRead,0x18,1));
$Pontos = hexdec("$PontosBless4"."$PontosBless3"."$PontosBless2"."$PontosBless1");

$Lider = hexdec("$LiderBles1"."$LiderBles3"."$LiderBles2"."$LiderBles");
$TaxaCalc = hexdec("$TaxaBless");

$connection = odbc_connect( $connection_string, $user, $pass );
$query_bc = "SELECT * FROM [ClanDB].[dbo].[CL] WHERE MIconCnt = '$Lider'";
$q1 = odbc_exec($connection, $query_bc);
$qt1 = odbc_do($connection, $query_bc);

while($dados = odbc_fetch_array($qt1)){
$img_bc = $dados['MIconCnt'];
$clan_bc = $dados['ClanName'];
$dir_img_bc = "http://192.168.1.90/brnxContent/$img_bc.bmp";
$nomelider_bc = $dados['ClanZang'];
$membros_bc = $dados['MemCnt'];


echo  "<div class='alc-event-list-item__body'>
<div class='alc-event-list-item__time'><img src='$dir_img_bc' style='max-width:35px;'></div>
<div class='alc-event-list-item__info'>
</h6>
<h6 class='game-result__mvp-player-name'>$clan_bc</h6>
<span class='game-result__mvp-player-team'>$nomelider_bc</span>
</div>
<div class='game-result__mvp-stats'>
<ul class='game-result__mvp-stats-list list-unstyled'>
<li class='game-result__mvp-stats-item'><span class='game-result__mvp-stats-value'>$membros_bc</span> <span class='game-result__mvp-stats-label'>Membros</span></li>

</ul></div>
</div>";

}
?>
