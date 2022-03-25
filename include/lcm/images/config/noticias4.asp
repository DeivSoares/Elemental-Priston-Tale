<% 'Written by Sandurr
Function noticias4()
Dim gText, gFileSystemObject, gFile
Dim gnoticias4

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("noticias4.txt"), 1)

Do While gFile.AtEndOfStream = False
	gnoticias4 = gnoticias4 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gnoticias4%>


<BR>
<%
End Function
%>