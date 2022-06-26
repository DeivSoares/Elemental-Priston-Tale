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
}
else if (hora == 1 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses01}`
    msg2.innerHTML = `Ás ${hora1}`
}
else if (hora == 2 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses02}`
    msg2.innerHTML = `Ás ${hora2}`
}
else if (hora == 3 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses03}`
    msg2.innerHTML = `Ás ${hora3}`
}
else if (hora == 4 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses04}`
    msg2.innerHTML = `Ás ${hora4}`
}
else if (hora == 5 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses05}`
    msg2.innerHTML = `Ás ${hora5}`
}
else if (hora == 6 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses06}`
    msg2.innerHTML = `Ás ${hora6}`
}
else if (hora == 7 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses07}`
    msg2.innerHTML = `Ás ${hora7}`
}
else if (hora == 8 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses08}`
    msg2.innerHTML = `Ás ${hora8}`
}
else if (hora == 9 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses09}`
    msg2.innerHTML = `Ás ${hora9}`
}
else if (hora == 10 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses10}`
    msg2.innerHTML = `Ás ${hora10}`
}
else if (hora == 11 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses11}`
    msg2.innerHTML = `Ás ${hora11}`
}
else if (hora == 12 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses12}`
    msg2.innerHTML = `Ás ${hora12}`
}
else if (hora == 13 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses13}`
    msg2.innerHTML = `Ás ${hora13}`
}
else if (hora == 14 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses14}`
    msg2.innerHTML = `Ás ${hora14}`
}
else if (hora == 15 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses15}`
    msg2.innerHTML = `Ás ${hora15}`
}
else if (hora == 16 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses16}`
    msg2.innerHTML = `Ás ${hora16}`
}
else if (hora == 17 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses17}`
    msg2.innerHTML = `Ás ${hora17}`
}
else if (hora == 18 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses18}`
    msg2.innerHTML = `Ás ${hora18}`
}
else if (hora == 19 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses19}`
    msg2.innerHTML = `Ás ${hora19}`
}
else if (hora == 20 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses20}`
    msg2.innerHTML = `Ás ${hora20}`
}
else if (hora == 21 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses21}`
    msg2.innerHTML = `Ás ${hora21}`
}
else if (hora == 22 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses22}`
    msg2.innerHTML = `Ás ${hora22}`
}
else if (hora == 23 && min < xxTime) {
    msg.innerHTML = `Os próximos Bosses são <br><br>${bosses23}`
    msg2.innerHTML = `Ás ${hora23}`
} else {
    msg.innerHTML = `Atualiza em ${hora + 1}:00`
}