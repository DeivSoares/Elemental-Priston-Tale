<!-- Ranking -->
<div class="widget-standings">
<table class="table table-hover table-standings">
<thead><tr><th>Clan</th><th>Lider</th><th>Membros</th></tr></thead><tbody>
<?
// Configuração SQL.
$host = 'PTL\SQLEXPRESS'; // Instância SQL.
$user = 'sa'; // Usuário SQL.
$pass = '#$pdl32xq'; // Senha SQL.
$ipserver="192.168.1.90";
$connection_string = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=accountdb';

$connection = odbc_connect( $connection_string, $user, $pass );

$query = "SELECT TOP 100* FROM [ClanDB].[dbo].[CL] WHERE ClanName <> 'ShadowPK' ORDER BY MemCnt DESC";;
                    $q = odbc_exec($connection, $query);
                    $qt = odbc_do($connection, $query);
					
					
					$i = 0;

                    while($rank = odbc_fetch_array($qt)){
                    $imagem = $rank['MIconCnt'];
					$membros = $rank['MemCnt'];
					$clanname = $rank['ClanName'];
					$pontos = $rank['Cpoint'];
					$lider = $rank['ClanZang'];
					$frase = $rank['Note'];
					$dir_classe = "http://192.168.1.90/brnxContent/$imagem.bmp";
					$i++;

					
					echo  "<tr>";
                    echo  "<td><div class='team-meta'><figure class='team-meta__logo'>";
                    echo  "<img src=$dir_classe></figure><div class='team-meta__info'><h6 class='team-meta__name'>$clanname</h6>";
                    echo  "<span class='team-meta__place'>$frase</span></div></div></td>";
					echo  "<td><h6 class='team-meta__name'>$lider</h6></td><td><h6 class='team-meta__name'>$membros </h6></td></tr>";
					}
?>


</tbody>
</table>
</div>
<!-- Ranking / End -->