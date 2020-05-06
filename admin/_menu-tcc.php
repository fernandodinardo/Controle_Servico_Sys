<?php
require_once '../DAO/Util_tccDAO.php';

if (isset($_GET['closed']) && $_GET['closed'] == 1) {
    Util_tccDAO::DeslogarSessao();
}
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li class="text-center">
                <img src="assets/img/find_user.png" class="user-image img-responsive"/>
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-2x"></i> CADASTROS <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="cadastro_funcionario.php"> Cadastro de Funcionários </a>
                    </li>
                    
                    <li>
                        <a href="consultar_funcionario.php"> Consulta de Funcionários </a>
                    </li> 
                    
                    <li>
                        <a href="cadastro_cliente.php"> Cadastro de Clientes </a>
                    </li>
                    
                    <li>
                        <a href="consultar_cliente.php"> Consulta de Clientes </a>
                    </li>                    
                    
                </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-cubes fa-2x"></i> LANÇAMENTOS <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="lancamento_servico.php"> Lançamento de OS </a>
                    </li>
                    
                    <li>
                        <a href="consultar_lancamento.php"> Consultar Lançamentos OS </a>
                    </li>
                </ul>
            </li>
                        
            <li>
                <a class="active-menu" href="_menu-tcc.php?closed=1"> <i class="fa fa-close fa-2x"></i> SAIR </a>
            </li>	
        </ul>

    </div>

</nav>  
<!-- /. NAV SIDE  -->