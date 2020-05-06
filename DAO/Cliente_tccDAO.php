<?php

require_once 'Conexao_tcc.php';
require_once 'Util_tccDAO.php';

class Clientes_tccDAO extends Conexao_tcc {

    public function InserirClienteTCC($nome, $endereco, $telfixo, $telcelular) {

        if (trim($nome) == '' || trim($endereco) == '' || trim($telfixo) == '' || trim($telcelular) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_cliente
                                (nome_cliente, endereco_cliente, telfixo_cliente, telcel_cliente, id_usuario) 
                                values (?,?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $endereco);
        $sql->bindValue(3, $telfixo);
        $sql->bindValue(4, $telcelular);
        $sql->bindValue(5, Util_tccDAO::CodigoLogado());


        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarClienteTCC() {

        $conexao = parent::retornaConexao();

        $comando = 'select 
                            id_cliente,
                            nome_cliente,
                            endereco_cliente,
                            telfixo_cliente,
                            telcel_cliente
                    from tb_cliente
                        where id_usuario = ? order by nome_cliente';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, Util_tccDAO::CodigoLogado());

        //Configura o ARRAY para somente trazer a coluna e seu valor (eliminando o indice do ARRAY)
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharClienteTCC($id) {

        $conexao = parent::retornaConexao();

        $comando = 'select
                           id_cliente,
                           nome_cliente,
                           endereco_cliente,
                           telfixo_cliente,
                           telcel_cliente
                    from tb_cliente
                        where id_usuario = ? and id_cliente = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, Util_tccDAO::CodigoLogado());
        $sql->bindValue(2, $id);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarClienteTCC($nome, $endereco, $telfixo, $telcelular, $id) {
        
        if (trim($nome) == '' || trim($endereco) == '' || trim($telfixo) == '' || trim($telcelular) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'update tb_cliente
                            set nome_cliente = ?, endereco_cliente = ?, telfixo_cliente = ?, telcel_cliente = ?
                    where id_usuario = ? and id_cliente = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $endereco);
        $sql->bindValue(3, $telfixo);
        $sql->bindValue(4, $telcelular);
        $sql->bindValue(5, Util_tccDAO::CodigoLogado());
        $sql->bindValue(6, $id);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ExcluirClienteTCC($codCliente) {

        $conexao = parent::retornaConexao();
        $comando = 'delete
                        from tb_cliente
                    where id_cliente = ? and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $codCliente);
        $sql->bindValue(2, Util_tccDAO::CodigoLogado());

        try {
            $sql->execute();
            return 4;
        } catch (Exception $ex) {
            return -2;
        }
    }

}
