<?php
include'connexionBD.php';
session_start();
$nom=$_SESSION["username"][0];
include 'connexionBD.php';
$titre = htmlspecialchars($_POST['titre']);
$numero=htmlspecialchars($_POST['numéro']);
$date_publier=htmlspecialchars($_POST['date_publier']);
$date_supprimer=htmlspecialchars($_POST['date_supprimer']);
$categorie=htmlspecialchars($_POST['catégories']);
$prix=htmlspecialchars($_POST['prix']);
$surface=htmlspecialchars($_POST['surface']);
$autreDetail=htmlspecialchars($_POST['autre_details']);
date_default_timezone_set('Africa/Casablanca');
$date_ajouter=date("Y-m-d h:i:sa");
$adresse=htmlspecialchars($_POST['adresse']);;
if(isset($_POST['ajouter_annonce'])){
            $bdd = connexionBD();
			// insertion des données d'une nouvelle annonce dans la BD
            $req_id = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE  nom = :nom');
            $req_id->execute(array(
               'nom' =>$nom));
            $id_utilisateur = $req_id->fetch()[0];
			$req = $bdd->prepare("INSERT INTO annonces(titre,numero,date_ajouter,date_supprimer,categorie,prix,surface,Autre_details,adresse,id_utilisateur ) VALUES (:titre,:numero,:date_publier,:date_supprimer,:categorie,:prix,:surface,:autre_details,:adresse,:id_utilisateur)");
			$req->execute(array(':titre'=>$titre,':numero'=>$numero,':date_publier'=>$date_ajouter,':date_supprimer'=>$date_supprimer,':categorie'=>$categorie,':prix'=>$prix,':surface'=>$surface,':autre_details'=>$autreDetail,':adresse'=>$adresse,':id_utilisateur'=>$id_utilisateur));
            $last_id = $bdd->lastInsertId();
            include 'upload.php';
            $_SESSION['success']="La création d'une annonce est bien passé";
            header("Location: ajouter_annonce.php");
}else{
    $_SESSION['Error']="!! Veuillez remplir tous les champs !!";
    header('Location:ajouter_annonce.php');
}

?>
