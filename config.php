<?php
	session_start();
	
	class Conexao{
		private $host = 'localhost';
		private $dbname = 'dados_celetistas';
		private $dsn= "pgsql:host=localhost;port=5432;dbname=dados_celetistas;";
		private $user = 'postgres';
		private $pass = 'localpass';
		private $conexao;

		public function Conectar() {
			try {
				//$cria_db = $this->criaDB();
				$this->conexao = new PDO(
					"pgsql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->pass"				
				);
				
				return $this->conexao;

			} catch (PDOException $e) {
				echo '<p>'.$e->getMessage().'</p>';
			}
		}

	}
	
?>