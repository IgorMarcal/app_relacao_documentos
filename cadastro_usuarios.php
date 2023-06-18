<?php

    require "config.php";

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

        public function recuperar(){
            $query = 'select * from tb_funcionarios;';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            echo "<pre>";
            return($consulta = $stmt->fetchAll(PDO::FETCH_OBJ));
            echo "</pre>";
        }
        
        public function update(){

        }

        public function remove(){

        }


    }



?>