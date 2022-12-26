<?php
session_start();
include 'connexionBD.php';
	   $bdd = connexionBD();
		$pass = htmlspecialchars($_POST['pass']); // cryptage du mot de passe saisis
		$email = htmlspecialchars($_POST['email']);
		if(isset($pass,$email) && !empty($pass) && !empty($email)){
		//$pass_hache = sha1($pass);
		// Vérification des identifiants
		$req = $bdd->prepare("SELECT nom FROM `utilisateurs` WHERE email = :email AND mdp = :password");
		$req->execute(array(
			':email' => $email,
			':password' => $pass));
		$resultat = $req->fetchAll()[0];

		if (!$resultat) // si le pseudo et le mot de passe saisis ne correspondent à aucun membre de la BD
		{
		  $_SESSION["error"]="!! L'email ou le mot de passe est incorrect !!";
			header('Location: connexion.php'); 
		}
		else // connexion du membre
		{
			//connexion($pseudo);
		  $_SESSION["username"]=$resultat;
			header('Location:newhome_principale.php'); // redirection vers l'espace membre
		}
		}
		


?>
