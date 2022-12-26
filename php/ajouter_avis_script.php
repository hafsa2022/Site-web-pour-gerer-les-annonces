<?php
include 'connexionBD.php';
session_start();
$nom = htmlspecialchars($_POST['nom']);
$message=htmlspecialchars($_POST['message']);
date_default_timezone_set('Africa/Casablanca');
$date_ajouter=  date("Y-m-d h:i:sa");
if(isset($nom,$message) && !empty($nom)&& !empty($message)){
            $bdd = connexionBD();
			$req_id = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE  nom = :nom');
            $req_id->execute(array(
               'nom' =>$nom));
            $id_utilisateur = $req_id->fetch()[0];
			// insertion des données du nouveau avis dans la BD
			$req = $bdd->prepare("INSERT INTO `Avis` (`personne_nom`, `message`,`date_ajouter`,`id_utilisateur`) VALUES (:nom,:avis_message,:date_ajouter,:id_utilisateur)");
			$req->execute(array(':nom'=>$nom,':avis_message'=>$message,':date_ajouter'=>$date_ajouter,':id_utilisateur'=>$id_utilisateur));
			$_SESSION["success"]="La création d'un avis est bien";
			header('Location: ajouter_avis.php'); 
}
else{	$_SESSION["err"]= "!! Veuillez remplir tous les champs !!";
    header('Location:ajouter_avis.php?');
}




?>