let janelaWelcome = document.getElementById('janelaWelcome')
let janelaMix = document.getElementById('janelaMix')
let janelaAge = document.getElementById('janelaAge')
let janelaShop = document.getElementById('janelaShop')
let janelaEquipments = document.getElementById('janelaEquipments')

let botasTable = document.getElementById('Botas')
let braceletesTable = document.getElementById('Braceletes')
let luvasTable = document.getElementById('Luvas')

let coinshop = document.getElementById('coinshop')
let timeshop = document.getElementById('timeshop')

let arcosS = document.getElementById('ArcosSelecionado')
let cajadoeVarinhaS = document.getElementById('CajadoeVarinhaSelecionado')
let espadasS = document.getElementById('EspadasSelecionado')
let foicesS = document.getElementById('FoicesSelecionado')
let garrasS = document.getElementById('GarrasSelecionado')
let lancasS = document.getElementById('LancasSelecionado')
let machadosS = document.getElementById('MachadosSelecionado')
let martelosS = document.getElementById('MartelosSelecionado')


function Estrutura() {
   janelaWelcome.style.display = 'flex'
   janelaMix.style.display = 'none'
   janelaAge.style.display = 'none'
   janelaShop.style.display = 'none'
   janelaEquipments.style.display = 'none'
}

function MixList() {
   janelaWelcome.style.display = 'none'
   janelaMix.style.display = 'flex'
   janelaAge.style.display = 'none'
   janelaShop.style.display = 'none'
   janelaEquipments.style.display = 'none'


   botasTable.style.display = 'none'
   braceletesTable.style.display = 'none'
   luvasTable.style.display = 'none'
}

function mostrarMixBotas() {
   botasTable.style.display = 'block'
   braceletesTable.style.display = 'none'
   luvasTable.style.display = 'none'
}

function mostrarMixBraceletes() {
   botasTable.style.display = 'none'
   braceletesTable.style.display = 'block'
   luvasTable.style.display = 'none'
}

function mostrarMixLuvas() {
   botasTable.style.display = 'none'
   braceletesTable.style.display = 'none'
   luvasTable.style.display = 'block'
}

function AgingList() {
   janelaWelcome.style.display = 'none'
   janelaMix.style.display = 'none'
   janelaAge.style.display = 'flex'
   janelaShop.style.display = 'none'
   janelaEquipments.style.display = 'none'
}

function ShopList() {
   janelaWelcome.style.display = 'none'
   janelaMix.style.display = 'none'
   janelaAge.style.display = 'none'
   janelaShop.style.display = 'flex'
   coinshop.style.display = 'flex'
   timeshop.style.display = 'none'
   janelaEquipments.style.display = 'none'
}

function CoinShop() {
   coinshop.style.display = 'flex'
   timeshop.style.display = 'none'
}

function TimeShop() {
   coinshop.style.display = 'none'
   timeshop.style.display = 'flex'
}

function Equipments() {
   janelaWelcome.style.display = 'none'
   janelaMix.style.display = 'none'
   janelaAge.style.display = 'none'
   janelaShop.style.display = 'none'
   coinshop.style.display = 'none'
   timeshop.style.display = 'none'
   janelaEquipments.style.display = 'flex'
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Arcos() {
   arcosS.style.display = 'flex'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function CajadoeVarinha() {
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'flex'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Espadas() {
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'flex'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Foices() {
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'flex'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Garras() {
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'flex'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Lancas() {
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'flex'
   machadosS.style.display = 'none'
   martelosS.style.display = 'none'
}

function Machados(){
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'flex'
   martelosS.style.display = 'none'
}

function Martelos(){
   arcosS.style.display = 'none'
   cajadoeVarinhaS.style.display = 'none'
   espadasS.style.display = 'none'
   foicesS.style.display = 'none'
   garrasS.style.display = 'none'
   lancasS.style.display = 'none'
   machadosS.style.display = 'none'
   martelosS.style.display = 'flex'
}

// function MapList() {
//     let welcomehiden = document.getElementById('Welcome')
//     welcomehiden.style.display = 'none'
// }

// function ExperienceTable() {
//     let welcomehiden = document.getElementById('Welcome')
//     welcomehiden.style.display = 'none'
// }