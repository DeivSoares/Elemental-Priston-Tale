<% 
Dim BlackList, ErrorPage, s



BlackList = Array("'","--",";","--","'","%27","SELECT","DELETE","DROP","UPDATE","UNION","MASTER","sys.databases","sys.tables","char(","die(")

ErrorPage = "ErrorPage.asp"
               
Function CheckStringForSQL(str) 
  On Error Resume Next 
  
  Dim lstr 
  
  ' If the string is empty, return true
  If ( IsEmpty(str) ) Then
    CheckStringForSQL = false
    Exit Function
  ElseIf ( StrComp(str, "") = 0 ) Then
    CheckStringForSQL = false
    Exit Function
  End If
  
  lstr = LCase(str)
  
  ' Check if the string contains any patterns in our
  ' black list
  For Each s in BlackList
  
    If ( InStr (lstr, s) <> 0 ) Then
      CheckStringForSQL = true
      Exit Function
    End If
  
  Next
  
  CheckStringForSQL = false
  
End Function 


'''''''''''''''''''''''''''''''''''''''''''''''''''
'  Check forms data
'''''''''''''''''''''''''''''''''''''''''''''''''''

For Each s in Request.Form
  If ( CheckStringForSQL(Request.Form(s)) ) Then
  
    ' Redirect to an error page
    Response.Redirect(ErrorPage)
  
  End If
Next

'''''''''''''''''''''''''''''''''''''''''''''''''''
'  Check query string
'''''''''''''''''''''''''''''''''''''''''''''''''''

For Each s in Request.QueryString
  If ( CheckStringForSQL(Request.QueryString(s)) ) Then
  
    ' Redirect to error page
    Response.Redirect(ErrorPage)

    End If
  
Next


'''''''''''''''''''''''''''''''''''''''''''''''''''
'  Check cookies
'''''''''''''''''''''''''''''''''''''''''''''''''''

For Each s in Request.Cookies
  If ( CheckStringForSQL(Request.Cookies(s)) ) Then
  
    ' Redirect to error page
    Response.Redirect(ErrorPage)
 End If
  
Next

Sub FillSettings()
        dbhost = "PRIME"
        dbuser = "sa"
        dbpass = "1q2w!@QW"
        dbname = "ClanDB"
End Sub
%>