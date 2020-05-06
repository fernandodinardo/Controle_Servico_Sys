<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Cliente_tccDAO.php';

$objDAO = new Clientes_tccDAO();
$clientes = $objDAO->ConsultarClienteTCC();
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
                            
                            <h2> Consultar Clientes </h2>   
                            <h5> ( Aqui você irá consultar e alterar o cadastro dos Clientes ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                
                                <div class="panel-heading">
                                    Lista dos clientes cadastrados:
                                </div>
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            
                                            <thead>
                                                <tr>
                                                    <th> Nome do Cliente </th>
                                                    <th> Endereço do Cliente </th>
                                                    <th> Tel. Fixo </th>
                                                    <th> Tel. Celular </th>
                                                    <th> Ação </th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td> <?= $clientes [$i]['nome_cliente'] ?> </td>
                                                    <td> <?= $clientes [$i]['endereco_cliente'] ?> </td>
                                                    <td> <?= $clientes [$i]['telfixo_cliente'] ?> </td>
                                                    <td> <?= $clientes [$i]['telcel_cliente'] ?> </td>
                                                    <td>  
                                                        <a href="alterar_cliente.php?cod=<?= $clientes[$i]['id_cliente'] ?>" class="btn btn-warning btn-xs"> Alterar </a>
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
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>
