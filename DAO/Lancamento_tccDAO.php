<?php

require_once 'Conexao_tcc.php';
require_once 'Util_tccDAO.php';

class Lancamento_tccDAO extends Conexao_tcc {

    public function InserirLancamento($dtalanca, $selfunc, $selcliente, $descricao, $vlrlanc) {

        if (trim($dtalanca) == '' || trim($selfunc) == '' || trim($selcliente) == '' || trim($descricao) == '' || trim($vlrlanc) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_atendimento (data_atend,
                                                id_funcionario,
                                                id_cliente,
                                                descricao_atend,
                                                valor_atend,
                                                id_usuario)
                                                values (?,?,?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $dtalanca);
        $sql->bindValue(2, $selfunc);
        $sql->bindValue(3, $selcliente);
        $sql->bindValue(4, $descricao);
        $sql->bindValue(5, $vlrlanc);
        $sql->bindValue(6, Util_tccDAO::CodigoLogado());

        try {
            $sql->execute();

            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function FiltrarLancamento($sel_func, $sel_cliente, $dtaini, $dtafim) {

        if ($dtaini == '' || $dtafim == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando = 'select
                            id_atendimento,
                            date_format(data_atend, "%d/%m/%Y") as data_atend, 
                            nome_funcionario,
                            nome_cliente,
                            valor_atend,
                            descricao_atend,
                            tb_atendimento.id_funcionario,
                            tb_atendimento.id_cliente
                        from 
                            tb_atendimento
                    INNER JOIN  tb_funcionario
                        ON  tb_funcionario.id_funcionario = tb_atendimento.id_funcionario
                    INNER JOIN  tb_cliente
                        ON  tb_cliente.id_cliente = tb_atendimento.id_cliente
                    where 
                        tb_atendimento.id_usuario = ?
                    and
                        data_atend between ? and ?';

        if ($sel_func != 0) {
            $comando = $comando . ' and tb_atendimento.id_funcionario = ?';
        }
        if ($sel_cliente != 0) {
            $comando = $comando . ' and tb_atendimento.id_cliente = ?';
        }

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        //Esses sempre vao ter
        $sql->bindValue(1, Util_tccDAO::CodigoLogado());
        $sql->bindValue(2, $dtaini);
        $sql->bindValue(3, $dtafim);

        //Agora aqui tem que ter a logica da probabildade
        //Se tiver funcionario MAS nao tem cliente
        if ($sel_func != 0 && $sel_cliente == 0) {
            $sql->bindValue(4, $sel_func);
        }
        //Se tiver somente cliente 
        else if ($sel_func == 0 && $sel_cliente != 0) {
            $sql->bindValue(4, $sel_cliente);
        }
        //Se tiver os 2
        else if($sel_func != 0 && $sel_cliente != 0){
            $sql->bindValue(4, $sel_func);
            $sql->bindValue(5, $sel_cliente);
        }
        //ou nao tiver nenhum deles nao cairia em nenhuma dessa opções e vc teria somente os 3 bindValues concorda?
        

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();


        return $sql->fetchAll();
    }

    public function ExcluirLancamento($codLanc) {

        $conexao = parent::retornaConexao();

        $comando = 'delete from tb_atendimento where id_atendimento = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $codLanc);

        try {
            $sql->execute();

            return 4;
        } catch (Exception $ex) {

            return -1;
        }
    }

}
