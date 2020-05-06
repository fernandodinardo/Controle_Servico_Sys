<?php

require_once '../DAO/Usuario_tccDAO.php';

if(isset($_POST['btnAcessar'])) {
    
    $email_login = $_POST['email_login'];
    $senha_login = $_POST['senha_login'];
    
    $objDAO = new Usuario_tccDAO();
    
    $ret = $objDAO->ValidarLoginTCC($email_login, $senha_login);
}

?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head-tcc.php';
    ?>
    <body>
        <div class="container">
            <div class="row text-center ">

                <div class="col-md-12">
                    <br /><br />

                    <h2> Controle de Serviço : ACESSO </h2>
                    <h5> ( Faça o seu Login ) </h5>

                    <br />
                </div>
            </div>

            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <strong>   Entre com seus dados: </strong>  
                        </div>

                        <div class="panel-body">
                            
                            <?php
                            if(isset($ret)) {
                                ExibirMsgTCC($ret);
                            }
                            ?>

                            <form method="post" action="LoginTCC.php">
                                <br />

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"  ></i></span>
                                    <input type="text" class="form-control" placeholder="Digite o seu Email"  id="email_login" name="email_login" />
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control"  placeholder="Digite a sua Senha" id="senha_login" name="senha_login" />
                                </div>

                                <button  onclick="return ValidarCampos()" name="btnAcessar" class="btn btn-primary "> Acessar </button>

                                <hr />
                                Ainda não tem cadastro? <a href="CadastroTCC.php" > Clique Aqui! </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

            function ValidarCampos() {

                if ($("#email_login").val().trim() === "") {
                    alert('Favor informar o E-mail para efetuar Login!');
                    return-false;
                }

                if ($("#senha_login").val().trim() === "") {
                    alert('Favor informar a Senha para efetuar Login!');
                    return-false;
                }
            }

        </script>

    </body>

</html>
