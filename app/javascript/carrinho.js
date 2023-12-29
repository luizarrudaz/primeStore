const quantityInputs = document.querySelectorAll('.quant');
const itemTotalElements = document.querySelectorAll('.item-total');
const valueElements = document.querySelectorAll('.value');
const cartTotalElement = document.getElementById('cart-total');

function calculateItemTotal(index) {
    const quantity = parseInt(quantityInputs[index].value);
    const price = parseFloat(valueElements[index].innerText.replace('R$', '').trim());
    const total = (quantity * price).toFixed(2);
    itemTotalElements[index].textContent = total;
    return parseFloat(total);
}

function updateCartTotal() {
    let total = 0;
    itemTotalElements.forEach((element, index) => {
        total += parseFloat(itemTotalElements[index].textContent.replace('R$', '').trim());
    });
    cartTotalElement.textContent = total.toFixed(2);
}

quantityInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        let quantity = parseInt(input.value);
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            input.value = quantity;
        }
        calculateItemTotal(index);
        updateCartTotal();
    });
});

updateCartTotal();

function clearCartTable() {
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';
    updateCartTotal();
}

const checkoutButton = document.querySelector('.checkout-button');
checkoutButton.addEventListener('click', () => {
    alert('Compra concluída! Obrigado por comprar conosco.');
    clearCartTable();
});


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