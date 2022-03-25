<% 'Written by Sandurr
Function noticias2()
Dim gText, gFileSystemObject, gFile
Dim gnoticias2

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("noticias2.txt"), 1)

Do While gFile.AtEndOfStream = False
	gnoticias2 = gnoticias2 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gnoticias2%>


<BR>
<%
End Function
%>