<?php

	function connexionBD() {
        $servname = '127.0.0.1';
        $dbname = 'site_gestion_annonces';
        $user = 'root';
        $pass = '';
		try {
			$bdd = new PDO('mysql:host='.$servname.';dbname='.$dbname, $user, $pass);
		}
		catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		return $bdd;
	}
	

?>