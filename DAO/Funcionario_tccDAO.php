<?php

require_once 'Conexao_tcc.php';
require_once 'Util_tccDAO.php';

class Funcionario_tccDAO extends Conexao_tcc {

    public function InserirFuncionarioTCC($nomefunc, $emailfunc, $telfixo_func, $telcel_func) {

        if (trim($nomefunc) == '' || trim($emailfunc) == '' || trim($telfixo_func) == '' || trim($telcel_func) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_funcionario
                                (nome_funcionario, email_funcionario, telfixo_funcionario, telcel_funcionario, id_usuario) 
                                values (?,?,?,?,?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $nomefunc);
        $sql->bindValue(2, $emailfunc);
        $sql->bindValue(3, $telfixo_func);
        $sql->bindValue(4, $telcel_func);
        $sql->bindValue(5, Util_tccDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarFuncionarioTCC() {

        $conexao = parent::retornaConexao();

        $comando = 'select
                        id_funcionario, 
                        nome_funcionario, 
                        email_funcionario, 
                        telfixo_funcionario, 
                        telcel_funcionario
                    from tb_funcionario
                        where id_usuario = ? order by nome_funcionario';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, Util_tccDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function DetalharFuncionarioTCC($id) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select
                            id_funcionario, 
                            nome_funcionario, 
                            email_funcionario, 
                            telfixo_funcionario, 
                            telcel_funcionario
                        from tb_funcionario
                            where id_usuario = ? and id_funcionario = ?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, Util_tccDAO::CodigoLogado());
        $sql->bindValue(2, $id);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        return $sql->fetchAll();
    }

    public function AlterarFuncionarioTCC($nomefunc, $emailfunc, $telfixo_func, $telcel_func, $id) {
        
        if (trim($nomefunc) == '' || trim($emailfunc) == '' || trim($telfixo_func) == '' || trim($telcel_func) == '') {
            return 0;
        }
        
        $conexao = parent::retornaConexao();
        $comando = 'update tb_funcionario
                            set nome_funcionario = ?, email_funcionario = ?, telfixo_funcionario = ?, telcel_funcionario = ?
                    where id_usuario = ? and id_funcionario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $nomefunc);
        $sql->bindValue(2, $emailfunc);
        $sql->bindValue(3, $telfixo_func);
        $sql->bindValue(4, $telcel_func);
        $sql->bindValue(5, Util_tccDAO::CodigoLogado());
        $sql->bindValue(6, $id);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
    
    public function ExcluirFuncionarioTCC($codFunc) {
        
        $conexao = parent::retornaConexao();
        $comando = 'delete
                        from tb_funcionario
                    where id_funcionario = ? and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $codFunc);
        $sql->bindValue(2, Util_tccDAO::CodigoLogado());

        try {
            $sql->execute();
            return 4;
        } catch (Exception $ex) {
            return -2;
        }
        
    }
}
