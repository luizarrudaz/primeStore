<link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/produtos.css">

<section class="catalog" id="catalog">
    <div class="content">
        <?php
            $sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Moda Feminina' ORDER BY `nome`";
            $con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
            $rs = mysqli_query($con, $sql);

            echo '<div class="content_wrapper">
                    <div class="header-block_wrapper" id="ModaFeminina">
                        <div class="text">
                            <h2>Moda Feminina</h2>
                            <div class="card-wrapper">';

            while ($row = mysqli_fetch_assoc($rs)) {
                echo '<div class="card-item">
                <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'"><img src="/primeStore/app/assets/img/Moda Feminina/'.$row["imagem"].'"></a>
                        <div class="card-content">
                            <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">
                                <h3>'.$row["nome"].'</h3>
                                <p class="p">R$ '.$row["precoUnitario"].'</p>
                            </a>
                        </div>
                    </div>';
            }
            echo '</div></div></div>';

            $sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Moda Masculina' ORDER BY `nome`";
            $con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
            $rs = mysqli_query($con, $sql);

            echo '<div class="content_wrapper">
                    <div class="header-block_wrapper" id="ModaMasculina">
                        <div class="text">
                            <h2>Moda Masculina</h2>
                            <div class="card-wrapper">'; // Abrimos el contenedor div antes del bucle

            while ($row = mysqli_fetch_assoc($rs)) {
                echo '<div class="card-item">
                <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'"><img src="/primeStore/app/assets/img/Moda Masculina/'.$row["imagem"].'"></a>
                        <div class="card-content">
                            <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">
                                <h3>'.$row["nome"].'</h3>
                                <p class="p">R$ '.$row["precoUnitario"].'</p>
                            </a>
                        </div>
                    </div>';
            }
            echo '</div></div></div>';

            $sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Higiene' ORDER BY `nome`";
            $con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
            $rs = mysqli_query($con, $sql);

            echo '<div class="content_wrapper">
                    <div class="header-block_wrapper" id="Higiene">
                        <div class="text">
                            <h2>Itens de Higiene</h2>
                            <div class="card-wrapper">'; // Abrimos el contenedor div antes del bucle

            while ($row = mysqli_fetch_assoc($rs)) {
                echo '<div class="card-item">
                <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'"><img src="/primeStore/app/assets/img/Higiene/'.$row["imagem"].'"></a>
                        <div class="card-content">
                            <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">
                                <h3>'.$row["nome"].'</h3>
                                <p class="p">R$ '.$row["precoUnitario"].'</p>
                            </a>
                        </div>
                    </div>';
            }
            echo '</div></div></div>';

            $sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Eletronicos' ORDER BY `nome`";
            $con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
            $rs = mysqli_query($con, $sql);

            echo '<div class="content_wrapper">
                    <div class="header-block_wrapper" id="Eletronicos">
                        <div class="text">
                            <h2>Eletronicos</h2>
                            <div class="card-wrapper">'; // Abrimos el contenedor div antes del bucle

            while ($row = mysqli_fetch_assoc($rs)) {
                echo '<div class="card-item">
                        <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'"><img src="/primeStore/app/assets/img/Eletronicos/'.$row["imagem"].'"></a>
                        <div class="card-content">
                            <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">
                                <h3>'.$row["nome"].'</h3>
                                <p class="p">R$ '.$row["precoUnitario"].'</p>
                            </a>
                        </div>
                    </div>';
            }
            echo '</div></div></div>';
        ?>
    </div>
</section>

<?php include "./app/views/layouts/footer.php";?>
