<?php

// Identifiants de la BDD 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'poo_bdd');

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