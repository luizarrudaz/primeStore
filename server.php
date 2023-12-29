<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/global.css">
    <title>Prime Store</title>
    <link rel="icon"  href="/primeStore/app/assets/img/logo-prime.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head> 
<body>

    <?php include "./app/views/layouts/header.php"; ?>

    <div class="container">
        <?php
            include_once './app/controllers/router/index.php';
            
            $router = new RouterController();
            $router->route();
        ?>
    </div> 

    <!-- fazer um if para o footer não aparecer na página de:
            - login/cadastro -
            - descrição produto -
            - perfil -
            - meu carrinho (logar e o normal) -->

</body>
</html>