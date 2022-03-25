<% 'Written by Sandurr
Function evento4()
Dim gText, gFileSystemObject, gFile
Dim gevento4

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("evento4.txt"), 1)

Do While gFile.AtEndOfStream = False
	gevento4 = gevento4 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gevento4%>


<BR>
<%
End Function
%>