<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();

// Verifique se o usuário está logado (você pode adicionar verificações mais robustas, como verificar a autenticação do usuário)
if (!isset($_SESSION['idCliente'])) {
    header("Location: /primeStore/auth"); // Redirecione para a página de login
    exit;
}

// Conexão com o banco de dados (substitua com suas informações de conexão)
$con = mysqli_connect("localhost", "seu_usuario", "sua_senha", "seu_banco_de_dados");

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Receba os dados do formulário (certifique-se de validar e limpar os dados apropriadamente)
$idCliente = $_SESSION['idCliente'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefoneCelular = $_POST['telefoneCelular'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Atualize os dados no banco de dados (substitua com a sua consulta SQL)
$sql = "UPDATE tblcliente SET nome = '$nome', sobrenome = '$sobrenome', telefoneCelular = '$telefoneCelular', email = '$email', senha = '$senha' WHERE idCliente = $idCliente";

if (mysqli_query($con, $sql)) {
    // Os dados foram atualizados com sucesso
    echo "Dados atualizados com sucesso!";
} else {
    // Erro na atualização dos dados
    echo "Erro na atualização dos dados: " . mysqli_error($con);
}

// Feche a conexão com o banco de dados
mysqli_close($con);
?>

