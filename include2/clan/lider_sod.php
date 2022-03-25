<?php
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$bp = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=UserDB';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';

$connection = odbc_connect( $connection_string, $user, $pass );
$qr = odbc_exec($connection, "SELECT TOP 1 * FROM [ClanDB].[dbo].[Cl] ORDER BY Cpoint DESC"); // Script Que Busca Informaçoes do Clan 
$linhas = odbc_num_rows($qr);

while($dados = odbc_fetch_array($qr)){
$img_sod = $dados['MIconCnt'];
$clan_sod = $dados['ClanName'];
$dir_img_sod = "http://192.168.1.90/brnxContent/$img_sod.bmp";  //Altere o shadowpk.com para o seu IP
$nomelider_sod = $dados['ClanZang'];
$membros_sod = $dados['MemCnt'];
$pontos_sod = $dados['Cpoint'];

}
					
echo  "<div class='alc-event-list-item__body'>
<div class='alc-event-list-item__time'><img src='$dir_img_sod' style='max-width:35px;'></div>
<div class='alc-event-list-item__info'>
</h6>
<h6 class='game-result__mvp-player-name'>$clan_sod</h6>
<span class='game-result__mvp-player-team'>$nomelider_sod</span>
</div>
<div class='game-result__mvp-stats'>
<ul class='game-result__mvp-stats-list list-unstyled'>
<li class='game-result__mvp-stats-item'><span class='game-result__mvp-stats-value'>$pontos_sod</span> <span class='game-result__mvp-stats-label'>Pontos</span></li>
</ul></div>
</div>";
			
?>
