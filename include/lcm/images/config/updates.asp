<% 'Written by Sandurr
Function updates()
Dim gText, gFileSystemObject, gFile
Dim gupdates

Set gFileSystemObject=Server.CreateObject("Scripting.FileSystemObject")
Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("news.txt"), 1)

Do While gFile.AtEndOfStream = False
	gText = gText & gFile.ReadLine & "<BR>"
Loop

gFile.Close
Set gFile=Nothing

Set gFile=gFileSystemObject.OpenTextFile(Server.MapPath("updates.txt"), 1)

Do While gFile.AtEndOfStream = False
	gupdates = gupdates & gFile.ReadLine
Loop

gFile.Close
Set gFile=Nothing
Set gFileSystemObject=Nothing
%>






<%=gupdates%>


<BR>
<%
End Function
%>