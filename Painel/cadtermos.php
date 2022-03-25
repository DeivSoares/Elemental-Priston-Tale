<?
/*----------------------------------------------------------------------
Painel Player Versão 0.4
Desenvolvidor Por: Mak (sirmakloud@gmail.com)
Editado Por: Jiraya (richard.cva21@hotmail.com(
----------------------------------------------------------------------*/
include_once "incluir/configura.php";
include_once "injection.php";
?>
<html>
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

1.1. O Usuário concorda que qualquer outro usuário e a ElementalPT podem fotografar (snapshot), capturar a imagem, filmar e gravar vídeos do seu personagem no jogo dentro do ambiente virtual in-game e concede o direito de uso do material, livre de royalties, para ser utilizado, reproduzido, distribuído, transmitido ou modificado em todos os tipos de mídia.

1.2. O Usuário concorda que o ElementalPT possui total direito podendo adicionar,entrar,editar,modificar,suspender e excluir total ou mediano acesso ou conta,personagem,créditos do jogador.

2. Interrupção de Serviço

2.1. O ElementalPT se reserva o direito de interromper os Serviços ocasionalmente, de forma regular, ou não, com a devida notificação prévia, a fim de realizar manutenção.

2.2. O Usuário está ciente de que os Serviços poderão ser interrompidos por razões fora do controle do ElementalPT, e que em tais circunstâncias o ElementalPT não poderá garantir que o Usuário seja capaz de acessar os Serviços sempre que desejar.

2.3. O ElementalPT não poderá ser responsabilizada por qualquer interrupção, atraso no serviço ou incapacidade de desempenhá-lo devido a quaisquer causas que estejam fora de seu controle, caso fortuito ou força maior.

3. Responsabilidade

3.1. O USUÁRIO ESTÁ CIENTE E CONCORDA QUE O ElementalPT NÃO ASSUMIRÁ E NÃO TERÁ RESPONSABILIDADE POR QUALQUER AÇÃO POR PARTE DO ElementalPT DE CONTEÚDO COM RELAÇÃO À CONDUTA, COMUNICAÇÃO OU CONTEÚDO DOS SERVIÇOS.

3.2. O ElementalPT NÃO SERÁ RESPONSÁVEL POR QUAISQUER DANOS INDIRETOS, INCIDENTAIS, ESPECIAIS, PUNITIVOS, EXEMPLARES OU CONSEQUENTES, INCLUSIVE, SEM LIMITAÇÕES, LUCROS CESSANTES, INTERRUPÇÃO DE NEGÓCIOS, PERDA DE INFORMAÇÕES DE NEGÓCIOS, OU QUALQUER OUTRA PERDA PECUNIÁRIA EM CONEXÃO COM OS SERVIÇOS OU QUALQUER PRODUTO FORNECIDO PELO ElementalPT.

3.3. O USUÁRIO CONCORDA EM QUE O ElementalPT NÃO PODERÁ SER CONSIDERADO RESPONSÁVEL OU PASSÍVEL DE RESPONSABILIZAÇÃO DEVIDO A QUALQUER EVENTO QUE OCORRER OU RESULTAR DO ACESSO AOS SERVIÇOS POR MOTIVO DE FORÇA MAIOR OU CASO FORTUITO, ALHEIO À AÇÃO, OMISSÃO OU VONTADE DO ElementalPT.

4. Compartilhamento de conta, venda e troca

4.1. E proibido o compartilhamento de contas e senha (Share), tendo como consequência a quem desobedecer esta regra a perca de atendimento no suporte e consequentemente não terá restauração em caso de roubo de itens.

5. Regras In-Game

5.1. E proibido criar personagens com Nome, Inicial ou contendo GM, ADM, ADMIN, STAFF, ETC...

5.2. E proibido o uso de ferramentas que burlem as regras do jogo, tais como programas ou falhas no jogo.

5.3. Em caso de uso de hacks o usuário ira receber bloqueio permanente na conta.

5.4. Em caso de uso de bugs ou falhas do jogo para próprio benéfico o usuário sera notificado com um bloqueio de 15 dias na conta, caso haja reincidência recebera bloqueio permanente.

5.5. Em Caso de Lag, o usuário sera notificado com um bloqueio de 1 a 7 dias dependendo da gravidade do seu lag.

5.6. E proibido fazer qualquer tipo de falsa acusação & calunia no fórum ou em qualquer outro meio.

5.6.1 Quando constatado:

1 Vez - Na primeira vez o player será bloqueado por 3 dias;

2 Vez - Na Segunda vez o Player será bloqueado por 7 dias;

3 Vez - Na Terceira ocorrência o player terá a conta bloqueada por 30 dias.

6. Itens

6.1. O servidor não e responsável por qualquer item que tenha sido conseguido no jogo, nos isentamos de qualquer responsabilidade de recuperação do item caso seja perdido tanto por roubo ou problemas do jogo.

6.2. O servidor se responsabiliza pela restauração de itens alpha & zeus desde que sejam perdidos em lag, problemas do jogo ou DCs e o pedido de restauração seja enviado em no máximo 7 dias apos o acontecido.

6.3. O servidor só se responsabiliza por itens roubados que tenham sido comprados no site por quem os perdeu, caso o usuário tenha um item comprado no jogo roubado ele não terá direito a restauração. Itens comprados no jogo se aplicam apenas a regra 6.2

7. Alterações

7.1. O usuário concorda que todas as Contas, personagem, itens, créditos, pertencer ao servidor ElementalPT, poderemos fazer alterações, verificações, e exclusões sem prévio aviso.

7.2 Todas as regras anteriores poderá ser alteradas sem prévio aviso, automaticamente se cadastrando no servidor você concorda com todas nossas regras.

7.3. O Usuário não poderá modificar, publicar, criar trabalhos derivativos, e/ou de qualquer forma explorar qualquer conteúdo existente no ElementalPT inclusive, sem limitação, de conteúdos que o Website e as redes sociais do ElementalPT lhes permita fazer download, sem a permissão expressa da equipe ElementalPT.

7.3.1 Quando constatado:

1 Vez - Na primeira vez o player será bloqueado por 3 dias;

2 Vez - Na Segunda vez o Player será bloqueado por 7 dias;

3 Vez - Na Terceira ocorrência o player terá a conta bloqueada por 90 dias.</textarea><br/><br/>
<div class="login-footer">
                    <div><label>
						  <input name="aceitatermos" id="aceitatermos" value="Sim" type="checkbox">
						  </label> Li os termos e concordo</div>
                </div>
	<br>
						  <input name="acao" id="acao" value="Concordo" type="submit" class="btn btn-primary">
                        
</body>
</html>