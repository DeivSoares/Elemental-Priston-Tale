function openMenu() {
    let ativa = document.getElementById("menu-mobile");
    ativa.classList.remove('desativado');
}

function closeMenu() {
    let ativa = document.getElementById("menu-mobile");
    ativa.classList.add('desativado');
}