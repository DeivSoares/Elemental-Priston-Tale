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

    <header id="header">
 
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="default.asp?sessao=<%=request.queryString("sessao")%>">
					<!--<img src="images/logo.png" alt="logo">-->
					</a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="http://site.elemental Priston.com.br/">Home</a></li>
                        <li class="active"><a href="http://base.Elemental Priston.com.br:50001/Elemental Priston-Panel/index.php">Painel</a></li>
					   <% if request.queryString("sessao") <> "" then %>
                            <li><a href="ticket/principal.asp?sessao=<%=request.queryString("sessao")%>" target="_blank">Ticket</a></li>
                            <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paineis <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://servidor.gamapristontale.com:85/painel/principal.php?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel player</a></li>
                                    <li><a href="ticket/principal.asp?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel ticket</a></li>
                                </ul>
                            </li>-->
							
							
                        <% end if %>
						                        <% if request.queryString("sessao") <> "" then %>
                          <!--  <li><a href="http://site.Elemental Priston.com.br:8090/PristonTale/Prime_Fusion/system/painel/principal.php?sessao=<%=request.queryString("sessao")%>" target="_blank">Painel personagem</a></li>
                            <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paineis <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://servidor.gamapristontale.com:85/painel/principal.php?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel player</a></li>
                                    <li><a href="site.Elemental Priston.com.br:8090/PristonTale/Prime_Fusion/system/painel/principal.php?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel ticket</a></li>
                                </ul>
                            </li>-->
                        <% end if %>
						                        <% if request.queryString("sessao") <> "" then %>
                           <!-- <li><a href="../../sistemas/principal.asp?sessao=<%=request.queryString("sessao")%>" target="_blank">Painel Clan</a></li>
                            <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paineis <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://servidor.gamapristontale.com:85/painel/principal.php?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel player</a></li>
                                    <li><a href="../../sistemas/principal.asp?sessao=<%=request.queryString("sessao")%>" target="_blank">
                                    Painel ticket</a></li>
                                </ul>
                            </li>-->
                        <% end if %>
                        <!--<li><a href="#cadastrar">Cadastrar</a></li>
									
                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Elemental Priston <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <% for l = 0 to UBound(matriz_info)  %>
                                    <li><a data-toggle="modal" data-target="#<%=matriz_info(l,1)%>" style="cursor:pointer;"><%=matriz_info(l,0)%></a></li>
                                <% next %>
                            </ul>
                            <!--#include file="informacoes.asp"-->
                            <!--#include file="equipe.asp"-->
                            <!--#include file="boss.asp"-->
                        </li>   

                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mídias <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <% for l = 0 to UBound(matriz_midias)  %>
                                    <li><a href="<%=matriz_midias(l,1)%>" target="_blank"><%=matriz_midias(l,0)%></a></li>
                                <% next %>
                            </ul>
                        </li>       -->                 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Oi, <%response.write(retornaSaudacao())%></h1>
                                    <% if request.queryString("sessao") = "" then %>
                                    <h2 class="animation animated-item-2">Acesse o painel na parte superior do site.</h2> 
                                    <!-- Sistema de login no site -->
                                        <div class="row" id="SPCarregaLogado">
                                           <!-- <div class="col-md-12 animation animated-item-3" style="margin:0; padding:0;">
                                                <div class="col-sm-4" style="margin:0; padding:0; margin-left:10px;">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="txtLogin" name="txtLogin" placeholder="Informe seu login"  maxlength="15">
                                                        <span class="input-group-addon">
                                                        <i class="icon ion-person"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" style="margin:0; padding:0; margin-left:10px;">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control danger" id="txtSenha" name="txtSenha" placeholder="Informe sua senha" maxlength="15">
                                                        <span class="input-group-addon"><i class="icon ion-key"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin:0; padding:0; margin-left:10px;">
                                                     <button type="button" class="btn btn-danger" onclick="efetuarLogin();">Acessar</button>
                                                </div>
                                           --> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 animation animated-item-3" style="margin:0; padding:0; margin-top:10px; margin-left:10px; width:90%;">
                                                <span id="SPResultadoPainel"></span>
                                            </div>
                                        </div>
                                    <% else %>
                                    <!--    <h2 class="animation animated-item-2">Sua sessão é: <%=request.queryString("sessao")%></h2>
                                    -->     <button type="button" class="btn btn-danger" onclick="desconectar('<%=request.queryString("sessao")%>');">Desconectar</button>
                                   <% end if %>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

               <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Aproveite para se tornar mais forte. </h1>
                                    <h2 class="animation animated-item-2">Saiba como migrar para o nosso servidor e ter o seu char como parte da nossa comunidade.</h2>
                                    <a class="btn-slide animation animated-item-3" href="https://www.facebook.com/PT.Draco">Saiba Mais</a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Crie sua conta gratis. </h1>
                                    <h2 class="animation animated-item-2">Jogue gratuaitamente e ganhe Coin's ao manter sua conta Online.</h2>
                                    <a class="btn-slide animation animated-item-3" href="https://www.facebook.com/PT.Draco">Saiba Mais</a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				<!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section>
        <!--#include file="cadastro.asp"-->
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

    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/cadastro.js"></script>

</body>
</html>