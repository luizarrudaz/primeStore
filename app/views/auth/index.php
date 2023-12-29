
<link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/auth.css">

<div class="form-box">

    <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Login</button>
        <button type="button" class="toggle-btn" onclick="cadastrar()">Cadastro</button>
    </div>

    <?php include "components/formLogin.php"; ?>
    <?php include "components/formRegister.php"; ?>

</div>

<script src="/primeStore/app/javascript/auth.js"></script>