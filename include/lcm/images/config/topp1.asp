<% 'Written by Sandurr
Function topp1()
Dim gText, gFileSystemObject, gFile
Dim gtopp1

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("topp1.txt"), 1)

Do While gFile.AtEndOfStream = False
	gtopp1 = gtopp1 & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gtopp1%>


<BR>
<%
End Function
%>