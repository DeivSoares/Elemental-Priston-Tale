<% 'Written by Sandurr
Function doacao()
Dim gText, gFileSystemObject, gFile
Dim gdoacao

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("doacao.txt"), 1)

Do While gFile.AtEndOfStream = False
	gdoacao = gdoacao & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gdoacao%>


<BR>
<%
End Function
%>