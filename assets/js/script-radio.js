const container = document.getElementById('container');
const botaoProximo = document.getElementById('button');
const mainContainer = document.getElementById('main-container');

botaoProximo.addEventListener('click', adicionarClasse);

function null_or_empty(string) {
    var v = document.getElementById(string).value;
    return v == null || v == "";
}

function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    let valido;
    if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    valido = true;
    return valido;
    } else{
        valido = false;
        return valido
    }
}

function adicionarClasse() {
    var nome = null_or_empty('nome');
    var email = null_or_empty('email');
    var senha = null_or_empty('senha');
    var verificaEmail = validacaoEmail(document.getElementById('email'));

    if (!nome && !email && !senha && verificaEmail) {
        container.style.cssText = 'display: none';
        mainContainer.style.cssText = 'display: flex';
    } else {
        alert('Alguma(s) informação(s) não foi preenchida(s) ou Email Inválido');
    }
}