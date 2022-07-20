// Script Desenvolvida por Deivison Soares
// WhatsApp: (22)9-9253-3137
// Email: deivisonsoares1610@outlook.com
// Copyright (c) 2022 Deivison Soares - Todos os Direitos Reservados

let msg = document.getElementById('boss') // Adição de Texto no HTML pela ID do Elemento
let msg2 = document.getElementById('hour') // Adição de Texto no HTML pela ID do Elemento
let img = document.getElementById('imagem') // Caso queira adicionar imagens
//Pegar Hora e Minuto
let data = new Date()
let hora = data.getHours()
let min = data.getMinutes()
//Definindo xx:yy timeboss
let xxTime = '32'
//Definição Manual das Horas 24x
let hora0 = `0:${xxTime}`;
let hora1 = `1:${xxTime}`;
let hora2 = `2:${xxTime}`;
let hora3 = `3:${xxTime}`;
let hora4 = `4:${xxTime}`;
let hora5 = `5:${xxTime}`;
let hora6 = `6:${xxTime}`;
let hora7 = `7:${xxTime}`;
let hora8 = `8:${xxTime}`;
let hora9 = `9:${xxTime}`;
let hora10 = `10:${xxTime}`;
let hora11 = `11:${xxTime}`;
let hora12 = `12:${xxTime}`;
let hora13 = `13:${xxTime}`;
let hora14 = `14:${xxTime}`;
let hora15 = `15:${xxTime}`;
let hora16 = `16:${xxTime}`;
let hora17 = `17:${xxTime}`;
let hora18 = `18:${xxTime}`;
let hora19 = `19:${xxTime}`;
let hora20 = `20:${xxTime}`;
let hora21 = `21:${xxTime}`;
let hora22 = `22:${xxTime}`;
let hora23 = `23:${xxTime}`;
// Definindo a Ordem de Nascença dos Bosses pelo Horário
let bosses00 = 'Babel I.2<br>Valento<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto';
let bosses01 = 'Fúria<br>Babel I.1<br>Montanha Azul<br>Olho de Fogo';
let bosses02 = 'Golem Antigo<br>DevilShy';
let bosses03 = 'Babel I.2<br>Gorgônia<br>Montanha Azul<br>Robô Mutante';
let bosses04 = 'Babel I.1<br>Kelvezu<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto';
let bosses05 = 'Fúria<br>Montanha Azul<br>Olho de Fogo';
let bosses06 = 'Babel I.2<br>Golem Antigo';
let bosses07 = 'Babel I.1<br>Mokova<br>Montanha Azul';
let bosses08 = 'Gorgônia<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto<br>Robô Mutante';
let bosses09 = 'Fúria<br>Babel I.2<br>Valento<br>Montanha Azul<br>Olho de Fogo';
let bosses10 = 'Babel I.1<br>Golem Antigo<br>DevilShy';
let bosses11 = 'Kelvezu<br>Montanha Azul';
let bosses12 = 'Babel I.2<br>Mokova<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto';
let bosses13 = 'Fúria<br>Babel I.1<br>Gorgônia<br>Montanha Azul<br>Olho de Fogo<br>Robô Mutante';
let bosses14 = 'Kelvezu<br>Golem Antigo';
let bosses15 = 'Babel I.2<br>Kelvezu<br>Montanha Azul';
let bosses16 = 'Babel I.2<br>Gorgônia<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto<br>Robô Mutante';
let bosses17 = 'Fúria<br>Mokova<br>Montanha Azul<br>Olho de Fogo';
let bosses18 = 'Babel I.2<br>Golem Antigo<br>DevilShy';
let bosses19 = 'Babel I.1<br>Gorgônia<br>Montanha Azul<br>Robô Mutante';
let bosses20 = 'Kelvezu<br>Golem Antigo<br>Tartaruga Dragão<br>Cão Esqueleto';
let bosses21 = 'Fúria<br>Babel I.2<br>Valento<br>Montanha Azul<br>Olho de Fogo';
let bosses22 = 'Babel I.1<br>Mokova<br>Golem Antigo';
let bosses23 = 'Gorgônia<br>Montanha Azul<br>Robô Mutante';
//Estrutura para Atualizar de 1 em 1 hora
if (hora == 0 && min < 32) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses00}`
    msg2.innerHTML = `Ás ${hora0}`
} else if (hora == 1 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses01}`
    msg2.innerHTML = `Ás ${hora1}`
} else if (hora == 2 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses02}`
    msg2.innerHTML = `Ás ${hora2}`
} else if (hora == 3 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses03}`
    msg2.innerHTML = `Ás ${hora3}`
} else if (hora == 4 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses04}`
    msg2.innerHTML = `Ás ${hora4}`
} else if (hora == 5 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses05}`
    msg2.innerHTML = `Ás ${hora5}`
} else if (hora == 6 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses06}`
    msg2.innerHTML = `Ás ${hora6}`
} else if (hora == 7 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses07}`
    msg2.innerHTML = `Ás ${hora7}`
} else if (hora == 8 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses08}`
    msg2.innerHTML = `Ás ${hora8}`
} else if (hora == 9 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses09}`
    msg2.innerHTML = `Ás ${hora9}`
} else if (hora == 10 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses10}`
    msg2.innerHTML = `Ás ${hora10}`
} else if (hora == 11 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses11}`
    msg2.innerHTML = `Ás ${hora11}`
} else if (hora == 12 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses12}`
    msg2.innerHTML = `Ás ${hora12}`
} else if (hora == 13 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses13}`
    msg2.innerHTML = `Ás ${hora13}`
} else if (hora == 14 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses14}`
    msg2.innerHTML = `Ás ${hora14}`
} else if (hora == 15 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses15}`
    msg2.innerHTML = `Ás ${hora15}`
} else if (hora == 16 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses16}`
    msg2.innerHTML = `Ás ${hora16}`
} else if (hora == 17 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses17}`
    msg2.innerHTML = `Ás ${hora17}`
} else if (hora == 18 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses18}`
    msg2.innerHTML = `Ás ${hora18}`
} else if (hora == 19 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses19}`
    msg2.innerHTML = `Ás ${hora19}`
} else if (hora == 20 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses20}`
    msg2.innerHTML = `Ás ${hora20}`
} else if (hora == 21 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses21}`
    msg2.innerHTML = `Ás ${hora21}`
} else if (hora == 22 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses22}`
    msg2.innerHTML = `Ás ${hora22}`
} else if (hora == 23 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses23}`
    msg2.innerHTML = `Ás ${hora23}`
} else {
    msg.innerHTML = `Atualiza em ${hora + 1}:00`
}

function themeColor() {
    let themebody = document.getElementById('theme')
    let rates = document.getElementById('rates')
    let themeLight = '../images/Backgrounds/images-background.png';
    let themeLightDark = '../images/Backgrounds/bg-archer.jpg';
    let themeDark = '../images/Backgrounds/bg-new.jpeg'
    if (hora >= 0 && hora < 6) {
        //Está de Madrugada
        console.log('Está de Madrugada')
        themebody.style.backgroundImage = `url(${themeDark})`;

    } else if (hora >= 6 && hora < 12) {
        //Bom dia
        console.log('Bom dia')
        themebody.style.backgroundImage = `url(${themeLight})`;
    } else if (hora >= 12 && hora < 18) {
        //Boa Tarde
        console.log('Boa Tarde')
        themebody.style.backgroundImage = `url(${themeLightDark})`;

    } else {
        //Boa Noite
        console.log('Boa Noite')
        themebody.style.backgroundImage = `url(${themeDark})`;
    }
}

function verRanking() {
    let criaRanking = document.getElementById('ranking')
    let padding = document.getElementById('rankings')
    let iframe = '<iframe name="1" border="0" frameborder="0" height="100%" title="-" scrolling="yes" align="top" src="http://site.elementalpristontale.com:31206/include/toplevel.php" width="100%"></iframe>';
    let titulo = '<div class="titulo"><h2>Top 10 Melhores Jogadores</h2></div>'


    criaRanking.innerHTML = `${titulo}<div id="criaIframe">${iframe}</div>`
    criaRanking.style.height = '100vh'
    criaRanking.style.borderRadius = '1rem'
    let div = document.getElementById('criaIframe')
    div.style.height = '95%'
}

function showBossTime() {
    let active = document.getElementById('bossT')
    active.classList.add('active')
}

function closeBossTime() {
    let active = document.getElementById('bossT')
    active.classList.remove('active')
}

function changeImage() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div><img src="images/Services/Equipe.jpeg" alt="Equipe"></div>'

    console.log("Imagem Padrão")
}

function changeEmail() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div><img src="images/Services/Trocaemail.jpeg" alt="Troca de Email"></div>'

    console.log("Trocou a Imagem")
    console.log("Trocou o Email")
}

function changeNick() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div id="sld"><img class="selected" src="images/Services/Stalker.jpeg" alt="Stalker"><img src="images/Services/Stalker-Xomps.jpeg" alt="Stalker-Xomps"></div>'

    console.log("Trocou a Imagem")
    console.log("Trocou o Nick")
}

function changeClass() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div id="sld"><img class="selected" src="images/Services/Stalker.jpeg" alt="Stalker"><img src="images/Services/Johnnie-Stalker.jpeg" alt="Johnnie-Stalker"></div>'

    console.log("Trocou a Imagem")
    console.log("Trocou a Classe")
}

function changeClassAndEquips() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div><img src="images/Services/trocaclasseequips.jpeg" alt="Troca de Classe + Equipamentos"></div>'

    console.log("Trocou a Imagem")
    console.log("Trocou a Classe e os Equipamentos")
}

function changeIntermedio() {
    var img = document.getElementById('trocaimg')
    img.innerHTML = '<div><img src="images/Services/intermedio.jpeg" alt="Intermédio"></div>'

    console.log("Trocou a Imagem")
    console.log("Fez um intermédio")
}

function leftsidebars() {
    let equipe = document.getElementById('equipe')
    let equipelink = '<p>Equipe</p><iframe style="transform: scaleX(-1);" src="http://site.elementalpristontale.com:31206/include/equipe/index.php" name="I3" width="130" height="68" scrolling="No" frameborder="0" id="I4" border="0"></iframe>'

    equipe.style.width = '10rem'
    equipe.innerHTML = `${equipelink}`
}

function rightsidebars() {
    let discord = document.getElementById('discord')
    let discordlink = '<a href="https://discord.gg/b6PGaSSgdd"><img src="images/discord.gif" alt="Discord"><p>Discord</p></a>'

    discord.style.padding = '0px 20px'
    discord.style.textAlign = 'center'
    discord.innerHTML = `${discordlink}`
}

function xtremetop() {
    let x;
    let xtremetop = confirm('Vote diariamente no Elemental Priston Tale para ajudar o servidor a crescer no ranking mundial!')

    if (xtremetop == true) {
        x = window.location.href = 'https://www.xtremetop100.com/in.php?site=1132372951'
        window.open('_blank')
    }else{
        addCharLeilao()
    }
}