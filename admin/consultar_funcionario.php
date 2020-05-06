<?php
require_once '../DAO/Util_tccDAO.php';
Util_tccDAO::VerificarLogado();

require_once '../DAO/Funcionario_tccDAO.php';

$objDAO = new Funcionario_tccDAO();
$funcionarios = $objDAO->ConsultarFuncionarioTCC();
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
                            
                            <h2> Consultar Funcionários </h2>   
                            <h5> ( Aqui você irá consultar e alterar o cadastro dos Funcionários ) </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                
                                <div class="panel-heading">
                                    Lista dos funcionários cadastrados:
                                </div>
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            
                                            <thead>
                                                <tr>
                                                    <th> Nome do Funcionário </th>
                                                    <th> Email do Funcionário </th>
                                                    <th> Tel. Fixo </th>
                                                    <th> Tel. Celular </th>
                                                    <th> Ação </th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td> <?= $funcionarios [$i]['nome_funcionario'] ?> </td>
                                                    <td> <?= $funcionarios [$i]['email_funcionario'] ?> </td>
                                                    <td> <?= $funcionarios [$i]['telfixo_funcionario'] ?> </td>
                                                    <td> <?= $funcionarios [$i]['telcel_funcionario'] ?> </td>
                                                    <td>  
                                                        <a href="alterar_funcionario.php?cod=<?= $funcionarios[$i]['id_funcionario'] ?>" class="btn btn-warning btn-xs"> Alterar </a>
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
