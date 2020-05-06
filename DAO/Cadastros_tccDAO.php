<?php

require_once 'Conexao_tcc.php';
require_once 'Util_tccDAO.php';

class Cadastros_tccDAO extends Conexao_tcc {
    
    public function CadastrarUsuarioTCC($nome, $email, $senha, $confirmasenha) {

        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($confirmasenha) == '') {
            return 0;
        } else if (strlen(trim($senha)) < 6) {
            return 2;
        } else if ($senha !== $confirmasenha) {
            return 3;
        }
    
        $conexao = parent::retornaConexao();
        
        $comando = 'insert into tb_usuario (nome_usuario, email_usuario, senha_usuario) values (?,?,?)';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
        
    }

}
