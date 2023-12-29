<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Destruir a sessão
session_destroy();

// Redirecionar para a página de login ou qualquer outra página
header("Location: /primeStore/home"); // Substitua com o URL desejado
exit; // Certifique-se de sair após redirecionar
?>