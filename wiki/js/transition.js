function active(){
    let act = document.querySelector('aside')
    act.classList.add('animar')
}

ativar.addEventListener('click', () => {
    aside.classList.toggle('animar')
})