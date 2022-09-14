const receitaLista = document.getElementById('receitas');
const detalhesReceita = document.getElementById('detalhesReceita');

receitaLista.addEventListener('click', obterDetalhesReceita)


function obterDetalhesReceita () {
    detalhesReceita.style.cssText = 'display: flex';
}