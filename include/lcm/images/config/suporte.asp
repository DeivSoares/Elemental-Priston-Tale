<% 'Written by Sandurr
Function suporte()
Dim gText, gFileSystemObject, gFile
Dim gsuporte

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("suporte.txt"), 1)

Do While gFile.AtEndOfStream = False
	gsuporte = gsuporte & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gsuporte%>


<BR>
<%
End Function
%>