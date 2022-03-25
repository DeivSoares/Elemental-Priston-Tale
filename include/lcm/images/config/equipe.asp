<% 'Written by Sandurr
Function equipe()
Dim gText, gFileSystemObject, gFile
Dim gequipe

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("equipe.txt"), 1)

Do While gFile.AtEndOfStream = False
	gequipe = gequipe & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gequipe%>


<BR>
<%
End Function
%>