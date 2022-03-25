<% 'Written by Sandurr
Function evento1()
Dim gText, gFileSystemObject, gFile
Dim gevento1

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("evento1.txt"), 1)

Do While gFile.AtEndOfStream = False
	gevento1 = gevento1 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gevento1%>


<BR>
<%
End Function
%>