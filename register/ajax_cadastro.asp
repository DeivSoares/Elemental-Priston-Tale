<!--#include file="include/configurar.asp"-->
<!--#include file="include/funcoes.asp"-->
<!--#include file="include/md5.asp"-->
<%
call conectaBD
dim combo : combo = request("Combo")
dim sql : sql = ""
dim rs : set rs = server.createobject("adodb.recordset")

dim login : login = ""
dim senha : senha = ""
dim nome : nome = ""
dim sobrenome : sobrenome = ""
dim dia, mes, ano, datanascimento
dim sexo : sexo = ""
dim email : email = ""
dim pais : pais = ""
dim estado : estado = ""
dim cidade : cidade = ""
dim telefone : telefone = ""
dim pergunta : pergunta = ""
dim repres : repres = ""
dim resposta : resposta = ""
dim codigo : codigo = 0


dim retorno : retorno = 0
dim numRandomico : numRandomico = 0

dim txtLoginTrocar : txtLoginTrocar = ""
dim txtSenhaAntigaTrocar : txtSenhaAntigaTrocar = ""
dim txtSenhaNovaTrocar : txtSenhaNovaTrocar = ""

dim txtLoginRecuperar : txtLoginRecuperar = ""
dim txtEmailRecuperar : txtEmailRecuperar = ""
dim txtMensagem : txtMensagem = ""
dim retornoEmailEnviado : retornoEmailEnviado = ""

function retornaIPRede()
	dim UserIPAddress : UserIPAddress = Request.ServerVariables("HTTP_X_FORWARDED_FOR")
	If UserIPAddress = "" Then
		UserIPAddress = Request.ServerVariables("REMOTE_ADDR")
	End If
	retornaIPRede = UserIPAddress
end function

'function enviaEmailPlayer(userId)
'	dim retornoEmailPlayer : retornoEmailPlayer = ""
'	sql = " SELECT TOP 1 BANCO_CADASTRO_ID FROM BANCO_CADASTRO WHERE LOGIN = "&userId&" ORDER BY 1 DESC "
'	set rs = conexao.execute(sql)
'	if not rs.eof then
'		retornoEmailPlayer = enviaEmail(rs(0))
'	end if 
'	rs.close : set rs = nothing
'	enviaEmailPlayer = retornoEmailPlayer
'end function

sub enviaEmailRecSenha(userId)
		sql = " UPDATE BANCO_CADASTRO SET STATUS = 3 WHERE LOGIN = "&userId	
		set rs = conexao.execute(sql)
	rs.close : set rs = nothing
end sub

if combo = "cadastrar" then
	login = FormataDadosStrEInt(removeCaracterInv(request("txtLogin")),"S")
	senha = FormataDadosStrEInt(removeCaracterInv(request("txtSenha")),"S")
	nome = FormataDadosStrEInt(removeCaracterInv(request("txtNome")),"S")
	sobrenome = FormataDadosStrEInt(removeCaracterInv(request("txtSobrenome")),"S")
	email = FormataDadosStrEInt(removeCaracterInv(request("txtEmail")),"S")
	datanascimento = split(request("txtDataNascimento"),"/")
	dia = FormataDadosStrEInt(datanascimento(0),"S")
	mes = FormataDadosStrEInt(datanascimento(1),"S")
	ano = FormataDadosStrEInt(datanascimento(2),"S")
	sexo = FormataDadosStrEInt(request("ddlSexo"),"S")
	pais = FormataDadosStrEInt(request("txtPais"),"S")
	estado = FormataDadosStrEInt(request("txtEstado"),"S")
	cidade = FormataDadosStrEInt(request("txtCidade"),"S")
	telefone = FormataDadosStrEInt(request("txtPhone"),"S")
	pergunta = FormataDadosStrEInt(request("ddlPergunta"),"S")
	repres = FormataDadosStrEInt(request("ddlRepres"),"S")
	resposta = FormataDadosStrEInt(request("txtResposta"),"S")
	

	Randomize()	
  	numRandomico = LEFT((123*Rnd),2)&RIGHT((123*Rnd),2)
	codigo = md5(removeCaracterInv(request("txtLogin")&numRandomico))

	'Verificando se o id já está cadastrado.'
	sql = " SELECT TOP 1 * FROM BANCO_CADASTRO WHERE LOGIN = "&login
	set rs = conexao.execute(sql)
		if not rs.eof then
		bug "<div class='alert alert-danger alert-dismissable'>Ops! Esse ID está cadastrado para outro usuário.</div>"
	end if
	
	'Verificando se o e-mail já está cadastrado.'
	sql = " SELECT TOP 1 * FROM BANCO_CADASTRO WHERE EMAIL = "&email  
	set rs = conexao.execute(sql)
		if not rs.eof then
		bug "<div class='alert alert-danger alert-dismissable'>Ops! Esse e-mail está cadastrado para outro usuário.</div>"
	end if

	'Inserindo conta provisória no banco'
	sql = " INSERT INTO BANCO_CADASTRO (LOGIN, SENHA, NOME, SOBRENOME, EMAIL, SEXO, PERGUNTA, RESPOSTA, PAIS, ESTADO, CIDADE, DIA, MES, ANO, Phone, "
	sql = sql & " CODIGO, STATUS, DATA_CADASTRO, IND_SIT, Rep) "
	sql = sql & " VALUES ("&login&", "&senha&", "&nome&", "&sobrenome&", "&email&", "&sexo&", "&pergunta&","&resposta&","&pais&","&estado&","&cidade&", "
	sql = sql & " "&dia&", "&mes&", "&ano&","&telefone&",'"&codigo&"',0,GETDATE(),1,"&repres&" ) "
	set rs = conexao.execute(sql)

	sql = " SELECT * FROM BANCO_CADASTRO WHERE login = "&login& " AND STATUS = 2 AND IND_SIT = 1 "
	set rs = conexao.execute(sql)
	
	

	bug "<div class='alert alert-warning'>Cadastro concluido.</div>"
	
end if

if combo = "confirmarConta" then
	codigo = FormataDadosStrEInt(removeCaracterInv(request("txtCodigo")),"S")

		sql = " SELECT TOP 1 * FROM BANCO_CADASTRO WHERE codigo = "&codigo& " and status = '1' "
		set rs = conexao.execute(sql)
		if rs.eof then
		bug "<div class='alert alert-danger alert-dismissable'>Essa conta já foi ativa ou o codigo esta incorreto.</div>"

	
		'Registrando ID de coin e timer'
		'sql3 = "INSERT INTO [GameShop].[DBO].[Credits]"
		'sql3 = sql3 & " (id, coins, time) "
		'sql3 = sql3 & " values ("&login&", 0, 0) "
		'conexao.execute(sql3)	
		
		

		else
		

		
				'Inserindo a conta '
		sql2 = "  INSERT INTO [ACCOUNTDB].[DBO].["&Left(Ucase(rs("LOGIN")),1)&"GAMEUSER] "
		sql2 = sql2 & " (userid, Passwd, GPCode, RegistDay, DisuseDay, inuse, grade, EventChk, SelectChk, BlockChk, SpecialChk, Credit, DelChk) "
		sql2 = sql2 & " values ('"&(rs("LOGIN"))&"','"&(rs("SENHA"))&"', 'PTP-RUD001', getdate(), '2090-01-01',0, 0, 0, 0, 0, 0, 0, 0) "
		conexao.execute(sql2)
	
		sql = " UPDATE BANCO_CADASTRO SET STATUS = 2 WHERE codigo = "&codigo	
		set rs = conexao.execute(sql)

		bug "<div class='alert alert-success alert-dismissable'>Conta cadastrada com sucesso!</div>"
		rs.close : set rs = nothing	

		end if
	bug txtMensagem
end if



if combo = "trocarSenha" then
	txtLoginTrocar = FormataDadosStrEInt(removeCaracterInv(request("txtLoginTrocar")),"S")
	txtSenhaAntigaTrocar = FormataDadosStrEInt(removeCaracterInv(request("txtSenhaAntigaTrocar")),"S")
	txtSenhaNovaTrocar = FormataDadosStrEInt(removeCaracterInv(request("txtSenhaNovaTrocar")),"S")

	if IsNumeric(Left(Ucase(replace(txtLoginTrocar,"'","")),1)) = True then
		txtMensagem = "<div id='danger' class='alert alert-danger alert-dismissable'>Dados inválidos, informe os dados corretamente.</div>"
	else
		sql = " SELECT TOP 1 * FROM BANCO_CADASTRO "
		sql = sql & " WHERE login = "&txtLoginTrocar& " AND senha = "&txtSenhaAntigaTrocar
		set rs = conexao.execute(sql)
		
		

		if rs.eof then
			txtMensagem = "<div id='sucsesso' class='alert alert-danger alert-dismissable'>Login /ou senha antiga inválida!</div>"

		else
			'sql = " UPDATE [ACCOUNTDB].[DBO].["&Left(Ucase(replace(txtLoginTrocar,"'","")),1)&"GAMEUSER] "
			'sql = sql & " SET PASSWD = "&txtSenhaNovaTrocar& " WHERE USERID = "&txtLoginTrocar
			'conexao.execute(sql)

			sql2 = " UPDATE BANCO_CADASTRO SET SENHA = "&txtSenhaNovaTrocar& " WHERE LOGIN = "&txtLoginTrocar
			conexao.execute(sql2)
			
	


	sql = " SELECT * FROM BANCO_CADASTRO WHERE login = "&txtLoginTrocar& " AND STATUS = 2 AND IND_SIT = 1 "
	set rs = conexao.execute(sql)
	
	
	'Inserindo a conta '
		sql2 = "  UPDATE [ACCOUNTDB].[DBO].["&Left(Ucase(rs("LOGIN")),1)&"GAMEUSER] SET passwd = "&txtSenhaNovaTrocar& " WHERE userid = "&txtLoginTrocar
		conexao.execute(sql2)
			
			
			
			
			txtMensagem = "<div id='sucsesso' class='alert alert-success alert-dismissable'>Sua senha foi trocada com sucesso!</div>"
		end if
		rs.close : set rs = nothing	
	end if
	bug  txtMensagem
end if

if combo = "recuperarSenha" then
	txtLoginRecuperar = FormataDadosStrEInt(removeCaracterInv(request("txtLoginRecuperar")),"S")
	txtEmailRecuperar = FormataDadosStrEInt(replace(request("txtEmailRecuperar"),"'",""),"S")

	if IsNumeric(Left(Ucase(replace(txtLoginRecuperar,"'","")),1)) = True then
		txtMensagem = "<div id='danger' class='alert alert-danger alert-dismissable'>Dados inválidos, informe os dados corretamente.</div>"
		rs.close : set rs = nothing	
	else
sql = " SELECT TOP 1 * FROM BANCO_CADASTRO WHERE LOGIN = "&txtLoginRecuperar&" AND EMAIL = "&txtEmailRecuperar
		set rs = conexao.execute(sql)
		
		if rs.eof then
			txtMensagem = "<div id='sucsesso' class='alert alert-danger alert-dismissable'>Registro não encontrado!</div>"
		else
			sql = " UPDATE BANCO_CADASTRO SET STATUS = 3 WHERE LOGIN = "&txtLoginRecuperar	
			conexao.execute(sql)
			txtMensagem = "<div id='sucsesso' class='alert alert-success alert-dismissable'>Seus dados foram enviados por email!</div>"
		end if
		rs.close : set rs = nothing	
	end if
	bug  txtMensagem
end if

%>