<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/descricao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php 
        echo " " . $id;
        $sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `categoria`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `idProduto` = " . $id;
        $con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
        $rs = mysqli_query($con, $sql);
        $value = mysqli_fetch_assoc($rs);
    ?>
    <h1 id="name-product"><?= $value["nome"] ?></h1>
    <div class="product-container">
        <div id="div-1">
            <img class="image" src="/primeStore/app/assets/img/<?= $value["categoria"] ?>/<?= $value["imagem"] ?>">
            <h1 id="value">R$ <?= $value['precoUnitario'] ?></h1>
        </div>

        <div id="div-2">
            <div id="div-paragrafo">
                <p id="paragraph"><?= $value["descricao"] ?></p>
            </div>    
            <div id="div-3">
                <div id="div-3-1">
                    <button type="submit" id="add-to-cart" onclick="finalizar()">COMPRAR<i class="fa fa-shopping-cart" a href="/primeStore/produtos"></i></button>
                </div>
            </div>    

        </div>
        
    </div>
    <script src="/primeStore/app/javascript/descricao.js" defer></script>
</body>
</html>
<script>
    function finalizar() {
        <?php
        if(isset($_SESSION['idCliente']) && $_SESSION['idCliente'] !== 0 && isset($_SESSION['nome'])) {
            echo 'alert("Obrigado por comprar conosco!");';
            echo 'window.location.href = "/primeStore/produtos";';
        } else {
            echo 'alert("Você precisa estar logado para comprar!");';
            echo 'window.location.href = "/primeStore/auth";';
        }
        ?>
    }
</script>
