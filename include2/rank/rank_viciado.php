<link href="assets/css/custom.css" rel="stylesheet">
<!-- Ranking -->
<div class="widget-standings">
<table class="table table-hover table-standings">
<thead><tr><th>Player</th><th>Tempo</th></tr></thead><tbody>
<?
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.

$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';
$sod = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Sod2db';
$bp = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=UserDB';
$clan = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=ClanDB';

$connection = odbc_connect( $connection_string, $user, $pass );


$query = "SELECT TOP 100* FROM [TopViciado].[dbo].[Usuario] WHERE Login <> 'strikept' AND Login <> 'rodogos' AND Login <> 'icaroeger' ORDER BY Timer DESC";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);
					$q1 = odbc_exec($connection, $query_class);
                    $qt1 = odbc_do($connection, $query_class);
					
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $id = $rank['Login'];
                    $tempo = $rank['Timer'];
					$i++;

					
//Checar Clan
$query_class = "SELECT TOP 1* FROM [PristonDB].[dbo].[PvP] WHERE ID = '$id' ORDER BY Kills DESC";
$q1 = odbc_exec($connection, $query_class);
$qt1 = odbc_do($connection, $query_class);
$possuiclan = 0;
while(odbc_fetch_row($qt1)) $possuiclan++;
$nick=odbc_result($qt1,2);
$classe=odbc_result($qt1,3);
					
					echo  "<tr>";
                    echo  "<td><div class='team-meta'><figure class='team-meta__logo'>";
                    echo  "<img src='assets/imgs/classes/$classe.png'></figure><div class='team-meta__info'><h6 class='team-meta__name'>$nick</h6>";
                    echo  "<span class='team-meta__place'></span></div></div></td>";
					echo  "<td><h6 class='team-meta__name'>$tempo</h6></td></tr>";
					}
?>


</tbody>
</table>
</div>
<!-- Ranking / End -->