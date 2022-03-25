<?if (PT!=1) exit;?>
<div class="notice notice-info">
Players Online
</div>

<table class ="ui table table-striped table-bordered" style="margin: 0px auto;">
<thead>
<tr><th class="posição">Pos.</th><th class="posição">Id</th><th class="classe">Nick</th><th class="nickname">Level</th><th class="nickname">Classe</th><th>Clan</th><th>IP</th></tr>
</thead>
<tbody>
<tr>
<?
include_once "../configuraADM.php";
$string = odbc_connect($connection_string, $user, $pass);
$query = "SELECT * FROM [ClanDb].[dbo].[CT]";

$q = odbc_exec($string, $query);
$qt = odbc_do($string, $query);
$i = 0;
while($rank = odbc_fetch_array($qt)){
$id = $rank['UserID'];
$nome = $rank['ChName'];
$clan = $rank['ClanName'];
$ip = $rank['IP'];
$i++;
//Checar Level
$query_level = "SELECT * FROM [rPTDB].[dbo].[LevelList] WHERE CharName = '$nome'";
$q1 = odbc_exec($string, $query_level);
$qt1 = odbc_do($string, $query_level);
while(odbc_fetch_array($qt1));
$level=odbc_result($qt1,2);
$classe=odbc_result($qt1,3);

					echo "<td>$i</td><td>$id</td><td>$nome</td><td>$level</td><td>$classe</td><td>$clan</td><td>$ip</td>";
					echo "</tr>";
					
					}
?>
</tbody>
<tfoot>
</tfoot>
</table>