<!-- #include file ="settings.asp" -->
<%
'Written By Sandurr COPYRIGHT Sandurr 2006
'Version 2.0 NOVEMBER 2006
'Atualização de proteção feita por Undead (biancorezer@hotmail.com) em 06/11/2012

' Assign Global Variables
Dim dbhost, dbuser, dbpass, dbname, userid, gserver, chname, clName, clwon, clwonUserid, lv, chtype, chlv, chipflag

FillSettings()

Dim strSplit
strSplit = Chr("&H" & "0D")

' Parameter Variables
' clanInsertClanWon (userid, gserver, chname, clName, clwon, clwonUserid, lv, chtype, chlv, chipflag)
userid = AntiInject(Trim(Request("userid"))) 'Userid of Leader
gserver = AntiInject(Trim(Request("gserver"))) 
chname = AntiInject(Trim(Request("chname"))) 'Char name of Leader
clName = AntiInject(Trim(Request("clName")))
clwon = AntiInject(Trim(Request("clwon"))) 'Char name of invited player
clwonUserid = AntiInject(Trim(Request("clwonUserid"))) 'Userid of invited player
lv = AntiInject(Trim(Request("lv"))) 'unimportant
chtype = AntiInject(Trim(Request("chtype")))
chlv = AntiInject(Trim(Request("chlv")))
chipflag = AntiInject(Trim(Request("chipflag"))) 'char IP flag ? unimportant


if userid = "" Or gserver = "" Or chname = "" Or clName = "" Or clwon = "" Or clwonUserid = "" Or lv = "" Or chtype = "" Or chlv = "" Then
	Response.Write("Code=100" & strSplit)
	Response.End
End if

Dim QUERY, RS, objConn

Set objConn = Server.CreateObject("ADODB.Connection")
objConn.Open "Provider=SQLOLEDB; Data Source=" & dbhost & "; Initial Catalog=" & dbname & "; User ID=" & dbuser & "; Password=" & dbpass

Set RS = Server.CreateObject("ADODB.Recordset")


QUERY = "SELECT IDX,ClanZang,MemCnt,clanpoints FROM CL WHERE ClanName='" & clName & "'"
RS.Open QUERY, objConn, 3, 1

Dim strReturn
Dim ClanLeader, ClanMembers, ClanSubChief, IDX, tclName2, KFlag
if RS.RecordCount >= 1 Then
	ClanLeader = RS("ClanZang").Value
	ClanMembers = CInt(RS("MemCnt").Value)
	IDX = RS("IDX").Value
	tclName2 = RS("clanpoints").Value
	RS.Close
Else
	Set RS = Nothing
	objConn.Close
	Set objConn = Nothing
	strReturn = "Code=0" & strSplit //erro 64
	Response.Write(strReturn)
	Response.End
End if

QUERY = "SELEct  top 1 * FROM ConfigPontos WHERE pontos <= " & tclName2 & " order by level desc"
RS.Open QUERY, objConn, 3, 1

Dim lvlclan, maxmember
	lvlclan = RS("level").Value
	maxmember = RS("maxmembers").Value
	RS.Close
	
If ClanMembers >= maxmember then
	Set RS=Nothing
	objConn.Close
	Set objConn = Nothing
	strReturn = "Code=2" & strSplit
	Response.Write(strReturn)
	Response.End
End If


QUERY = "SELECT ChName FROM UL WHERE Permi=2 AND ClanName='" & clName & "'"
RS.Open QUERY, objConn, 3, 1

If RS.RecordCount >= 1 Then
	ClanSubChief = RS("ChName").Value
Else
	ClanSubChief = ""
End If

if ClanLeader <> chname And ClanSubChief <> chname Then
	Set RS = Nothing
	objConn.Close
	Set objConn = Nothing
	strReturn = "Code=0" & strSplit
	Response.Write(strReturn)
	Response.End
End if

RS.Close

QUERY = "SELECT ClanName FROM UL WHERE ChName='" & clwon & "'"
RS.Open QUERY, objConn, 3, 1

Dim UclName
if RS.RecordCount >= 1 Then
	UclName = RS("ClanName").Value
Else
	UclName = ""
End if

if Not UclName = "" Then
	RS.Close
	Set RS = Nothing
	objConn.Close
	Set objConn = Nothing
	strReturn = "Code=0" & strSplit
	Response.Write(strReturn)
	Response.End
Else
	if UclName = "" And RS.RecordCount >= 1 Then
		RS.Close
		QUERY = "DELETE FROM UL WHERE ChName='" & clwon & "'"
		RS.Open QUERY, objConn, 3, 1
	End if
End if
RS.Close

ClanMembers = ClanMembers + 1

QUERY = "UPDATE CL SET MemCnt='" & ClanMembers & "' WHERE ClanName='" & clName & "'"
RS.Open QUERY, objConn, 3, 1
QUERY = "INSERT INTO UL ([IDX],[userid],[ChName],[ClanName],[ChType],[ChLv],[Permi],[JoinDate],[DelActive],[PFlag],[KFlag],[MIconCnt]) values('" & IDX & "','" & clwonUserid & "','" & clwon & "','" & clName & "','" & chtype & "','" & chlv & "','0',getdate(),'0','0','0','0')"
RS.Open QUERY, objConn, 3, 1

strReturn = "Code=1" & strSplit //personagem no clan
SET RS = Nothing
objConn.Close
SET objConn = Nothing

Response.Write(strReturn)
%>