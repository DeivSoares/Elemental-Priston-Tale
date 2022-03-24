<?



$Host = "DRIVER={SQL Server};"."SERVER=PTL\SQLEXPRESS;"."DATABASE=ClanDB"; //Nome Instancia SQL + DB(Database)
$User = "sa"; //Usuario SQL (Geralmente sa)
$Pass = "#$pdl32xq"; // Senha Usuario Sql

$Connect = odbc_connect($Host,$User,$Pass) or die ("Erro ao Conectar com o SQL Server 2005");

$Query = "SELECT * FROM dbo.CT ORDER by ChName";
$Table = "dbo.CT";

$Exec = odbc_exec($Connect,$Query) or die ("Erro ao Executar a Tabela $Table");

while($exe = odbc_fetch_array($Exec)){
$Name = $exe["ChName"];


echo "$Name";
echo "
";
}
?>