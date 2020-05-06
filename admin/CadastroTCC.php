<?php
require_once '../DAO/Cadastros_tccDAO.php';

if (isset($_POST['btnFinalizar'])) {

    $nome = $_POST['nome_completo'];
    $email = $_POST['email_cadastro'];
    $senha = $_POST['senha_cadastro'];
    $confirmasenha = $_POST['senha_confirma'];

    $objDAO = new Cadastros_tccDAO();
    $ret = $objDAO->CadastrarUsuarioTCC($nome, $email, $senha, $confirmasenha);
}
?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head-tcc.php';
    ?>
    <body>
        
        <form action="CadastroTCC.php" method="post">
            <div class="container">
                <div class="row text-center  ">
                    <div class="col-md-12">
                        <br /><br />

                        <?php
                        if (isset($ret)) {
                            ExibirMsgTCC($ret);
                        }
                        ?>

                        <h2> Controle de Serviço : CADASTRO </h2>
                        <h5>( Faça seu cadastro para Acesso )</h5>

                        <br />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <strong>  Preencha os campos abaixo: </strong>  
                            </div>

                            <div class="panel-body">
                                <form role="form">
                                    <br/>

                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"  ></i></span>
                                        <input type="text" class="form-control" placeholder="Insira seu Nome Completo" id="nome_completo" name="nome_completo" onchange="return ValidarTelaTCC(1)" />
                                    </div>

                                    <div class="form-group">
                                        <label id="val_nome_completo" class="validar-campos"></label>
                                    </div>

                                    <div class="form-group input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="Insira seu Endereço de Email" id="email_cadastro" name="email_cadastro" onchange="return ValidarTelaTCC(1)" />
                                    </div>

                                    <div class="form-group">
                                        <label id="val_email_cadastro" class="validar-campos"></label>
                                    </div>

                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                        <input type="password" class="form-control" placeholder="Informe uma Senha" id="senha_cadastro" name="senha_cadastro" onchange="return ValidarTelaTCC(1)" />
                                    </div>

                                    <div class="form-group">
                                        <label id="val_senha_cadastro" class="validar-campos"></label>
                                    </div>

                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                        <input type="password" class="form-control" placeholder="Confirme a Senha" id="senha_confirma" name="senha_confirma" onchange="return ValidarTelaTCC(1)" />
                                    </div>

                                    <div class="form-group">
                                        <label id="val_senha_confirma" class="validar-campos"></label>
                                    </div>

                                    <button onclick="return ValidarTelaTCC(1)" name="btnFinalizar" class="btn btn-success "> Finalizar Cadastro </button>

                                    <hr />

                                    Já possui um Cadastro?  <a href="LoginTCC.php" > Clique Aqui! </a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>

</html>
