<?php 
session_start();
// meu controller
class meuCarrinho {
    // minha action
    public function index() {
        // Lógica do controlador
        // Renderize a view apropriada
        include './app/views/meuCarrinho/index.php';
        
    }
    public function unsetProduct() {

    }
}
$id = $_GET["id"];
unset($_SESSION['produtos'][$id]);
$json = json_encode($_SESSION['produtos']);
echo $json;
?>