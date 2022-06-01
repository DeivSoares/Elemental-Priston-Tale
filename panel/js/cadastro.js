function retornaCritica(texto, cor, campo)
{
	$("#"+campo).focus();
	$("#SPCadastro").html("<div class='alert alert-"+cor+" alert-dismissable'>"+texto+"</div>");
	setTimeout("$('#SPCadastro').html('');",1000);
}

function retornaCriticaConfirma(texto, cor, campo)
{
	$("#"+campo).focus();
	$("#SPConfirmaConta").html("<div class='alert alert-"+cor+" alert-dismissable'>"+texto+"</div>");
	setTimeout("$('#SPConfirmaConta').html('');",1500);
}


function checarEmail(email)
{
	er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(email))
	{
		return true;
	} else {
		return false;
	}
}

function Formatadata(Campo, teclapres)
{
  var tecla = teclapres.keyCode;
  var vr = new String(Campo.value);
  vr = vr.replace("/", "");
  vr = vr.replace("/", "");
  vr = vr.replace("/", "");
  tam = vr.length + 1;
  if (tecla != 8 && tecla != 8)
  {
    if (tam > 0 && tam < 2)
      Campo.value = vr.substr(0, 2) ;
    if (tam > 2 && tam < 4)
      Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
    if (tam > 4 && tam < 7)
      Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
  }
}

function cadastrar()
{
	var txtLogin = $("#txtLoginCadastro").val();
	if(txtLogin=="")
	{
		retornaCritica("Por favor, informe um login.", "danger", "txtLoginCadastro");
		return false;
	}

	var txtSenha = $("#txtSenhaCadastro").val();
	if(txtSenha=="")
	{
		retornaCritica("Por favor, informe uma senha.", "danger", "txtSenhaCadastro");
		return false;
	}

	var txtNome = $("#txtNome").val();
	if(txtNome=="")
	{
		retornaCritica("Por favor, informe seu nome.", "danger", "txtNome");
		return false;
	}

	var txtSobrenome = $("#txtSobrenome").val();
	if(txtSobrenome=="")
	{
		retornaCritica("Por favor, informe seu sobrenome.", "danger", "txtSobrenome");
		return false;
	}

	var txtEmail = $("#txtEmail").val();
	if(txtEmail=="")
	{
		retornaCritica("Por favor, informe seu e-mail.", "danger", "txtEmail");
		return false;
	} else if(checarEmail(txtEmail)==false) {
		retornaCritica("Por favor, informe um e-mail válido.", "danger", "txtEmail");
		return false;
	}

	var txtDataNascimento = $("#txtDataNascimento").val();
	if(txtDataNascimento=="")
	{
		retornaCritica("Por favor, informe sua data de nascimento.", "danger", "txtDataNascimento");
		return false;
	}

	var ddlSexo = $("#ddlSexo").val();

	var txtPais = $("#txtPais").val();
	if(txtPais=="")
	{
		retornaCritica("Por favor, informe seu pais.", "danger", "txtPais");
		return false;
	}

	var txtEstado = $("#txtEstado").val();
	if(txtEstado=="")
	{
		retornaCritica("Por favor, informe seu estado.", "danger", "txtCidade");
		return false;
	}

	var txtCidade = $("#txtCidade").val();
	if(txtCidade=="")
	{
		retornaCritica("Por favor, informe sua cidade.", "danger", "txtCidade");
		return false;
	}

	var ddlPergunta = $("#ddlPergunta").val();
	if(ddlPergunta=="")
	{
		retornaCritica("Por favor, informe a pergunta.", "danger", "ddlPergunta");
		return false;
	}

	var txtResposta = $("#txtResposta").val();
	if(txtResposta=="0")
	{
		retornaCritica("Por favor, informe a resposta.", "danger", "txtResposta");
		return false;
	}

	$("#SPCadastro").html("<div class='alert alert-warning'>Cadastrando, aguarde..</div>");
    $.ajax({
        type: "POST",
        url: "ajax_cadastro.asp",
        data: {Combo: "cadastrar", txtLogin: txtLogin, txtSenha: txtSenha, txtNome: txtNome, txtSobrenome: txtSobrenome, txtSobrenome, txtEmail: txtEmail, txtDataNascimento: txtDataNascimento, ddlSexo: ddlSexo, txtPais: txtPais, txtEstado: txtEstado, txtCidade: txtCidade, ddlPergunta: ddlPergunta, txtResposta: txtResposta }
    })
    .done(function(msg) {
        $("#SPCadastro").html(msg);
        setTimeout("$('#SPCadastro').html('');",2500);
        if(msg.search("sucesso")>0)
        {
			$("#txtLoginCadastro").val('');
			$("#txtSenhaCadastro").val('');
			$("#txtNome").val('');
			$("#txtSobrenome").val('');
			$("#txtEmail").val('');
			$("#txtDataNascimento").val('');
			$("#ddlSexo").val('M');
			$("#txtPais").val('');
			$("#txtEstado").val('');
			$("#txtCidade").val('');
			$("#ddlPergunta").vall('');
			$("#txtResposta").val('');
        }
    });
}

function confirmarConta()
{
	var txtCodigo = $("#txtCodigo").val();
	if(txtCodigo=="")
	{
		retornaCriticaConfirma("Por favor, informe sua data de nascimento.", "danger", "txtCodigo");
		return false;
	}

	$("#SPConfirmaConta").html("<div class='alert alert-warning'>Cadastrando, aguarde..</div>");
    $.ajax({
        type: "POST",
        url: "ajax_cadastro.asp",
        data: {Combo: "confirmarConta", txtCodigo: txtCodigo }
    })
    .done(function(msg) {
        $("#SPConfirmaConta").html(msg);
        setTimeout("$('#SPConfirmaConta').html('');",2500);
        if(msg.search("sucesso")>0)
        {
        	var login = $("#sucsesso").attr("login");
        	var senha = $("#sucsesso").attr("senha");
        	if((login!="") && (senha!=""))
        	{
	        	$("#txtLogin").val(login)
	        	$("#txtSenha").val(senha);
	        	setTimeout("efetuarLogin();",1000);
        	}
        }
    });
}

function trocarSenha()
{
	var txtLoginTrocar = $("#txtLoginTrocar").val();
	if(txtLoginTrocar=="")
	{
		$("#txtLoginTrocar").focus();
		$("#SPTrocarSenha").html("<div class='alert alert-danger alert-dismissable'>Por favor, informe o login.</div>");
		setTimeout("$('#SPTrocarSenha').html('');",1500);
		return false;
	}

	var txtSenhaAntigaTrocar = $("#txtSenhaAntigaTrocar").val();
	if(txtSenhaAntigaTrocar=="")
	{
		$("#txtSenhaAntigaTrocar").focus();
		$("#SPTrocarSenha").html("<div class='alert alert-danger alert-dismissable'>Por favor, informe a senha antiga.</div>");
		setTimeout("$('#SPTrocarSenha').html('');",1500);
		return false;
	}

	var txtSenhaNovaTrocar = $("#txtSenhaNovaTrocar").val();
	if(txtSenhaNovaTrocar=="")
	{
		$("#txtSenhaNovaTrocar").focus();
		$("#SPTrocarSenha").html("<div class='alert alert-danger alert-dismissable'>Por favor, informe a nova senha.</div>");
		setTimeout("$('#SPTrocarSenha').html('');",1500);
		return false;
	}

	$("#SPTrocarSenha").html("<div class='alert alert-warning'>Trocando, aguarde..</div>");
    $.ajax({
        type: "POST",
        url: "ajax_cadastro.asp",
        data: {Combo: "trocarSenha", txtLoginTrocar: txtLoginTrocar, txtSenhaAntigaTrocar: txtSenhaAntigaTrocar, txtSenhaNovaTrocar: txtSenhaNovaTrocar}
    })
    .done(function(msg) {
        $("#SPTrocarSenha").html(msg);
        setTimeout("$('#SPTrocarSenha').html('');",2500);
        if(msg.search("antiga")>0)
        {
        	$("#txtSenhaAntigaTrocar").val(''); $("#txtSenhaAntigaTrocar").focus();
        }
        if(msg.search("sucesso")>0)
        {
        	$("#txtLoginTrocar").val('');
        	$("#txtSenhaAntigaTrocar").val('');
        	$("#txtSenhaNovaTrocar").val('');        	
        }
    });
}

function recuperarSenha()
{
	var txtLoginRecuperar = $("#txtLoginRecuperar").val();
	if(txtLoginRecuperar=="")
	{
		$("#txtLoginRecuperar").focus();
		$("#SPRecuperarSenha").html("<div class='alert alert-danger alert-dismissable'>Por favor, informe o login.</div>");
		setTimeout("$('#SPRecuperarSenha').html('');",1500);
		return false;
	}

	var txtEmailRecuperar = $("#txtEmailRecuperar").val();
	if(txtEmailRecuperar=="")
	{
		$("#txtEmailRecuperar").focus();
		$("#SPRecuperarSenha").html("<div class='alert alert-danger alert-dismissable'>Por favor, informe seu e-mail.</div>");
		setTimeout("$('#SPRecuperarSenha').html('');",1500);
		return false;
	}

	$("#SPRecuperarSenha").html("<div class='alert alert-warning'>Recuperando, aguarde..</div>");
    $.ajax({
        type: "POST",
        url: "ajax_cadastro.asp",
        data: {Combo: "recuperarSenha", txtLoginRecuperar: txtLoginRecuperar, txtEmailRecuperar: txtEmailRecuperar}
    })
    .done(function(msg) {
        $("#SPRecuperarSenha").html(msg);
        if(msg.search("sucesso")>0)
        {
        	$("#txtLoginRecuperar").val('');
        	$("#txtEmailRecuperar").val('');
        } else {
			setTimeout("$('#SPRecuperarSenha').html('');",2500);
        }
    });
}