<?php

// Identifiants de la BDD 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'poo_bdd');

class DB_con {

	public $db;

	public function __construct() {
		$this->dbConnection();
	}

	public function dbConnection(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		if (!$this->db) {
			print($this->db->num_error);
			exit();
		}
	}

	function ret_obj(){
		return $this->db;
	}

}
/* 
// Connexion à la BDD
class DB_con {
	public $connection;
	function __construct(){
		$this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

		// Affichage des potentielles erreurs
		if ($this->connection->connect_error) die('Erreur dans la base de données -> ' . $this->connection->connect_error);
	}
	function ret_obj(){
		return $this->connection;
	}

}
*/
