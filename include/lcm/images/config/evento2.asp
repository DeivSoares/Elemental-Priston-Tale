<% 'Written by Sandurr
Function evento2()
Dim gText, gFileSystemObject, gFile
Dim gevento2

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("evento2.txt"), 1)

Do While gFile.AtEndOfStream = False
	gevento2 = gevento2 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gevento2%>


<BR>
<%
End Function
%>