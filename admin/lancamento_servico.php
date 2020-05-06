<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Lancamento_tccDAO.php';
require_once '../DAO/Cliente_tccDAO.php';
require_once '../DAO/Funcionario_tccDAO.php';

$objDAO_Func = new Funcionario_tccDAO();
$objDAO_Cli = new Clientes_tccDAO();

if (isset($_POST['btnSalvar'])) {

    $dtalanca = $_POST['dtalancamento'];
    $selfunc = $_POST['sel_func'];
    $selcliente = $_POST['sel_cliente'];
    $descricao = $_POST['descricao_servico'];
    $vlrlanc = $_POST['vlr_os'];

    $objDAO = new Lancamento_tccDAO();
    $ret = $objDAO->InserirLancamento($dtalanca, $selfunc, $selcliente, $descricao, $vlrlanc);
}

$funcionarios = $objDAO_Func->ConsultarFuncionarioTCC();
$clientes = $objDAO_Cli->ConsultarClienteTCC();
?>
﻿
<!DOCTYPE html>
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

                            <h2> Realizar Lançamento da OS </h2>   
                            <h5> ( Aqui você irá realizar os Lançamentos de OS. ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <form method="post" action="lancamento_servico.php">

                        <div class="form-group">
                            <label> Data do Lançamento: </label>
                            <input type="date" class="form-control" placeholder="Informe a Data do Lançamento..." id="dtalancamento" name="dtalancamento" onchange="return ValidarTelaTCC(4)" />
                            <label id="val_dtalancamento" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Selecione o Funcionário: </label>
                            <select class="form-control" id="sel_func" name="sel_func" onchange="return ValidarTelaTCC(4)">
                                <option value="">Selecione o Funcionário..</option>

<?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                    <option value="<?= $funcionarios[$i]['id_funcionario'] ?>"><?= $funcionarios[$i]['nome_funcionario'] ?></option>
                                <?php } ?>

                            </select>
                            <label id="val_sel_func" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Selecione o Cliente: </label>
                            <select class="form-control" id="sel_cliente" name="sel_cliente" onchange="return ValidarTelaTCC(4)">
                                <option value="">Selecione o Cliente..</option>

<?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                    <option value="<?= $clientes[$i]['id_cliente'] ?>"><?= $clientes[$i]['nome_cliente'] ?></option>
                                <?php } ?>

                            </select>
                            <label id="val_sel_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Descrição: </label>
                            <textarea class="form-control" rows="3" name="descricao_servico"></textarea>
                        </div>

                        <div class="form-group"> <label> Valor da OS: </label>
                            <div class="form-group input-group">
                                <span class="input-group-addon">R$</span>
                                <input class="form-control" placeholder="Insira o Valor da OS..." id="vlr_os" name="vlr_os" onchange="return ValidarTelaTCC(4)" />
                            </div>
                            <label id="val_vlr_os" class="validar-campos"> </label>
                        </div>

                        <center>
                            <button onclick="return ValidarTelaTCC(4)" type="submit" class="btn btn-success" name="btnSalvar"> Salvar </button>
                        </center>

                    </form>

                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

    </body>
</html>
