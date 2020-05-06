<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Cliente_tccDAO.php';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objDAO = new Clientes_tccDAO();
    $dados = $objDAO->DetalharClienteTCC($_GET['cod']);

    if (count($dados) == 0) {
        header('location: consultar_cliente.php');
    }
} else if (isset($_POST['btnSalvar'])) {

    $id = $_POST['cod'];

    $nome = $_POST['nome_cliente'];
    $endereco = $_POST['endereco_cliente'];
    $telfixo = $_POST['telfixo_cliente'];
    $telcelular = $_POST['telcel_cliente'];

    $objDAO = new Clientes_tccDAO();
    $ret = $objDAO->AlterarClienteTCC($nome, $endereco, $telfixo, $telcelular, $id);

    header('location: alterar_cliente.php?cod=' . $id . '&ret=' . $ret);
} else if (isset($_POST['btnExcluir'])) {

    $id = $_POST['cod'];

    $objDAO = new Clientes_tccDAO();
    $ret = $objDAO->ExcluirClienteTCC($id);

    header('location: consultar_cliente.php?ret=' . $ret);
} else {

    header('location: consultar_cliente.php');
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

                            <h2> Alterar Cliente </h2>   
                            <h5> ( Aqui você irá alterar o cadastro do Cliente ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <form method="post" action="alterar_cliente.php">

                        <input type="hidden" name="cod" value="<?= $dados[0]['id_cliente'] ?>" />

                        <div class="form-group">
                            <label> Nome do Cliente: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="nome_cliente" name="nome_cliente" value="<?= $dados[0]['nome_cliente'] ?>" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_nome_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Endereço do Cliente: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="endereco_cliente" name="endereco_cliente" value="<?= $dados[0]['endereco_cliente'] ?>" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_endereco_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Telefone Fixo do Cliente: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="telfixo_cliente" name="telfixo_cliente" value="<?= $dados[0]['telfixo_cliente'] ?>" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_telfixo_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Telefone Celular do Cliente: </label>
                            <input class="form-control" placeholder="Digite Aqui..." id="telcel_cliente" name="telcel_cliente" value="<?= $dados[0]['telcel_cliente'] ?>" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_telcel_cliente" class="validar-campos"> </label>
                        </div>

                        <center>
                            <button onclick="return ValidarTelaTCC(2)" type="submit" class="btn btn-success" name="btnSalvar"> Salvar </button>
                            <button type="submit" class="btn btn-danger" name="btnExcluir"> Excluir </button>
                        </center>

                    </form>                                        
                </div>
            </div>
        </div>
    </body>
</html>
