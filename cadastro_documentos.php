<?php

    require_once "config.php";

    class CadastrarDoc{
        private $nome_arquivo;
        private $arquivo;
        private $conexao;

        public function __construct($nome, $email, Conexao $conexao) {
            $this->nome_arquivo = $nome;
            $this->arquivo = $email;
            $this->conexao = $conexao->Conectar();

        }

        public function inserir($nome_arquivo, $arquivo, $id){
            
            $query = 'insert INTO tb_documentos (nome_documento, pdf, id_funcionario) VALUES (?, ?, ?)';
            
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $nome_arquivo);
            $stmt->bindValue(2, $arquivo, PDO::PARAM_LOB);
            $stmt->bindValue(3, $id);
            $stmt->execute();
        }

        

        public function exibeDocumento($id){

            $query = 'select * from tb_documentos where id = ?;';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $consulta = $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function recuperarDocumentos($id){
            
            $query = 'select * from tb_documentos where id_funcionario = ?;';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $consulta = $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function recuperarTodosDocumentos() {
            $query = 'select func.nome, doc.nome_documento, doc.id 
                        from tb_documentos as doc
                        left join tb_funcionarios as func
                        on (func.id = doc.id_funcionario)
                        order by func.nome asc
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        


        public function excluir($id_doc){

            $query = 'delete from tb_documentos where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $id_doc);
            $stmt->execute();

            return;
        }


    }


?>