<?php
	session_start();
	
	class Conexao{
		private $host = 'localhost';
		private $dbname = 'dados_celetistas';
		private $dsn= "pgsql:host=localhost;port=5432;dbname=dados_celetistas;";
		private $user = 'postgres';
		private $pass = 'Fcm@2022';


		public function criaDB(){
			try {
				/*
				$conn = new PDO($this->dsn, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "create DATABASE dados_celetistas";
				$conn->exec($sql);
				$sql = "use dados_celetistas";
				$conn->exec($sql);*/
				
			}
			catch (PDOException $e) {
				die("DB ERROR: " . $e->getMessage());
			}

		}

		public function Conectar() {
			try {
				$cria_db = $this->criaDB();
				$conexao = new PDO(
					"pgsql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->pass"				
				);
				
				return $conexao;

			} catch (PDOException $e) {
				echo '<p>'.$e->getMessege().'</p>';
			}
		}

		

	}
	
?>