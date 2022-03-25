<% 'Written by Sandurr
Function noticias3()
Dim gText, gFileSystemObject, gFile
Dim gnoticias3

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("noticias3.txt"), 1)

Do While gFile.AtEndOfStream = False
	gnoticias3 = gnoticias3 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gnoticias3%>


<BR>
<%
End Function
%>