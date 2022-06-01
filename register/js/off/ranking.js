function carregaRankings()
{
    rankingPlayer(3,'SPRankingPlayer');
    rankingPlayerBP(3, 'SPRankingPlayerBP');
    rankingPlayerSOD(3, 'SPRankingPlayerSOD');
    rankingClanSOD(3, 'SPRankingClanSOD', 0);
    rankingTopViciados(3,'SPRankingTopViciados');
    rankingClanSODBless();
}

function rankingPlayer(top, span)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingPlayer", top: top }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
} 

function rankingPlayerBP(top, span)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingPlayerBP", top: top }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
} 

function rankingPlayerSOD(top, span)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingPlayerSOD", top: top }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
} 

function rankingClanSOD(top, span, tipo)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingClanSOD", top: top, tipo: tipo }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
}

function rankingTopViciados(top, span)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingTopViciados", top: top }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
} 

function rankingClanSODBless()
{
    $("#SPRankingClanSODBless").html('Carregando...');
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingClanSODBless" }
    })
    .done(function(msg) {
        $("#SPRankingClanSODBless").html(msg);
    });
}

function rankingLogadoPremiado(top, span)
{
    $("#"+span).html("Carregando...");
    $.ajax({
        type: "POST",
        url: "ajax_ranking.asp",
        data: {Combo: "rankingLogadoPremiado", top: top }
    })
    .done(function(msg) {
        $("#"+span).html(msg);
    });
} 