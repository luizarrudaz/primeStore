var x = document.getElementById("logar");
var y = document.getElementById("cadastrar");
var z = document.getElementById("btn");

var formBox = document.querySelector('.form-box');
var larguraTela = window.innerWidth;
const larguraRef = 768;

// Função para ação de cadastrar
function cadastrar() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "98px";

    if (formBox) {
        if (larguraTela >= larguraRef) {
            formBox.style.width = '720px';
            formBox.style.height = '520px';
        } else {
            formBox.style.width = '480px';
            formBox.style.height = '850px';
        }
    }
}

window.addEventListener('resize', function () {
    larguraTela = window.innerWidth;
    cadastrar();
});


// Função para ação de login
function login() {
    x.style.left = "50px";
    y.style.left = "400px";
    z.style.left = "-6px";

    if (formBox) {
        formBox.style.width = '380px';
        formBox.style.height = '355px';
    }
}
