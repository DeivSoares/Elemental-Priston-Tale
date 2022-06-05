function openMenu() {
    let ativa = document.getElementById("menu-mobile");
    ativa.classList.remove('desativado');
    console.log("Abriu o menu")
}

function closeMenu() {
    let desativa = document.getElementById("menu-mobile");
    desativa.classList.add('desativado');
    console.log("Fechou o menu")
}