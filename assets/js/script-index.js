const receitaLista = document.getElementById('receitas');
const detalhesReceita = document.getElementById('detalhesReceita');
const btnClose = document.getElementById("btnClose");


btnClose.addEventListener('click', fecharReceita);


receitaLista.addEventListener('click', obterDetalhesReceita);


function obterDetalhesReceita () {
    detalhesReceita.style.cssText = 'display: flex';
}


function fecharReceita () {
    detalhesReceita.style.cssText = 'display: none';
}