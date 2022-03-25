<% 'Written by Sandurr
Function evento3()
Dim gText, gFileSystemObject, gFile
Dim gevento3

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("evento3.txt"), 1)

Do While gFile.AtEndOfStream = False
	gevento3 = gevento3 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gevento3%>


<BR>
<%
End Function
%>