<?php
session_start();
echo "<pre>";
var_dump($_FILES);
echo "</pre>";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefoneCelular = $_POST['telefoneCelular'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$con = mysqli_connect("localhost","site_admin","1234","primeStore");
if(isset($_SESSION['idCliente'])) {
    $id = $_SESSION['idCliente'];
}
echo $id;
if ($id > 0) {
    $sql = "UPDATE `tblcliente` SET `nome`='".$nome."',`sobrenome`='".$sobrenome."',`telefoneCelular`='".$telefoneCelular."',`email`='".$email."',`senha`='".$senha."',`cpf`='".$cpf."',`cep`='".$cep."',`endereco`='".$endereco."',`numero`='".$numero."',`complemento`='".$complemento."',`bairro`='".$bairro."',`cidade`='".$cidade."',`uf`='".$uf."' WHERE idCliente =".$id;

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Registro atualizado com sucesso! ID =".$id;
        header("Location: http://localhost/primeStore/perfil");
    }
    } else {
        $sql = "INSERT INTO `tblcliente`(`nome`, `sobrenome`, `telefoneCelular`, `email`, `senha`, `cpf`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES ('".$nome."','".$sobrenome."','".$telefoneCelular."','".$email."','".$senha."','".$cpf."','".$cep."','".$endereco."','".$numero."','".$complemento."','".$bairro."','".$cidade."','".$uf."')";
        echo $sql;
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            echo "Registro inserido com sucesso! ID =".mysqli_insert_id($con);
            header("Location: http://localhost/primeStore/auth");
        }
    }
?>