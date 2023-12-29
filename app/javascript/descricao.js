document.addEventListener("DOMContentLoaded", function () {
    const addToCartButton = document.getElementById("Adicionar");
    const cartItemsList = document.getElementById("cartItems");

    addToCartButton.addEventListener("click", function () {
        const productName = "Nome do Produto";
        const newItem = document.createElement("li");
        newItem.textContent = productName;
        cartItemsList.appendChild(newItem);
    });
});


// Quantidade
var quantidadeElement = document.getElementById("quant");
var novaQuantidade = 1;
var valorElement = document.getElementById("value");
var valorInicial = parseFloat(valorElement.innerHTML.replace('R$ ', ''));

function subQuant() {
    if (novaQuantidade > 1) {
        novaQuantidade -= 1;
        quantidadeElement.innerHTML = novaQuantidade;
        attValue();
    }
}

function plusQuant() {
    novaQuantidade += 1;
    quantidadeElement.innerHTML = novaQuantidade;
    attValue();
}

function attValue() {
    novoValor = valorInicial * novaQuantidade;
    valorElement.innerHTML = 'R$ ' + novoValor.toFixed();
}
