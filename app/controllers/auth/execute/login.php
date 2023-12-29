<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";

// VARIÁVEIS PHP
$email = $_POST['email'];
$senha = $_POST['senha'];

// Scripts SQL para inserção/atualização no banco de dados.
$con = mysqli_connect("localhost", "site_admin", "1234", "primestore");
$sql = "SELECT `idCliente`, `nome` FROM `tblcliente` WHERE `email` = '" . $email . "' AND `senha` = '" . $senha . "'";
$rs = mysqli_query($con, $sql);
$num = mysqli_num_rows($rs);
var_dump($rs);

// Redirecionando após o login
if ($num > 0) {
    while ($valor = mysqli_fetch_assoc($rs)) {
        var_dump($valor);
        $idCliente = $valor['idCliente'];
        $nome = $valor['nome'];
    }
    session_start();
    $_SESSION['nome'] = $nome;
    $_SESSION['logado'] = 1;
    $_SESSION['idCliente'] = $idCliente;
    $_SESSION['email'] = $email;
    echo "<h1>Acesso concedido, redirecionando para a Home</h1>";
    header("Location: /primeStore/home");
} else {
    header("Location: /primeStore/auth");
}
?>
