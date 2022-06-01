<?
 mb_http_output( "iso-8859-1" );

 ob_start("mb_output_handler");

 header("Content-Type: text/html; charset=ISO-8859-1",true);
 
 <!--#include file="include/configurar.asp"-->
<!--#include file="include/funcoes.asp"-->
<% 
dim ret : ret = 0
if request.queryString("sessao") <> "" then
    call conectaBD
    ret = verificaSessao(removeCaracterInv(request.queryString("sessao")))
    if ((ret="0") or (ret=0)) then
        response.redirect("default.asp")
    end if
end if 
%>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web Site Elemental Priston - <%=year(now)%></title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
</head><!--/head-->

<body class="homepage">


    <section>
        <!--#include file="code.asp"-->
    </section>



    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    &copy; <%=year(now)%> Elemental Priston - Todos os direitos reservados.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/cadastro.js"></script>

</body>
</html>