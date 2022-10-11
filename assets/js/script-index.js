const receitaLista = document.getElementsByClassName('btnAbrirReceita');
const detalhesReceita = document.getElementById('detalhesReceita');
const btnClose = document.getElementById("btnClose");

const btnModall = document.getElementById("btnModal");
const modall = document.getElementById("modal")

let modalTogle = false;


btnClose.addEventListener('click', fecharReceita);
btnModall.addEventListener('click', abrirModal)

// receitaLista.forEach(function (e) {
//     e.addEventListener('click', obterDetalhesReceita)
// });

for (let item = 0; item < receitaLista.length; item++) {
    const element = receitaLista[item];
    element.addEventListener('click', obterDetalhesReceita);
    
}


function obterDetalhesReceita () {
    detalhesReceita.style.cssText = 'display: flex';
}


function fecharReceita () {
    detalhesReceita.style.cssText = 'display: none';
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