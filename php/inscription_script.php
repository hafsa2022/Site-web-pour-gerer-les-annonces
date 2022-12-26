<?php
include 'connexionBD.php';
session_start();
$nom = htmlspecialchars($_POST['nom']); 
$password =htmlspecialchars($_POST['pass']); 
$repeatpassword =htmlspecialchars ($_POST['repass']); 
$email = htmlspecialchars($_POST['email']);  
$pays = htmlspecialchars($_POST['pays']); 
date_default_timezone_set('Africa/Casablanca');
$date_inscri=  date("Y-m-d h:i:sa");
$token = sha1(uniqid());

if(isset($nom,$password,$repeatpassword,$email,$pays) && !empty($nom)&& !empty($email) && !empty($password) && !empty($repeatpassword) && !empty($pays)){
if($password == $repeatpassword) // on vérifie que les 2 mots de passe saisis sont bien identiques (au cas où le javascript serait désactivé)     
{					 
	$bdd = connexionBD();
	$req =$bdd->prepare("SELECT nom FROM utilisateurs WHERE nom =:nom");
	$req->execute(array('nom' => $nom));
	//$resultat = $req->fetchAll();
	
	if($req->rowCount() == 0) // il ne faut pas que le pseudo soit déjà utilisé
	{			
		$req =$bdd->prepare("SELECT email FROM utilisateurs WHERE email = :email");
		$req->execute(array('email' => $email));
		//$resultat = $req->fetch();
		
		if($req->rowCount() == 0) // il ne faut pas que le mail soit déjà utilisé
		{			
			$pass_hache = sha1($password); // cryptage du mot de passe avec sha1
			

			// insertion des données du nouveau membre dans la BD
			$req = $bdd->prepare("INSERT INTO `utilisateurs` (nom, email,mdp,pays,date_inscription,token ) VALUES (:nom,:email,:password,:pays,:date_inscri,:token)");
			$req->execute(array(':nom'=>$nom,':email'=>$email,':password'=>$password,':pays'=>$pays,':date_inscri'=>$date_inscri,':token'=>$token));
			$resultat = $req->fetchAll();
			$_SESSION["username"]=$nom;
			$_SESSION["success"]="Inscription est validé ,passer à connecter à cette compte";
			header('Location: inscription.php'); 
		
		} 
		else // mail déjà utilisé par un autre utilisateur
		{   $_SESSION['err']="!! Cette adresse mail est déjà utilisée !!";
			header('Location: inscription.php'); 
		}			
	} 
	else // pseudo déjà utilisé par un autre utilisateur
	{   $_SESSION['err']="!! Ce nom déjà utilisé par un autre utilisateur !!";
		header('Location: inscription.php'); 
	}
	
} 
else // les mots de passes saisis ne sont pas identiques
{ $_SESSION['err']="!! Les mots de passes saisis ne sont pas identiques !!";
	header('Location: inscription.php'); 
}  
}else{
	$_SESSION['err']="!! Veuillez remplir tous les champs !!";
    header('Location: inscription.php');
}

?>

