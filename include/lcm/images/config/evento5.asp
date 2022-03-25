<% 'Written by Sandurr
Function evento5()
Dim gText, gFileSystemObject, gFile
Dim gevento5

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("evento5.txt"), 1)

Do While gFile.AtEndOfStream = False
	gevento5 = gevento5 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gevento5%>


<BR>
<%
End Function
%>