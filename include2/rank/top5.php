<link href="assets/css/custom.css?<?php echo date("ymdHis"); ?>" rel="stylesheet">
<!-- Ranking -->
<body>
<table class="table table-hover table-standings">
<thead><tr><th>Player</th><th>Level</th><th>Record PvP</th></tr></thead><tbody>
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


$query = "SELECT TOP 10* FROM [ServerDB].[dbo].[PVP] WHERE ID <> 'strikept' AND Id <> 'rodogos' AND Id <> 'icaroeger' ORDER BY Kills DESC, Deads Asc";

                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);
					
					
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $nome = $rank['Name'];
                    $bps = $rank['Kills'];
                    $dps = $rank['Deads'];
					$lvl = $rank['Lvl'];
					$classe = $rank['Class'];
					$i++;

					
//Checar Clan
$query_class = "SELECT * FROM [ServerDB].[dbo].[PVP] WHERE ChName = '$nome'";
$q1 = odbc_exec($string, $query_class);
$qt1 = odbc_do($string, $query_class);
$possuiclan = 0;
while(odbc_fetch_row($qt1)) $possuiclan++;
$clan_name=odbc_result($qt1,7);
$clan_cod=odbc_result($qt1,13);
if($possuiclan == 0) {
$charclan = "";
}
else {
$charclan = " $clan_name";}
					
					echo  "<tr>";
                    echo  "<td><div class='team-meta'><figure class='team-meta__logo'>";
                    echo  "<img src='assets/imgs/classes/$classe.png'></figure><div class='team-meta__info'><h6 class='team-meta__name'>$nome</h6>";
                    echo  "<span class='team-meta__place'>$charclan</span></div></div></td>";
					echo  "<td>$lvl</td><td>$bps K - $dps D</td></tr>";
					}
?>


</tbody>
</table>
<body>
<!-- Ranking / End -->