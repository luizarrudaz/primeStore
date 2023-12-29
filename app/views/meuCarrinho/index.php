<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<?php
session_start();

if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = array();
}

$product = array(
    'id' => @$_POST["id"],
    'nome' => @$_POST["nome"],
    'precoUnitario' => @$_POST["precoUnitario"],
    'quant' => @$_POST["quant"],
    'imagem' => @$_POST["imagem"],
    'categoria' => @$_POST["categoria"]
);

@$_SESSION['produtos'][$_POST["id"]] = $product;

//var_dump($_SESSION['produtos'])
?>
<script>
    $.ajax({
    method: "GET",
    url: "/primeStore/app/controllers/meuCarrinho/index.php",
    data: { id: x },
})
.done(function( msg ) {
    let data = JSON.parse(msg);
    data.filter(item=> item.id===null )
    console.log(data);
    data.map((item)=>{$("#tbody").append(`<tr id="${item.id}">
    <td><img src="/primeStore/app/assets/img/${item.categoria}/${item.imagem}"></td>
    <td>${item.nome}</td>
    <td class="value">${item.precoUnitario}</td>
    <td>
        <div class="qty">
            <span id="quant">${item.quant}</span>
        </div>
    </td>
    <td>R$<span class="item-total">${item.precoUnitario} * ${item.quant} ?></span></td>
    <td>
        <a class="remove-button" onclick="deletar(${item.id})">Remover</a>
    </td>
    </tr>`)});
    // alert( "Produto deletado com sucesso");
    });
function deletar(x) {
    $(`#${x}`).remove();
};
</script>

<link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/meuCarrinho.css">
<div class="form-box">
    <div class="content_wrapper">
        <div class="header-block_wrapper">
            <div class="text">
                <div class="cart">
                    <h1 id="title">Carrinho de Compras</h1>
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Imagem do Produto</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php foreach ($_SESSION['produtos'] as $indice => $produto) : ?>
                                <?php if($_SESSION['produtos'][$_POST["id"]]) :?>
                                <tr id="<?= $produto["id"] ?>">
                                    <td><img src="/primeStore/app/assets/img/<?= $produto['categoria'] ?>/<?= $produto['imagem'] ?>"></td>
                                    <td><?= $produto['nome'] ?></td>
                                    <td class="value"><?= $produto['precoUnitario'] ?></td>
                                    <td>
                                        <div class="qty">
                                            <span id="quant"><?= $produto['quant'] ?></span>
                                        </div>
                                    </td>
                                    <td>R$<span class="item-total"><?= $produto['precoUnitario'] * $produto['quant'] ?></span></td>
                                    <td>
                                        <a class="remove-button" onclick="deletar(<?= $produto['id'] ?>)">Remover</a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <div class="cart-total">
                    <p>Total: R$<span id="cart-total"></span></p>
                </div>
                    <button class="checkout-button">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="/primeStore/app/javascript/carrinho.js" defer>

</script>
