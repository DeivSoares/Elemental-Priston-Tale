function efetuarLogin()
{
    var login = $("#txtLogin").val();
    if(login=="")
    {
        alert("Por favor, informe seu login");
        $("#txtLogin").focus();
        return false;
    }

    var senha = $("#txtSenha").val();
    if(senha=="")
    {
        alert("Por favor, informe a senha");
        $("#txtSenha").focus();
        return false;
    }

    $("#SPResultadoPainel").html("<div class='alert alert-warning alert-dismissable'>Efetuando login, aguarde...</div>");
    $.ajax({
        type: "POST",
        url: "ajax_login.asp",
        data: {Combo: "efetuarLogin", login: login, senha: senha}
    })
    .done(function(msg) {
        if((msg.search("Dados inválidos")>0) || (msg.search("bloqueado")>0) || (msg.search("logado no servidor")>0))
        {
            $("#SPResultadoPainel").html(msg);
            setTimeout("$('#SPResultadoPainel').html('');",2500);
        } else {
            location.href="?sessao="+msg;
        }
    });
}

function desconectar(sessao)
{
    $.ajax({
        type: "POST",
        url: "ajax_login.asp",
        data: {Combo: "desconectar", sessao: sessao}
    })
    .done(function(msg) {
        //console.log(msg);
        location.href="default.asp"
    });
} 
