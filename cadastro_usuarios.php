<?php

    require_once "config.php";

    class CadastrarFunc{
        private $nome;
        private $email;
        private $senha;
        private $tipo_usuario;
        private $conexao;

        public function __construct($nome, $email, $senha, $tipo_usuario, Conexao $conexao) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->tipo_usuario = $tipo_usuario;
            $this->conexao = $conexao->conectar();

        }

        public function exibirDados() {
            echo $this->nome;
            echo $this->email;
            echo $this->senha;
            echo $this->tipo_usuario;

        }

        public function inserir(){
            $query = 'insert into tb_funcionarios(
                nome, email, senha, tipo_usuario
            ) values(
                ?,?,?,?
            )';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->nome);
            $stmt->bindValue(2, $this->email);
            $stmt->bindValue(3, $this->senha);
            $stmt->bindValue(4, $this->tipo_usuario);
            $stmt->execute();
            
        }

        public function recuperar($nome){

            if ($nome == '') {
                $query = 'select * FROM tb_funcionarios';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();
                $consulta = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $consulta;
            } else {
                $query = 'select id FROM tb_funcionarios WHERE nome = ?';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(1, $nome);
                $stmt->execute();
                $consulta = $stmt->fetch(PDO::FETCH_OBJ);
                return $consulta->id;
            }
            
        }
        
        public function updateSenha($email, $novaSenha){

            $query = 'UPDATE tb_funcionarios SET senha = ? WHERE email = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $novaSenha);
            $stmt->bindValue(2, $email);
            $stmt->execute();

            
        }

        public function excluir($id_func){
            $query = 'DELETE FROM tb_funcionarios WHERE id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $id_func);
            $stmt->execute();
            return;
        }


    }



?>