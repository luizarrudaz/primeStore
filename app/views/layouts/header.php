<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/header.css">
<style>
    
</style>
<header>
   
    <a href="/primeStore/home"><img src="/primeStore/app/assets/img/logo.png" ></a>
    <a href="/primeStore/home"><h1>PrimeStore</h1></a>
    <ul id="box"></ul>
    <nav class="menu">
        <input type="checkbox" class="menu-faketrigger" />
        <div class="menu-lines">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li><a href="/primeStore/home">Início</a></li>
            <li><a href="/primeStore/produtos">Produtos</a></li>
            <!-- <?php
            #var_dump($_SESSION);
            if(isset($_SESSION['idCliente']) && $_SESSION['idCliente'] !== 0 && isset($_SESSION['nome'])){
            ?>
            <a href="/primeStore/meuCarrinho">
                <li>Meu Carrinho</li>
            </a>
            <?php } else { ?>
            <a href="/primeStore/meuCarrinho_Logar">
                <li>Meu Carrinho</li>
            </a>
            <?php } ?> -->
            <li><a href="/primeStore/sobre">Sobre</a></li>
        </ul>
    </nav>

    <!-- <div class="cart">
        <input disabled class="circle-cart" type="#" name="" placeholder="">
        <?php
        #var_dump($_SESSION);
        if(isset($_SESSION['idCliente']) && $_SESSION['idCliente'] !== 0 && isset($_SESSION['nome'])){
        ?>
        <a href="/primeStore/meuCarrinho">
            <button class="cart-btn"><i class="fa fa-shopping-cart"></i></button>
        </a>
        <?php } else { ?>
        <a href="/primeStore/meuCarrinho_Logar">
            <button class="cart-btn"><i class="fa fa-shopping-cart"></i></button>
        </a>
        <?php } ?>
    </div> -->

    <div class="user">
        <input disabled class="circle-user" type="text" name="" placeholder="">
        <?php
        #var_dump($_SESSION);
        if(isset($_SESSION['idCliente']) && $_SESSION['idCliente'] !== 0 && isset($_SESSION['nome'])){
        ?>
        <a href="/primeStore/perfil">
            <button class="user-btn"><i class="fa fa-user"></i></button>
        </a>
        <?php } else { ?>
        <a href="/primeStore/auth">
            <button class="user-btn"><i class="fa fa-user"></i></button>
        </a>
        <?php } ?>
    </div>

</header>