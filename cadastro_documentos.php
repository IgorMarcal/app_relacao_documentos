<?php

    require "config.php";

    class CadastrarDoc{
        private $nome_arquivo;
        private $arquivo;
        private $conexao;

        public function __construct($nome, $email, Conexao $conexao) {
            $this->nome_arquivo = $nome;
            $this->arquivo = $email;

        }

        public function exibirDados() {
            echo $this->nome_arquivo;
            echo $this->arquivo;

        }

        public function inserir(){
            $query = 'insert into tb_documentos(
                nome_arquivo, arquivo
            ) values(
                ?,?
            )';

                
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->nome_arquivo);
            $stmt->bindValue(2, $this->arquivo);
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