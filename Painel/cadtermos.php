<?
/*----------------------------------------------------------------------
Painel Player Vers�o 0.4
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Editado Por: Jiraya (richard.cva21@hotmail.com(
----------------------------------------------------------------------*/
include_once "incluir/configura.php";
include_once "injection.php";
?>
<html lang="pt-br">
 <head>        
        <!-- META SECTION -->
        <title>Painel de Controle ElementalPT</title>
        <meta http-equiv="Content-Type"content="text/html; charset=iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
	
<body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
					<form name="form_cad" action="cadastrar.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<center>
							<textarea name="textarea" id="textarea" cols="50" rows="15" readonly="readonly">
1. Termos de Usos

1.1. O Usu�rio concorda que qualquer outro usu�rio e a ElementalPT podem fotografar (snapshot), capturar a imagem, filmar e gravar v�deos do seu personagem no jogo dentro do ambiente virtual in-game e concede o direito de uso do material, livre de royalties, para ser utilizado, reproduzido, distribu�do, transmitido ou modificado em todos os tipos de m�dia.

1.2. O Usu�rio concorda que o ElementalPT possui total direito podendo adicionar,entrar,editar,modificar,suspender e excluir total ou mediano acesso ou conta,personagem,cr�ditos do jogador.

2. Interrup��o de Servi�o

2.1. O ElementalPT se reserva o direito de interromper os Servi�os ocasionalmente, de forma regular, ou n�o, com a devida notifica��o pr�via, a fim de realizar manuten��o.

2.2. O Usu�rio est� ciente de que os Servi�os poder�o ser interrompidos por raz�es fora do controle do ElementalPT, e que em tais circunst�ncias o ElementalPT n�o poder� garantir que o Usu�rio seja capaz de acessar os Servi�os sempre que desejar.

2.3. O ElementalPT n�o poder� ser responsabilizada por qualquer interrup��o, atraso no servi�o ou incapacidade de desempenh�-lo devido a quaisquer causas que estejam fora de seu controle, caso fortuito ou for�a maior.

3. Responsabilidade

3.1. O USU�RIO EST� CIENTE E CONCORDA QUE O ElementalPT N�O ASSUMIR� E N�O TER� RESPONSABILIDADE POR QUALQUER A��O POR PARTE DO ElementalPT DE CONTE�DO COM RELA��O � CONDUTA, COMUNICA��O OU CONTE�DO DOS SERVI�OS.

3.2. O ElementalPT N�O SER� RESPONS�VEL POR QUAISQUER DANOS INDIRETOS, INCIDENTAIS, ESPECIAIS, PUNITIVOS, EXEMPLARES OU CONSEQUENTES, INCLUSIVE, SEM LIMITA��ES, LUCROS CESSANTES, INTERRUP��O DE NEG�CIOS, PERDA DE INFORMA��ES DE NEG�CIOS, OU QUALQUER OUTRA PERDA PECUNI�RIA EM CONEX�O COM OS SERVI�OS OU QUALQUER PRODUTO FORNECIDO PELO ElementalPT.

3.3. O USU�RIO CONCORDA EM QUE O ElementalPT N�O PODER� SER CONSIDERADO RESPONS�VEL OU PASS�VEL DE RESPONSABILIZA��O DEVIDO A QUALQUER EVENTO QUE OCORRER OU RESULTAR DO ACESSO AOS SERVI�OS POR MOTIVO DE FOR�A MAIOR OU CASO FORTUITO, ALHEIO � A��O, OMISS�O OU VONTADE DO ElementalPT.

4. Compartilhamento de conta, venda e troca

4.1. E proibido o compartilhamento de contas e senha (Share), tendo como consequ�ncia a quem desobedecer esta regra a perca de atendimento no suporte e consequentemente n�o ter� restaura��o em caso de roubo de itens.

5. Regras In-Game

5.1. E proibido criar personagens com Nome, Inicial ou contendo GM, ADM, ADMIN, STAFF, ETC...

5.2. E proibido o uso de ferramentas que burlem as regras do jogo, tais como programas ou falhas no jogo.

5.3. Em caso de uso de hacks o usu�rio ira receber bloqueio permanente na conta.

5.4. Em caso de uso de bugs ou falhas do jogo para pr�prio ben�fico o usu�rio sera notificado com um bloqueio de 15 dias na conta, caso haja reincid�ncia recebera bloqueio permanente.

5.5. Em Caso de Lag, o usu�rio sera notificado com um bloqueio de 1 a 7 dias dependendo da gravidade do seu lag.

5.6. E proibido fazer qualquer tipo de falsa acusa��o & calunia no f�rum ou em qualquer outro meio.

5.6.1 Quando constatado:

1 Vez - Na primeira vez o player ser� bloqueado por 3 dias;

2 Vez - Na Segunda vez o Player ser� bloqueado por 7 dias;

3 Vez - Na Terceira ocorr�ncia o player ter� a conta bloqueada por 30 dias.

6. Itens

6.1. O servidor n�o e respons�vel por qualquer item que tenha sido conseguido no jogo, nos isentamos de qualquer responsabilidade de recupera��o do item caso seja perdido tanto por roubo ou problemas do jogo.

6.2. O servidor se responsabiliza pela restaura��o de itens alpha & zeus desde que sejam perdidos em lag, problemas do jogo ou DCs e o pedido de restaura��o seja enviado em no m�ximo 7 dias apos o acontecido.

6.3. O servidor s� se responsabiliza por itens roubados que tenham sido comprados no site por quem os perdeu, caso o usu�rio tenha um item comprado no jogo roubado ele n�o ter� direito a restaura��o. Itens comprados no jogo se aplicam apenas a regra 6.2

7. Altera��es

7.1. O usu�rio concorda que todas as Contas, personagem, itens, cr�ditos, pertencer ao servidor ElementalPT, poderemos fazer altera��es, verifica��es, e exclus�es sem pr�vio aviso.

7.2 Todas as regras anteriores poder� ser alteradas sem pr�vio aviso, automaticamente se cadastrando no servidor voc� concorda com todas nossas regras.

7.3. O Usu�rio n�o poder� modificar, publicar, criar trabalhos derivativos, e/ou de qualquer forma explorar qualquer conte�do existente no ElementalPT inclusive, sem limita��o, de conte�dos que o Website e as redes sociais do ElementalPT lhes permita fazer download, sem a permiss�o expressa da equipe ElementalPT.

7.3.1 Quando constatado:

1 Vez - Na primeira vez o player ser� bloqueado por 3 dias;

2 Vez - Na Segunda vez o Player ser� bloqueado por 7 dias;

3 Vez - Na Terceira ocorr�ncia o player ter� a conta bloqueada por 90 dias.</textarea><br/><br/>
<div class="login-footer">
                    <div><label>
						  <input name="aceitatermos" id="aceitatermos" value="Sim" type="checkbox">
						  </label> Li os termos e concordo</div>
                </div>
	<br>
						  <input name="acao" id="acao" value="Concordo" type="submit" class="btn btn-primary">
                        
</body>
</html>