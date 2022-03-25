<!-- Ranking -->
<div class="widget-standings">
<table class="table table-hover table-standings">
<thead><tr><th>Player</th><th>Pontos</th><th>Monstros</th></tr></thead><tbody>
<?
// Configuração SQL.
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.
$ipserver="192.168.1.90";
$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';

$connection = odbc_connect( $connection_string, $user, $pass );

$query = "SELECT TOP 100* FROM [SoD2DB].[dbo].[SoD2RecBySandurr] WHERE UserID <> 'strikept' AND UserID <> 'rodogos' AND UserID <> 'icaroeger' ORDER BY Point DESC ";
                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);
					
					
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $nome = $rank['CharName'];
                    $monstros = $rank['KillCount'];
                    $pontos = $rank['Point'];
					$classe = $rank['CharType'];
					$i++;

					
//Checar Clan
$query_class = "SELECT * FROM [ClanDB].[dbo].[UL] WHERE ChName = '$nome'";
$q1 = odbc_exec($connection, $query_class);
$qt1 = odbc_do($connection, $query_class);
$possuiclan = 0;
while(odbc_fetch_row($qt1)) $possuiclan++;
$clan_name=odbc_result($qt1,7);
if($possuiclan == 0) 
$charclan = "";
else 
$charclan = "$clan_name";
					
					echo  "<tr>";
                    echo  "<td><div class='team-meta'><figure class='team-meta__logo'>";
                    echo  "<img src='assets/imgs/classes/$classe.png'></figure><div class='team-meta__info'><h6 class='team-meta__name'>$nome</h6>";
                    echo  "<span class='team-meta__place'>$charclan</span></div></div></td>";
					echo  "<td><h6 class='team-meta__name'>$pontos</h6></td><td><h6 class='team-meta__name'>$monstros </h6></td></tr>";
					}
?>


</tbody>
</table>
</div>
<!-- Ranking / End -->