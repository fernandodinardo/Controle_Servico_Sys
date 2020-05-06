<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Funcionario_tccDAO.php';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objDAO = new Funcionario_tccDAO();
    $dados = $objDAO->DetalharFuncionarioTCC($_GET['cod']);

    if (count($dados) == 0) {
        header('location: consultar_funcionario.php');
    }
} else if (isset($_POST['btnSalvar'])) {

    $id = $_POST['cod'];

    $nomefunc = $_POST['nome_funcionario'];
    $emailfunc = $_POST['email_funcionario'];
    $telfixo_func = $_POST['telfixo_funcionario'];
    $telcel_func = $_POST['telcel_funcionario'];

    $objDAO = new Funcionario_tccDAO();
    $ret = $objDAO->AlterarFuncionarioTCC($nomefunc, $emailfunc, $telfixo_func, $telcel_func, $id);

    header('location: alterar_funcionario.php?cod=' . $id . '&ret=' . $ret);
} else if (isset($_POST['btnExcluir'])) {

    $id = $_POST['cod'];

    $objDAO = new Funcionario_tccDAO();
    $ret = $objDAO->ExcluirFuncionarioTCC($id);

    header('location: consultar_funcionario.php?ret=' . $ret);
} else {

    header('location: consultar_funcionario.php');
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
                            if (isset($_GET['ret'])) {
                                ExibirMsgTCC($_GET['ret']);
                            }
                            ?>

                            <h2> Alterar Funcionário </h2>   
                            <h5> ( Aqui você irá alterar o cadastro do Funcionário ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <form method="post" action="alterar_funcionario.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_funcionario'] ?>" />
                        <div class="form-group">
                            <label> Nome do Funcionário: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="nome_funcionario" name="nome_funcionario" value="<?= $dados[0]['nome_funcionario'] ?>" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_nome_funcionario" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> E-mail do Funcionário: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="email_funcionario" name="email_funcionario" value="<?= $dados[0]['email_funcionario'] ?>" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_email_funcionario" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Telefone Fixo do Funcionário: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="telfixo_funcionario" name="telfixo_funcionario" value="<?= $dados[0]['telfixo_funcionario'] ?>" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_telfixo_func" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Telefone Celular do Funcionário: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="telcel_funcionario" name="telcel_funcionario" value="<?= $dados[0]['telcel_funcionario'] ?>" onchange="return ValidarTelaTCC(3)" />
                            <label id="val_telcel_func" class="validar-campos"> </label>
                        </div>

                        <center>
                            <button onclick="return ValidarTelaTCC(3)" type="submit" class="btn btn-success" name="btnSalvar"> Salvar </button>
                            <button type="submit" class="btn btn-danger" name="btnExcluir"> Excluir </button>
                        </center>

                    </form>                                        
                </div>
            </div>
        </div>
    </body>
</html>
