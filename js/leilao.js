function addCharLeilao() {
    let inserindoABoxDoChar = document.getElementById('IGNORAR')

    let imagensClasses = ['IGNORAR',
    '<img src="images/Classes/fighter.png" alt="Lutador">',
    '<img src="images/Classes/Mech.png" alt="Mecânico">',
    '<img src="images/Classes/Archer.png" alt="Arqueira">',
    '<img src="images/Classes/Pike.png" alt="Pikeman">',
    '<img src="images/Classes/Knight.png" alt="Cavaleiro">',
    '<img src="images/Classes/Ata.png" alt="Atalanta">',
    '<img src="images/Classes/Mage.png" alt="Mage">',
    '<img src="images/Classes/Priest-2.png" alt="Sacerdotisa">',
    '<img src="images/Classes/Priest.png" alt="Sacerdotisa">'
];

    let linksWhatsApp = ['IGNORAR',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+no+Lutador+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+no+Mecânico+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+na+Arqueira+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+no+Pikeman+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+no+Cavaleiro+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+na+Atalanta+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+no+Mago+do+leilão%21&app_absent=0" target="_blank"><button>Comprar</button></a>',

        '<a href="https://api.whatsapp.com/send/?phone=555493313951&text=Ol%C3%A1%2C+eu+vim+pelo+site+e+estou+interessado+na+Sacerdotisa+do+leilão%21&app_absent=0"target="_blank"><button>Comprar</button></a>'
    ];

    let adicionandoLutador = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[1]}
    </div>
    <div class="content-infos">
    <h3>Lutador</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[1]}
    </div>
    </div>`

    let adicionandoMecanico = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[2]}
    </div>
    <div class="content-infos">
    <h3>Mecânico</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[2]}
    </div>
    </div>`

    let adicionandoArqueira = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[3]}
    </div>
    <div class="content-infos">
    <h3>Arqueira</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[3]}
    </div>
    </div>`

    let adicionandoPikeman = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[4]}
    </div>
    <div class="content-infos">
    <h3>Pikeman</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[4]}
    </div>
    </div>`

    let adicionandoCavaleiro = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[5]}
    </div>
    <div class="content-infos">
    <h3>Cavaleiro</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[5]}
    </div>
    </div>`

    let adicionandoAtalanta = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[6]}
    </div>
    <div class="content-infos">
    <h3>Atalanta</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[6]}
    </div>
    </div>`

    let adicionandoMago = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[7]}
    </div>
    <div class="content-infos">
    <h3>Mago</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[7]}
    </div>
    </div>`

    let adicionandoPriest = `<div class="box-char">
    <div class="area-preta">
    ${imagensClasses[8]}
    </div>
    <div class="content-infos">
    <h3>Sacerdotisa</h3>
    <p>Nome: <span>NOME</span></p>
    <p>Nível: <span>NÍVEL</span></p>
    <p>Armas 1 Mão: <span>ARMA</span></p>
    <p>Armas 2 Mãos: <span>ARMA</span></p>
    <p>Escudo: <span>ESCUDO</span></p>
    <p>Armadura: <span>ARMADURA</span></p>
    <p>Bota: <span>BOTA</span></p>
    <p>Luva: <span>LUVA</span></p>
    <p>Bracelete: <span>BRACELETE</span></p>
    <p>Set: <span>Eliot</span></p>
    <p>Brincos: <span>Gladiator</span></p>
    <p class="last"><span>Valor: R$ 00,00</span></p>
    ${linksWhatsApp[8]}
    </div>
    </div>`

    inserindoABoxDoChar.innerHTML = `
    ${adicionandoPriest}`
}