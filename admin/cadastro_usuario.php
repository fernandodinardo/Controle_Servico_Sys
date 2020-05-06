
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head-tcc.php';
    ?>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo-tcc.php';
            include_once '_menu-tcc.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">

                        <div class="col-md-12">

                            <h2> Cadastro de Usuário </h2>   
                            <h5> ( Aqui você irá cadastrar os usuários ) </h5>

                        </div>

                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <div class="form-group">
                        <label> Digite o Nome do Usuário: </label>
                        <input class="form-control" placeholder="Insira o nome do usuário aqui" id="nome_usuario" name="nome_usuario" onchange="return ValidarTelaTCC()" />
                        <label id="val_nome_usuario" class="validar-campos"> </label>
                    </div>

                    <div class="form-group">
                        <label> Digite o Login do Usuário: </label>
                        <input class="form-control" placeholder="Insira o login do usuário aqui" id="login_usuario" name="login_usuario" onchange="return ValidarTelaTCC()" />
                        <label id="val_login_usuario" class="validar-campos"> </label>
                    </div>

                    <div class="form-group">
                        <label> Digite a Senha do Usuário: </label>
                        <input class="form-control" placeholder="Insira a senha do usuário aqui" id="senha_usuario" name="senha_usuario" onchange="return ValidarTelaTCC()" />
                        <label id="val_senha_usuario" class="validar-campos"> </label>
                    </div>

                    <button onclick="return ValidarTelaTCC()" class="btn btn-success" name="btnSalvar"> Salvar </button>
                    
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

    </body>

</html>
