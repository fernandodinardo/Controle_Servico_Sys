function ValidarTelaTCC(numero_tela) {

    var ret = true;

    switch (numero_tela) {

        case 1:  //Tela "CadastroTCC.PHP"
            if ($("#nome_completo").val().trim() === "") {
                $("#val_nome_completo").show().html("**Preencher o campo Nome!!");
                ret = false;
            } else {
                $("#val_nome_completo").hide();
            }

            if ($("#email_cadastro").val().trim() === "") {
                $("#val_email_cadastro").show().html("**Preencher o campo E-mail!!");
                ret = false;
            } else {
                $("#val_email_cadastro").hide();
            }

            if ($("#senha_cadastro").val().trim() === "") {
                $("#val_senha_cadastro").show().html("**Preencher o campo Senha!!");
                ret = false;

            } else if ($("#senha_cadastro").val().trim().length < 6) {
                $("#val_senha_cadastro").show().html("**Favor inserir uma Senha com no mínimo 6 dígitos!!");

                ret = false;

            } else if ($("#senha_cadastro").val().trim() !== $("#senha_confirma").val().trim()) {
                $("#val_senha_cadastro").hide();
                $("#val_senha_confirma").show().html("**As Senhas informadas não conferem!");
                ret = false;
            }

            break;

        case 2:  //Tela "Cadastro_Cliente.PHP" .e. Tela "Alterar_Cliente.PHP"
            if ($("#nome_cliente").val().trim() === "") {
                $("#val_nome_cliente").show().html("**Preencher o campo Nome do Cliente!!");
                ret = false;
            } else {
                $("#val_nome_cliente").hide();
            }

            if ($("#endereco_cliente").val().trim() === "") {
                $("#val_endereco_cliente").show().html("**Preencher o campo Endereço do Cliente!!");
                ret = false;
            } else {
                $("#val_endereco_cliente").hide();
            }

            if ($("#telfixo_cliente").val().trim() === "") {
                $("#val_telfixo_cliente").show().html("**Preencher o campo Telefone Fixo do Cliente!!");
                ret = false;
            } else {
                $("#val_telfixo_cliente").hide();
            }

            if ($("#telcel_cliente").val().trim() === "") {
                $("#val_telcel_cliente").show().html("**Preencher o campo Telefone Celular do Cliente!!");
                ret = false;
            } else {
                $("#val_telcel_cliente").hide();
            }

            break;

        case 3: //Tela "Cadastro_Funcionario.PHP" .e. Tela "Alterar_Funcionario.PHP"
            if ($("#nome_funcionario").val().trim() === "") {
                $("#val_nome_funcionario").show().html("**Preencher o campo Nome da Funcionário!!");
                ret = false;
            } else {
                $("#val_nome_funcionario").hide();
            }

            if ($("#email_funcionario").val().trim() === "") {
                $("#val_email_funcionario").show().html("**Preencher o campo E-mail do Funcionário!!");
                ret = false;
            } else {
                $("#val_email_funcionario").hide();
            }

            if ($("#telfixo_func").val().trim() === "") {
                $("#val_telfixo_func").show().html("**Preencher o campo Telefone Fixo do Funcionário!!");
                ret = false;
            } else {
                $("#val_telfixo_func").hide();
            }

            if ($("#telcel_func").val().trim() === "") {
                $("#val_telcel_func").show().html("**Preencher o campo Telefone Celular do Funcionário!!");
            } else {
                $("#val_telcel_func").hide();
            }

            break;

        case 4: //Tela "Lançamento_Serviço.PHP


            if ($("#dtalancamento").val() === "") {
                $("#val_dtalancamento").show().html("**Favor selecionar a data que foi realizado o movimento!!");
                ret = false;
            } else {
                $("#val_dtalancamento").hide();
            }

            if ($("#sel_func").val() === "") {
                $("#val_sel_func").show().html("**Favor selecionar o funcionário para registrar o lançamento!!");
                ret = false;
            } else {
                $("#val_sel_func").hide();
            }

            if ($("#sel_cliente").val() === "") {
                $("#val_sel_cliente").show().html("**Favor selecionar o cliente para registrar o lançamento!!");
                ret = false;
            } else {
                $("#val_sel_cliente").hide();
            }

            if ($("#vlr_os").val().trim() === "") {
                $("#val_vlr_os").show().html("**Favor informar o Valor deste Movimento!!");
                ret = false;
            } else {
                $("#val_vlr_os").hide();
            }

            break;
    }
    return ret;
}



