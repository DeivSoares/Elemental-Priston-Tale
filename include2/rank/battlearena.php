<link href="assets/css/custom.css?<?php echo date("ymdHis"); ?>" rel="stylesheet">
<!-- Gladiador -->
<?
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$bp = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=UserDB';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';

$classechar = $_POST['classe'];


                    $connection = odbc_connect( $connection_string, $user, $pass );


$query = "SELECT TOP 1* FROM [PT].[dbo].[BattleArena] ORDER BY BattlePoint DESC";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);
					
					
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $Character = $rank['Character'];
                    $BattlePoint = $rank['BattlePoint'];
                    $DeathPoint = $rank['DeathPoint'];
					$i++;

					
//Checar Classe
$query_class = "SELECT * FROM [PristonDB].[dbo].[PVP] WHERE Name = '$Character'";
$q1 = odbc_exec($connection, $query_class);
$qt1 = odbc_do($connection, $query_class);
while(odbc_fetch_row($qt1));
$char_class=odbc_result($qt1,3);

//Checar Clan
$query_clan = "SELECT * FROM [ClanDB].[dbo].[UL] WHERE ChName = '$nome'";
$q1 = odbc_exec($connection, $query_clan);
$qt1 = odbc_do($connection, $query_clan);
$possuiclan = 0;
while(odbc_fetch_row($qt1)) $possuiclan++;
$clan_name=odbc_result($qt1,7);
$clan_cod=odbc_result($qt1,13);
if($possuiclan == 0) {
$charclan = "";
}
else {
$charclan = " $clan_name";}

					
echo  "<div class='alc-event-list-item__body'>
<div class='alc-event-list-item__time'><img src='assets/imgs/classes/$char_class.png' style='max-width:35px;'></div>
<div class='alc-event-list-item__info'>
</h6>
<h6 class='game-result__mvp-player-name'>$Character</h6>
<span class='game-result__mvp-player-team'>$charclan</span>
</div>
<div class='game-result__mvp-stats'>
<ul class='game-result__mvp-stats-list list-unstyled'>
<li class='game-result__mvp-stats-item'><span class='game-result__mvp-stats-value'>$BattlePoint</span> <span class='game-result__mvp-stats-label'>Kills</span></li>
<li class='game-result__mvp-stats-item'><span class='game-result__mvp-stats-value'>$DeathPoint</span> <span class='game-result__mvp-stats-label'>Deaths</span></li>
</ul></div>
</div>";
					}
?>
