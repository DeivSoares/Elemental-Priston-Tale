<%


function bug(Valor)
	response.Write Valor
	response.end
End Function
	
function rw(Valor)
	response.Write Valor
End Function

function retornaSaudacao()
	dim retorno : retorno = "Bom dia!"
	hora = hour(now)
	if hora>11 and hora<18 then
		retorno = "Boa tarde!"
	end if
	if hora>17 and hora<24 then
		retorno = "Boa noite!"
	end if
	retornaSaudacao = retorno
End Function

Function removeCaracterInv(conteudo)
	Dim string_ : string_ = conteudo
	string_ = Replace(string_,"'","")
	string_ = Replace(string_,",","")
	string_ = Replace(string_,"-","")
	'string_ = Replace(string_,".","")
	string_ = Replace(string_,"(","")
	string_ = Replace(string_,")","")
	string_ = Replace(string_,"/","")
	string_ = Replace(string_,"\","")
	string_ = Replace(string_,"|","")
	Dim lixoA : lixoA = array ("select" , "drop" , "--" , "insert" , "delete" , "xp_" , "'" , "update" , "=", "-shutdown", "&")
	Dim textoLimpoA : textoLimpoA = string_
	for l = 0 to uBound(lixoA)
		textoLimpoA = replace( textoLimpoA ,  lixoA(l) , "")
	next
	removeCaracterInv = textoLimpoA
End function

Function FormataDadosStrEInt(dados,tipo)
	if UCase(tipo) = "S" Then
		if UCase(dados) = "" or UCase(dados) = "NULL" Then
			dados = "NULL"
		Else
			dados = "'"&dados&"'"
		End If
	End If
	if UCase(tipo) = "I" Then
		dados = FormataString(dados)
		if UCase(dados) = "" Or UCase(dados) = "0" Or UCase(dados) = "0.0" Or UCase(dados) = "0.00" Then
			dados = "NULL"
		End If
	End If
	FormataDadosStrEInt = dados
End Function

Function ConverterDataBanco(Data,Tipo)	
	Dim retorno_data : retorno_data = "NULL"
	If ( (Trim(Data) <> "") And (Trim(Data) <> "NULL") And (instr(Data,"/") > 0) ) Then
		DataFormatada = Split(Data,"/")
		Select Case Tipo
			Case 1
				TipoData = " 00:00:00"
			Case 2
				TipoData = " 23:59:59"
			Case  3	
				TipoData = ""
			Case  4 'foi criada para utilização na alteração de histórico do contrato'
				TipoData = " " & right("00"&hour(now),2) &":"& right("00"&minute(now),2) &":"& right("00"&second(now),2)
			End Select
			
			retorno_data = DataFormatada(2)&Right("00"&DataFormatada(1),2)&Right("00"&DataFormatada(0),2)&TipoData
	End If
	ConverterDataBanco = retorno_data	
End Function

function verificaSessao(sessao)
	dim retornoSessao : retornoSessao = 0
	sql = " SELECT PERMISSAO FROM BANCO_USUARIO WHERE SESSAO = '"&sessao&"'"
	set rs = conexao.execute(sql)
	if not rs.eof then
		retornoSessao = rs(0)
	end if
	verificaSessao = retornoSessao
end function



'function enviaEmail(cadastroID)
'	dim retornoEmail : retornoEmail = "" 
 ' 	Set oXMLHTTP = CreateObject("MSXML2.ServerXMLHTTP.3.0")
 ' 	oXMLHTTP.Open "GET", caminhoEnviaEmail&"?cadastroID="&cadastroID, False
 ' 	oXMLHTTP.Send
'	If oXMLHTTP.Status = 200 Then
 '   	retornoEmail = oXMLHTTP.responseText
 ' 	End If
 ' 	enviaEmail = retornoEmail
'end function
%>