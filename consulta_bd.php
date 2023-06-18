<?php

    require "config.php";

    class Consulta{
        //private $nome;
        private $email;
        private $senha;
        //private $tipo_usuario;
        private $conexao;

        public function __construct($email, $senha, Conexao $conexao) {
            $this->email = $email;
            $this->senha = $senha;
            $this->conexao = $conexao->conectar();

        }

        public function exibirDados() {
            echo $this->nome;
            echo $this->email;
            echo $this->senha;
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
            print_r($consulta = $stmt->fetchAll(PDO::FETCH_OBJ));
            return($consulta = $stmt->fetchAll(PDO::FETCH_OBJ));
            echo "</pre>";
            header('location: index.php?acao=entrou');
        }
        
        public function update(){

        }

        public function remove(){

        }


    }

?>