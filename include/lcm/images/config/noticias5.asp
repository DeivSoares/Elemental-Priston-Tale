<% 'Written by Sandurr
Function noticias5()
Dim gText, gFileSystemObject, gFile
Dim gnoticias5

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("noticias5.txt"), 1)

Do While gFile.AtEndOfStream = False
	gnoticias5 = gnoticias5 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gnoticias5%>


<BR>
<%
End Function
%>