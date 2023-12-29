<link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/home.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<div class="slider">
  <div class="slides">
    <input type="radio" name="radio-btn" id="radio1">
    <input type="radio" name="radio-btn" id="radio2">
    <input type="radio" name="radio-btn" id="radio3">

    <div class="slide first">
    <img src="/primeStore/app/assets/img/1.png" alt="imagem 4">
    </div>
    <div class="slide">
      <img src="/primeStore/app/assets/img/2.png" alt="imagem 2">
    </div>
    <div class="slide">
      <img src="/primeStore/app/assets/img/3.png" alt="imagem 4">
    </div>
   
    <div class="navigator-auto">
      <div class="auto-btn1"></div>
      <div class="auto-btn2"></div>
      <div class="auto-btn3"></div>
    </div>

    <div class="manual-navigation">
      <label for="radio1" class="manual-btn"></label>
      <label for="radio2" class="manual-btn"></label>
      <label for="radio3" class="manual-btn"></label>
    </div>
  </div>

  <div class="navigator-auto">
    <div class="auto-btn1"></div>
    <div class="auto-btn2"></div>
    <div class="auto-btn3"></div>
  </div>

  <div class="manual-navigation">
    <label for="radio1" class="manual-btn"></label>
    <label for="radio2" class="manual-btn"></label>
    <label for="radio3" class="manual-btn"></label>
  </div>
</div>
<?php
$sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Moda Feminina' ORDER BY `nome`";
$con = mysqli_connect("localhost", "site_admin", "1234", "primeStore");
$rs = mysqli_query($con, $sql);

echo '<div class="bloco">


    <div class="cards-wrapper"> 
    <div class="arrows" style="position: absolute;
        display: flex !important;
        flex-direction: row;
        justify-content: space-between;
        align-items:center;
        width: 1130px;
        margin-top:300px;
        z-index:200;
      ">
      <div class="swiper-button-prev" id="modafeminina-prev"><img src="/primeStore/app/assets/img/left.png"></div>
      <div class="swiper-button-next" id="modafeminina-next"><img src="/primeStore/app/assets/img/right.png"></div>
    </div>
    <div class="carousel-title">Moda Feminina</div>
    <div class="product-carousel" id="carousel-modafeminina">';

// Loop para exibir produtos
while ($row = mysqli_fetch_assoc($rs)) {
  echo '<div class="product-card">
<img src="/primeStore/app/assets/img/Moda Feminina/' . $row["imagem"] . '">
            <div class="product-title">' . $row["nome"] . '</div>
            <div class="product-price"> R$ ' . $row["precoUnitario"] . '</div>
            <button class="btn-buy"> <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">Comprar</a></button>
          </div>';
}
echo '</div><a href="/primeStore/produtos#ModaFeminina"><h3 id="ver">Ver Mais</h3></a></div></div>';

$sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Moda Masculina' ORDER BY `nome`";
$con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
$rs = mysqli_query($con, $sql);

echo '<div class="bloco">
    <div class="cards-wrapper">
    <div class="arrows" style="position: absolute;
    display: flex !important;
    flex-direction: row;
    justify-content: space-between;
    align-items:center;
    width: 1130px;
    margin-top:300px;
    z-index:200;
  ">
  <div class="swiper-button-prev" id="modamasculina-prev"><img src="/primeStore/app/assets/img/left.png"></div>
  <div class="swiper-button-next" id="modamasculina-next"><img src="/primeStore/app/assets/img/right.png"></div>
</div>
    <div class="carousel-title">Moda Masculina</div>
    <div class="product-carousel" id="carousel-modamasculina">';

// Loop para exibir produtos
while ($row = mysqli_fetch_assoc($rs)) {
  echo '<div class="product-card">
            <img src="/primeStore/app/assets/img/Moda Masculina/' . $row["imagem"] . '">
            <div class="product-title">' . $row["nome"] . '</div>
            <div class="product-price"> R$ ' . $row["precoUnitario"] . '</div>
            <button class="btn-buy"> <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">Comprar</a></button>
          </div>';
}
    echo '</div><a href="/primeStore/produtos#ModaMasculina"><h3 id="ver">Ver Mais</h3></a></div></div>';

$sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Higiene' ORDER BY `nome`";
$con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
$rs = mysqli_query($con, $sql);

echo '<div class="bloco">
    <div class="cards-wrapper">
    <div class="arrows" style="position: absolute;
    display: flex !important;
    flex-direction: row;
    justify-content: space-between;
    align-items:center;
    width: 1130px;
    margin-top:300px;
    z-index:200;
  ">
  <div class="swiper-button-prev" id="higiene-prev"><img src="/primeStore/app/assets/img/left.png"></div>
  <div class="swiper-button-next" id="higiene-next"><img src="/primeStore/app/assets/img/right.png"></div>
</div>
    <div class="carousel-title">Higiene</div>
    <div class="product-carousel" id="carousel-higiene">';
    
    // Loop para exibir produtos
    while ($row = mysqli_fetch_assoc($rs)) {
      echo '<div class="product-card">
      <img src="/primeStore/app/assets/img/Higiene/' . $row["imagem"] . '">
      <div class="product-title">' . $row["nome"] . '</div>
      <div class="product-price"> R$ ' . $row["precoUnitario"] . '</div>
      <button class="btn-buy"><a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">Comprar</a></button>
      </div>';
    }
    echo '</div><a href="/primeStore/produtos#Higiene"><h3 id="ver">Ver Mais</h3></a></div></div>';


$sql = "SELECT `idProduto`, `nome`, `codigoBarras`, `descricao`, `precoUnitario`, `imagem` FROM `tblproduto` WHERE `categoria` = 'Eletronicos' ORDER BY `nome`";
$con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
$rs = mysqli_query($con, $sql);

echo '<div class="bloco">
    <div class="cards-wrapper">
    <div class="arrows" style="position: absolute;
        display: flex !important;
        flex-direction: row;
        justify-content: space-between;
        align-items:center;
        width: 1130px;
        margin-top:300px;
        z-index:200;
      ">
      <div class="swiper-button-prev" id="eletronicos-prev"><img src="/primeStore/app/assets/img/left.png"></div>
      <div class="swiper-button-next" id="eletronicos-next"><img src="/primeStore/app/assets/img/right.png"></div>
    </div>

      <div class="carousel-title">Eletrônicos</div>
      <div class="product-carousel" id="carousel-eletronicos">';

// Loop para exibir produtos
while ($row = mysqli_fetch_assoc($rs)) {
  echo '<div class="product-card">
            <img src="/primeStore/app/assets/img/Eletronicos/' . $row["imagem"] . '">
            <div class="product-title">' . $row["nome"] . '</div>
            <div class="product-price"> R$ ' . $row["precoUnitario"] . '</div>
            <button class="btn-buy"> <a href="/primeStore/descricaoProdutos/'.$row["idProduto"].'">Comprar</a></button>
          </div>';
}
echo '</div><a href="/primeStore/produtos#Eletronicos"><h3 id="ver">Ver Mais</h3></a></div></div>';
?>

<?php include "./app/views/layouts/footer.php";?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="/primeStore/app/javascript/home.js"></script>

</body>
</html>