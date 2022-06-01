<section id="contact-page" class="contact-page wow fadeInDown">
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/cadastro.js"></script> 
 <div class="container">
        <div id="cadastrar" class="center wow fadeInDown">        
            <h2>Cadastrar / Confirmar conta</h2>
            <p class="lead">Olá, Seja bem vindo ao <%=Session("NomeServidor")%>, informe seus dados corretamente.</p>
        </div> 

        <ul class="nav nav-tabs">

            <li class="active">
                <a href="#2" style="cursor:pointer;" role="tab" data-toggle="tab">Confirmar conta</a>
            </li>
            
        </ul>
        
            <div class="tab-pane" id="2">
                <div class="row contact-wrap">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Código <font color="red"><b>*</b></font></label>
                            <input type="email" name="txtCodigo" id="txtCodigo" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-5 col-sm-offset-1">
                        <button id="btnConfirmar" class="btn btn-primary btn-lg" onclick="confirmarConta();">Confirmar</button>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-11 col-sm-offset-1">
                        <center><span id="SPConfirmaConta"></span></center>
                    </div>
                </div>
            </div>
                <div class="row contact-wrap">
                    <div class="col-sm-11 col-sm-offset-1">
                        <center><span id="SPRecuperarSenha"></span></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
