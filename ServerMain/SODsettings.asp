<%
'Written By Sandurr COPYRIGHT Sandurr 2006
'Written By Sandurr COPYRIGHT Sandurr 2006
'Written By Sandurr COPYRIGHT Sandurr 2006
'Written By Sandurr COPYRIGHT Sandurr 2006
'Written By Sandurr COPYRIGHT Sandurr 2006
'Version 1.0 SEPTEMBER 2006 (Clan 2.0 SoD 1.0)

Sub FillSettings()
	dbhost = "PTL\SQLEXPRESS"
	dbuser = "sa"
	dbpass = "#$pdl32xq"
	dbname1 = "ClanDB"
	dbname2 = "SOD2DB"
End Sub

Function InArray(What, TheArray)
	Dim iArray

	For iArray = 1 To 250
		If TheArray(iArray) = What Then
			InArray = True
			Exit Function
		End If
	Next
	InArray = False
End Function
%>