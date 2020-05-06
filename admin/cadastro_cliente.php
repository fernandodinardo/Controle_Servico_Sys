<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Cliente_tccDAO.php';

if (isset($_POST['btnSalvar'])) {

    $nomecliente = $_POST['nome_cliente'];
    $endercliente = $_POST['endereco_cliente'];
    $telfixo_cli = $_POST['telfixo_cliente'];
    $telcel_cli = $_POST['telcel_cliente'];

    $objDAO = new Clientes_tccDAO();
    $ret = $objDAO->InserirClienteTCC($nomecliente, $endercliente, $telfixo_cli, $telcel_cli);
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

                            <h2> Cadastro de Clientes </h2>   
                            <h5> ( Aqui você irá cadastrar os clientes ) </h5>

                        </div>

                    </div>
                    <!-- /. ROW  -->

                    <hr />

                    <form method="post" action="cadastro_cliente.php">
                        <div class="form-group">
                            <label> Digite o Nome do Cliente: </label>
                            <input class="form-control" placeholder="Insira o nome do cliente aqui" id="nome_cliente" name="nome_cliente" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_nome_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="form-group">
                            <label> Digite o Endereço do Cliente: </label>
                            <input type="text" class="form-control" placeholder="Insira o endereço do cliente aqui" id="endereco_cliente" name="endereco_cliente" onchange="return ValidarTelaTCC(2)" />
                            <label id="val_endereco_cliente" class="validar-campos"> </label>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Digite o Telefone Fixo do Cliente: </label>
                                <input type="tel" class="form-control" placeholder="Insira o telefone fixo do cliente aqui" id="telfixo_cliente" name="telfixo_cliente" onchange="return ValidarTelaTCC(2)" />
                                <label id="val_telfixo_cliente" class="validar-campos"> </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Digite o Telefone Celular do Cliente: </label>
                                <input type="tel" class="form-control" placeholder="Insira o telefone celular do cliente aqui" id="telcel_cliente" name="telcel_cliente" onchange="return ValidarTelaTCC(2)" />
                                <label id="val_telcel_cliente" class="validar-campos"> </label>
                            </div>
                        </div>

                        <center>
                        <button onclick="return ValidarTelaTCC(2)" class="btn btn-success" name="btnSalvar"> Salvar </button>
                        </center>
                        
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

    </body>

</html>
