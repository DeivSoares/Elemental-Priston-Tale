<% 'Written by Sandurr
Function noticias1()
Dim gText, gFileSystemObject, gFile
Dim gnoticias1

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("noticias1.txt"), 1)

Do While gFile.AtEndOfStream = False
	gnoticias1 = gnoticias1 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gnoticias1%>


<BR>
<%
End Function
%>