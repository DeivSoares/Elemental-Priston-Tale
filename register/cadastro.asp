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
                <a href="#1" style="cursor:pointer;" role="tab" data-toggle="tab">Cadastrar nova conta</a>
            </li>
          
		   <li>
                <a href="#2" style="cursor:pointer;" role="tab" data-toggle="tab">Confirmar conta</a>
            </li>
			
            <li>
                <a href="#3" style="cursor:pointer;" role="tab" data-toggle="tab">Trocar senha</a>
            </li>
            <li>
                <a href="#4" style="cursor:pointer;" role="tab" data-toggle="tab">Recuperar dados</a>
            </li>
        </ul>
        <div class="tab-content" style="background:#fdfdfd; border-left:1px solid #dddddd; border-right:1px solid #dddddd; border-bottom:1px solid #dddddd; margin-bottom:15px;">
            <div class="tab-pane active" id="1">
                <div class="row contact-wrap">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Login <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtLoginCadastro" id="txtLoginCadastro" size="23" maxlength="22" class="form-control" style="border-color:#ccc;">
                        </div>
                        <div class="form-group">
                            <label>Senha <font color="red"><b>*</b></font></label>
                            <input type="password" name="txtSenhaCadastro" id="txtSenhaCadastro" size="101" maxlength="100" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nome <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtNome" id="txtNome" class="form-control" style="border-color:#ccc;">
                        </div>              
                        <div class="form-group">
                            <label>Sobrenome <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtSobrenome" id="txtSobrenome" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Email <font color="red"><b>*</b></font></label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Data nascimento <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtDataNascimento" id="txtDataNascimento" class="form-control" style="border-color:#ccc;" onkeyup="return Formatadata(this,event);" placeholder="dd/mm/aaaa" maxlength="10">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Sexo <font color="red"><b>*</b></font></label>
                            <select name="ddlSexo" id="ddlSexo" class="form-control" style="border-color:#ccc;" >
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>País <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtPais" id="txtPais" class="form-control" style="border-color:#ccc;" >
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Estado <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtEstado" id="txtEstado" class="form-control" style="border-color:#ccc;" >
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Cidade <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtCidade" id="txtCidade" class="form-control" style="border-color:#ccc;" >
                        </div>
                    </div>  
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Telefone <font color="red"><b>(Whatsapp) *</b></font></label>
                            <input type="text" name="txtPhone" id="txtPhone" class="form-control phone-ddd-mask" style="border-color:#ccc;" placeholder="Ex.: (00) 00000-0000">
                        </div>
                    </div>  
					
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Pergunta secreta: <font color="red"><b>*</b></font></label>
                            <select name="ddlPergunta" id="ddlPergunta" class="form-control" style="border-color:#ccc;" >
                                <option value="">Selecione</option>
                                <% for i = 1 TO Ubound(arrayPerguntas) %>
                                    <option <%=i%>><%=arrayPerguntas(i)%></option>
                                <% next %>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Comoo conheceu o jogo: <font color="red"><b>*</b></font></label>
                            <select name="ddlRepres" id="ddlRepres" class="form-control" style="border-color:#ccc;" >
                                <option value="">Selecione</option>
                                <% for i = 1 TO Ubound(arrayRep) %>
                                    <option <%=i%>><%=arrayRep(i)%></option>
                                <% next %>
                            </select>
                        </div>
                    </div>
					
					<div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Resposta secreta: <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtResposta" id="txtResposta" class="form-control" style="border-color:#ccc;" >
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <button id="btnCadastrar" class="btn btn-primary btn-lg" onclick="cadastrar();">Cadastrar</button>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-11 col-sm-offset-1">
                        <center><span id="SPCadastro"></span></center>
                    </div>
                </div>
            </div>
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
            <div class="tab-pane" id="3">
                <div class="row contact-wrap">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label>Login <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtLoginTrocar" id="txtLoginTrocar" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label>Senha antiga <font color="red"><b>*</b></font></label>
                            <input type="password" name="txtSenhaAntigaTrocar" id="txtSenhaAntigaTrocar" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label>Senha nova <font color="red"><b>*</b></font></label>
                            <input type="password" name="txtSenhaNovaTrocar" id="txtSenhaNovaTrocar" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-5 col-sm-offset-1">
                        <button id="brnTrocarSenha" class="btn btn-primary btn-lg" onclick="trocarSenha();">Trocar</button>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-11 col-sm-offset-1">
                        <center><span id="SPTrocarSenha"></span></center>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="4">
                <div class="row contact-wrap">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label>Login <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtLoginRecuperar" id="txtLoginRecuperar" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label>E-mail <font color="red"><b>*</b></font></label>
                            <input type="text" name="txtEmailRecuperar" id="txtEmailRecuperar" class="form-control" style="border-color:#ccc;">
                        </div>
                    </div>
                </div>
                <div class="row contact-wrap">
                    <div class="col-sm-5 col-sm-offset-1">
                        <button id="btnRecuperarSenha" class="btn btn-primary btn-lg" onclick="recuperarSenha();">Recuperar</button>
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
