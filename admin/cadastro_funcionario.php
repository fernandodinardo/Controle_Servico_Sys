<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Funcionario_tccDAO.php';

if (isset($_POST['btnSalvar'])) {

    $nomefunc = $_POST['nome_funcionario'];
    $emailfunc = $_POST['email_funcionario'];
    $telfixo_func = $_POST['telfixo_func'];
    $telcel_func = $_POST['telcel_func'];

    $objDAO = new Funcionario_tccDAO();
    $ret = $objDAO->InserirFuncionarioTCC($nomefunc, $emailfunc, $telfixo_func, $telcel_func);
}
?>


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

                            <?php
                            if (isset($ret)) {
                                ExibirMsgTCC($ret);
                            }
                            ?>

                            <h2> Cadastro de Funcionários </h2>   
                            <h5> ( Aqui você irá cadastrar os funcionários ) </h5>

                        </div>

                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <form method="post" action="cadastro_funcionario.php">

                        <div class="form-group">
                            <label> Digite o Nome do Funcionário: </label>
                            <input class="form-control" placeholder="Insira o nome do funcionário aqui" id="nome_funcionario" name="nome_funcionario" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_nome_funcionario" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Digite o Email do Funcionário: </label>
                            <input type="email" class="form-control" placeholder="Insira o e-mail do funcionário aqui" id="email_funcionario" name="email_funcionario" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_email_funcionario" class="validar-campos"> </label>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Digite o Telefone Fixo do Funcionário: </label>
                                <input type="tel" class="form-control" placeholder="Insira o telefone fixo do funcionário aqui" id="telfixo_func" name="telfixo_func" onchange="return ValidarTelaTCC(3)" />
                                <label id="val_telfixo_func" class="validar-campos"> </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Digite o Telefone Celular do Funcionário: </label>
                                <input type="tel" class="form-control" placeholder="Insira o telefone celular do funcionário aqui" id="telcel_func" name="telcel_func" onchange="return ValidarTelaTCC(3)" />
                                <label id="val_telcel_func" class="validar-campos"> </label>
                            </div>
                        </div>

                        <center>
                        <button onclick="return ValidarTelaTCC(3)" class="btn btn-success" name="btnSalvar"> Salvar </button>
                        </center>
                        
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

    </body>

</html>
