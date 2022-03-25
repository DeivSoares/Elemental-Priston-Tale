<% 'Written by Sandurr
Function regras()
Dim gText, gFileSystemObject, gFile
Dim gregras

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("regras.txt"), 1)

Do While gFile.AtEndOfStream = False
	gregras = gregras & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gregras%>


<BR>
<%
End Function
%>