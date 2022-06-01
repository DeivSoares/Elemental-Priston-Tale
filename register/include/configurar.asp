<%
	' Escrito por Bruno Sobral
	' Data: 15/02/2016

	Public Conexao
	
	Dim serveSql : serveSql = "PRIME" 
	Dim dataBaseSql : dataBaseSql = "Prime_Panel"
	Dim loginSql : loginSql = "sa"
	Dim senhaSql : senhaSql = "1q2w!@QW"

	Session("NomeServidor") = "Elemental Priston"
	Session("ClanContent") = "http://http://site.elementalpristontale.com:31206/ClanContent/"

	Public matriz_info(2,1)
	matriz_info(0,0) = "Informações" : matriz_info(0,1) = "myModalInfos"
	matriz_info(1,0) = "Equipe" : matriz_info(1,1) = "myModalEquipe"
	matriz_info(2,0) = "Lista de Mix" : matriz_info(2,1) = "myModalBoss"

	Public matriz_midias(1,1)
	matriz_midias(0,0) = "Facebook" : matriz_midias(0,1) = "http://www.facebook.com/Elemental Priston.corp"
	matriz_midias(1,0) = "Fórum" : matriz_midias(1,1) = "http://site.elementalpristontale.com:31206/"

	
	'Para add perguntas na confirmação de conta, só ir add e aumentando o valor no array.
	Public arrayPerguntas(3)
	arrayPerguntas(1) = "Qual sua cor favorita"
	arrayPerguntas(2) = "Qual sua escola"
	arrayPerguntas(3) = "Qual o nome do seu cachorro"
	
	Public arrayRep(5)
	arrayRep(1) = "FaceBook"
	arrayRep(2) = "Instagram"
	arrayRep(3) = "Amigos"
	arrayRep(4) = "Google"
	arrayRep(5) = "Outros"

	Public Sub ConectaBD()
		Set Conexao = Server.CreateObject("ADODB.Connection") 
		On error resume next
		Err.clear()
		Conexao.Open "Driver={SQL Server};Server="&ServeSql&";Database="&dataBaseSql&";Uid="&LoginSql&";Pwd="&SenhaSql&";" 
		If Err.number <> 0 then
			Response.write("Erro no banco de dados.")
			Response.end()
		End if
	End Sub
%>