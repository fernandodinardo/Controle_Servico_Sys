<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Lancamento_tccDAO.php';
require_once '../DAO/Cliente_tccDAO.php';
require_once '../DAO/Funcionario_tccDAO.php';

$objDAO_cli = new Clientes_tccDAO();
$objDAO_func = new Funcionario_tccDAO();

$sel_func = '';
$sel_cliente = '';
$dtaini = '';
$dtafim = '';

if (isset($_POST['btnPesquisar'])) {

    $objDAO = new Lancamento_tccDAO();

    $sel_func = $_POST['sel_func'];
    $sel_cliente = $_POST['sel_cliente'];
    $dtaini = $_POST['dtainicial'];
    $dtafim = $_POST['dtafinal'];

    $clientes = $objDAO_cli->ConsultarClienteTCC();
    $funcionarios = $objDAO_func->ConsultarFuncionarioTCC();
    
    $lancamentos = $objDAO->FiltrarLancamento($sel_func, $sel_cliente, $dtaini, $dtafim);
} else if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    //Dados para fazer a Exclusão;
    $codLanc = $_GET['cod'];

    $objDAO = new Lancamento_tccDAO();

    $ret = $objDAO->ExcluirLancamento($codLanc);
    //$lancamentos = $objDAO->FiltrarLancamento($sel_func, $sel_cliente, $dtaini, $dtafim);
}

    $clientes = $objDAO_cli->ConsultarClienteTCC();
    $funcionarios = $objDAO_func->ConsultarFuncionarioTCC();
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
                            if (isset($lancamentos) && $lancamentos == 0) {
                                ExibirMsgTCC(0);
                            } else if (isset($ret)) {
                                ExibirMsgTCC($ret);
                            }
                            ?>

                            <h2> Consultar Lançamentos </h2>   
                            <h5> ( Aqui você irá consultar / excluir os Lançamentos ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <form method="post" action="consultar_lancamento.php">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Selecione o Funcionário: </label>
                                <select class="form-control" name="sel_func">
                                    <option value="0" <?= $sel_func == 0 ? 'selected' : '' ?> >Todos</option>

                                    <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                        <option value="<?= $funcionarios[$i]['id_funcionario'] ?>"<?= $sel_func == $funcionarios[$i]['id_funcionario'] ? 'selected' : '' ?> ><?= $funcionarios[$i]['nome_funcionario'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>                    
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Selecione o Cliente: </label>
                                <select class="form-control" name="sel_cliente">
                                    <option value="0" <?= $sel_cliente == 0 ? 'selected' : '' ?> >Todos</option>

                                    <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                        <option value="<?= $clientes[$i]['id_cliente'] ?>"<?= $sel_cliente == $clientes[$i]['id_cliente'] ? 'selected' : '' ?> ><?= $clientes[$i]['nome_cliente'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>                    
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Data Inicial </label>
                                <input type="date" class="form-control" name="dtainicial" value="<?= $dtaini ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Data Final </label>
                                <input type="date" class="form-control" name="dtafinal" value="<?= $dtafim ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <center>
                                <button class="btn btn-info" name="btnPesquisar"> Pesquisar </button>
                            </center>
                        </div>

                    </form>

                    <?php if (isset($lancamentos) && $lancamentos != 0) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        Lançamentos encontrados:
                                    </div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                <thead>
                                                    <tr>
                                                        <th> Data do Lançamento </th>
                                                        <th> Funcionário </th>
                                                        <th> Cliente </th>
                                                        <th> Valor </th>
                                                        <th> Ação </th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php for ($i = 0; $i < count($lancamentos); $i++) { ?>

                                                        <tr class="odd gradeX">
                                                            <td> <?= $lancamentos [$i]['data_atend'] ?> </td>
                                                            <td> <?= $lancamentos [$i]['nome_funcionario'] ?> </td>
                                                            <td> <?= $lancamentos [$i]['nome_cliente'] ?> </td>
                                                            <td> <?= $lancamentos [$i]['valor_atend'] ?> </td>
                                                            <td>  
                                                                <a href="consultar_lancamento.php?cod=<?= $lancamentos[$i]['id_atendimento'] ?>" class="btn btn-danger btn-xs">Excluir</a>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--End Advanced Tables -->
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>
