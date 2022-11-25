const receitaLista = document.getElementsByClassName('btnAbrirReceita');
// const detalhesReceita = document.getElementById('detalhesReceita');





const btnCloseList = document.getElementsByClassName("btnClose");

const btnModall = document.getElementById("btnModal");
const modall = document.getElementById("modal");
let modalTogle = false;
btnModall.addEventListener('click', abrirModal);


for (let item = 0; item < receitaLista.length; item++) {
    const element = receitaLista[item];
    element.addEventListener('click', obterDetalhesReceita);
}

for (let item = 0; item < btnCloseList.length; item++) {
    const element = btnCloseList[item];
    element.addEventListener('click', fecharReceita);
}


function obterDetalhesReceita (elementClicked) {
    let idElementClicked = `detalhesReceita${elementClicked.target.id}`;
    const detalhesReceita = document.getElementById(idElementClicked);
    detalhesReceita.style.cssText = 'display: flex';
}


function fecharReceita (elemento) {
    let idElementClickedClose = `detalhesReceita${elemento.target.id}`;
    const detalhesReceita2 = document.getElementById(idElementClickedClose);
    detalhesReceita2.style.cssText = 'display: none';
}








function abrirModal () {
    
    if (modalTogle === false) {
        modall.style.cssText = 'visibility: visible'
        modalTogle = true;
    } else if (modalTogle === true) {
        modall.style.cssText = 'visibility: hidden';
        modalTogle = false;
    }
}