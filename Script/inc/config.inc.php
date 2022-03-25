<!--
	Pacote de scripts para rankings versão 1.0
	Escrito por Ravel
	Disponibilizado para o fórum Priston4Fun (www.priston4fun.com)
	Por favor, respeite os créditos, bom uso =)
-->
<?php
	//Conexão ao banco de dados
	$sqlserver = "PTL\SQLEXPRESS"; //Instância do SQL
	$account = "sa"; //Usuário do SQL
	$password = "#$pdl32xq"; //Senha do SQL
	$dbSOD = "SoD2DB"; //Define a database que seu SQL.dll conecta para salvar os pontos de SoD. => SodDB ou SoD2DB <= (SQL.dll do gregooverse.net por padrão salva na SodDB)
	
	//Caminhos
	$IPhost = "51.222.17.94"; //IP do host onde está hospedado seu servidor
	$PortaServer = "33003"; //Porta de conexão do seu servidor
	$DiretorioFiles = "C:\Server"; //Diretório da sua Server Files (sempre deixar com "/" no final do caminho. EX: C:/Sever/)
	$UrlClanContent = "http://51.222.17.94/brnxcontent/"; //Url da sua pasta ClanContent (sempre deixar com "/" no final do caminho. EX: http://127.0.0.1/ClanContent/)
	$Website = "http://51.222.17.94"; //URL do site do seu servidor (irá redirecionar caso alguém tente acessar a pasta dos scrips)
	
	//Remove personagens do ranking
	$player1 = "Ravel"; //Nick do jogador
	$player2 = "[ADM]Legendary";
	$player3 = "lula";
	$player4 = "Assassin";
	$player5 = "Legendary";
	$player6 = "testess";
	$player7 = "DinhoRS";
	$player8 = "MuladeVL";
	$player9 = "XamaSOD";
	$player10 = "";
	$player11 = "";
	$player12 = "";
	$player13 = "";
	$player14 = "";
	$player15 = "";
	$player16 = "";
	$player17 = "";
	$player18 = "";
	$player19 = "";
	$player20 = "";
	
	//Remove Clan da Equipe do Ranking
	$ClanEquipe = "Priston4Fun";
	
	//Definições de layout
	$larguratop10lvl = "99%"; //Define a largura da tabela do ranking top 10 level. Exemplo: 200px ou 95%
	$largurarankplayer = "99%"; //Define a largura da tabela do ranking player. Exemplo: 200px ou 95%
	$largurasodclan = "99%"; //Define a largura da tabela do ranking SoD Clan. Exemplo: 200px ou 95%
	$larguraclanlist = "99%"; //Define a largura da tabela do ranking SoD Clan. Exemplo: 200px ou 95%
	$largurasodplayer = "99%"; //Define a largura da tabela do ranking SoD Clan. Exemplo: 200px ou 95%
	$Atualiza = 5; //Define em segundos a troca entre membros e pontos no script Lider BC
?>