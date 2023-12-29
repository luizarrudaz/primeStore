<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<form id="cadastrar" class="input-group-register" action="/primeStore/app/controllers/auth/execute/register.php" method="POST">
    <div class="form-container">
        <div class="column">
            <input id="nome" type="text" class="input-field" name="nome" placeholder="Nome" required>
            <input id="sobrenome" type="text" class="input-field" name="sobrenome" placeholder="Sobrenome" required>
            <input id="cpf" type="text" class="input-field" name="cpf" placeholder="CPF" required>
            <input id="telefoneCelular" type="text" class="input-field" name="telefoneCelular" placeholder="Telefone/Celular"required >
            <input id="email" type="email" class="input-field" name="email" placeholder="E-mail" required>
            <input id="senhaa" type="password" class="input-field" name="senha" placeholder="Crie sua senha" required>
            <input id="confirmaSenha" type="password" onblur="validarSenha()" class="input-field" name="confirmaSenha" placeholder="Confirme sua senha" required>
        </div>

        <div class="column">
            <input id="cep" class="input-field" type="text" name="cep" placeholder="CEP" required>
            <input id="uf" type="text" class="input-field" name="uf" placeholder="UF"required>
            <input id="cidade" type="text" class="input-field" name="cidade" placeholder="Cidade"required>
            <input id="bairro" type="text" class="input-field" name="bairro" placeholder="Bairro"required>
            <input id="endereco" type="text" class="input-field" name="endereco" placeholder="Rua"required>
            <input id="numero" type="" class="input-field" name="numero" placeholder="Numero" required>
            <input id="complemento" type="text" class="input-field" name="complemento" placeholder="Complemento (opcional)">
        </div>
    </div>
    <button type="submit" class="register-btn">Cadastrar</button>
</form>
</div>
<script>
    function validarSenha(){
        var senha = document.getElementById("senhaa").value;
        var confirmaSenha = document.getElementById("confirmaSenha").value;

        console.log(senha);
        console.log(confirmaSenha);

        if((senha)&&(confirmaSenha)){
            if( senha == confirmaSenha){
                console.log("Senhas corretas");
            }
            else {
                console.log("Senhas não são iguais");
                document.getElementById("confirmaSenha").focus();
            }  
        }
        else{
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
                   if(validacep.test(cep)) {

                       //Preenche os campos com "..." enquanto consulta webservice.
                       jQuery("#endereco").val("...");
                       jQuery("#bairro").val("...");
                       jQuery("#cidade").val("...");
                       jQuery("#uf").val("...");
                       jQuery("#complemento").val("...");

                       //Consulta o webservice viacep.com.br/
                       jQuery.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

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