<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<h2 id="perfil-title">Perfil</h2>
<p id="info">Minhas Informações</p>
<?php 
//error_reporting(0);
$con = mysqli_connect("localhost","site_admin","1234","primeStore"); 

if(isset($_SESSION['idCliente'])) {
$id = $_SESSION['idCliente'];
} else {
$id = 0;
}
echo $id;
if ($id) {
    //Executar a pesquisa no banco
    //Setar o botão de action para atualizar
    $sql = "SELECT `idCliente`, `nome`, `sobrenome`, `telefoneCelular`, `email`, `senha`, `cpf`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf` FROM `tblcliente` WHERE idCliente =".$id;
    // echo $sql;

    $rs = mysqli_query($con, $sql);

    foreach ($rs as $valor) {
        //   echo "<pre>";
        //   var_dump($valor);
        //   echo "</pre>";
        $nome = $valor['nome'];
        $sobrenome = $valor['sobrenome'];
        $telefoneCelular = $valor['telefoneCelular'];
        $email = $valor['email'];
        $senha = $valor['senha'];
        $cpf = $valor['cpf'];
        $cep = $valor['cep'];
        $endereco = $valor['endereco'];
        $numero = $valor['numero'];
        $complemento = $valor['complemento'];
        $bairro = $valor['bairro'];
        $cidade = $valor['cidade'];
        $uf = $valor['uf'];
    }
}
?>
<div class="form-box">
    <link rel="stylesheet" type="text/css" href="/primeStore/app/assets/stylesheet/perfil.css">
    <form id="change-datas" action="/primeStore/app/controllers/auth/execute/register.php" class="input-group-register" action="/primeStore/app/controllers/auth/execute/change-datas.php" method="POST">
        <div class="form-container">
            <div class="column">
                <input id="nome" type="text" class="input-field" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
                <input id="sobrenome" type="text" class="input-field" name="sobrenome" placeholder="Sobrenome" value="<?php echo $sobrenome; ?>">
                <input id="cpf" type="text" class="input-field" name="cpf" placeholder="CPF" value="<?php echo $cpf; ?>">
                <input id="telefoneCelular" type="text" class="input-field" name="telefoneCelular" placeholder="Telefone/Celular" value="<?php echo $telefoneCelular; ?>">
                <input id="email" type="email" class="input-field" name="email" placeholder="E-mail" value="<?php echo $email; ?>">

                <input id="senha" type="text" class="input-field" name="senha" placeholder="Nova Senha" value="<?php echo $senha; ?>">
                <input id="confirmaSenha" type="text" onblur="validarSenha()" class="input-field" name="confirmaSenha" placeholder="Confirme sua senha" value="<?php echo $senha; ?>">
            </div>

            <div class="column">
                <input id="cep" class="input-field" type="text" name="cep" placeholder="CEP" value="<?php echo $cep; ?>">
                <input id="uf" type="text" class="input-field" name="uf" placeholder="UF" value="<?php echo $uf; ?>">
                <input id="cidade" type="text" class="input-field" name="cidade" placeholder="Cidade" value="<?php echo $cidade; ?>">
                <input id="bairro" type="text" class="input-field" name="bairro" placeholder="Bairro" value="<?php echo $bairro; ?>">
                <input id="endereco" type="text" class="input-field" name="endereco" placeholder="Rua" value="<?php echo $endereco; ?>">
                <input id="numero" type="text" class="input-field" name="numero" placeholder="Numero" value="<?php echo $numero; ?>">
                <input id="complemento" type="text" class="input-field" name="complemento" placeholder="Complemento (opcional)" value="<?php echo $complemento; ?>">
            </div>
        </div>
        <button type="submit" id="change-btn">Fazer alterações</button>
        <button id="cancel-btn">Cancelar Sessão</button>

    <script>
        // Função para cancelar a sessão
        document.getElementById("cancel-btn").addEventListener("click", function() {
            // Fazer uma solicitação ao servidor para destruir a sessão
            fetch("/primeStore/app/controllers/auth/execute/logout.php") // Substitua com o URL correto do script PHP para logout
                .then(function(response) {
                    if (response.ok) {
                        // Sessão destruída com sucesso, redirecionar para a página de login
                        window.location.href = "/primeStore/auth"; // Substitua com o URL desejado
                    } else {
                        // Tratar erro (por exemplo, exibir uma mensagem de erro)
                        console.error("Erro ao cancelar a sessão");
                    }
                });
        });
    </script>
    </form>
</div>

<script>
    function validarSenha() {
        var senha = document.getElementById("senha").value;
        var confirmaSenha = document.getElementById("confirmaSenha").value;

        console.log(senha);
        console.log(confirmaSenha);

        if ((senha) && (confirmaSenha)) {
            if (senha == confirmaSenha) {
                console.log("Senhas corretas");
            } else {
                console.log("Senhas não são iguais");
                document.getElementById("confirmaSenha").focus();
            }
        } else {
            console.log("Digite uma senha");
            document.getElementById("senha").focus();
        }
    }

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        jQuery("#endereco").val("");
        jQuery("#bairro").val("");
        jQuery("#cidade").val("");
        jQuery("#uf").val("");
        jQuery("#complemento").val("");
    }

    //Quando o campo cep perde o foco.
    jQuery("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = jQuery(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                jQuery("#endereco").val("...");
                jQuery("#bairro").val("...");
                jQuery("#cidade").val("...");
                jQuery("#uf").val("...");
                jQuery("#complemento").val("...");

                //Consulta o webservice viacep.com.br/
                jQuery.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        jQuery("#endereco").val(dados.logradouro);
                        jQuery("#bairro").val(dados.bairro);
                        jQuery("#cidade").val(dados.localidade);
                        jQuery("#uf").val(dados.uf);
                        jQuery("#complemento").val(dados.complemento);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
</script>