<?php
session_start();
$V=$_POST['id_annonce'];
include 'connexionBD.php';
$titre = htmlspecialchars($_POST['titre']);
$numero=htmlspecialchars($_POST['numéro']);
$date_publier=htmlspecialchars($_POST['date_publier']);
$date_supprimer=htmlspecialchars($_POST['date_supprimer']);
$categorie=htmlspecialchars($_POST['catégories']);
$prix=htmlspecialchars($_POST['prix']);
$surface=htmlspecialchars($_POST['surface']);
$adresse=htmlspecialchars($_POST['adresse']);
date_default_timezone_set('Africa/Casablanca');
$autreDetail=htmlspecialchars($_POST['autre_details']);
$date_ajouter=date("Y-m-d h:i:sa");
if(isset($_POST['modifier_annonce'])){
            $bdd = connexionBD();
			// insertion des données d'une nouvelle annonce dans la BD
			$req = $bdd->prepare("UPDATE `annonces` SET `titre`=:titre,`numero`=:numero,`date_ajouter`=:date_publier,`date_supprimer`=:date_supprimer,`categorie`=:categorie,`prix`=:prix,`surface`=:surface,`Autre_details`=:autre_details,`Adresse`=:adresse WHERE id_annonce=:id");
			$req->execute(array(':titre'=>$titre,':numero'=>$numero,':date_publier'=>$date_ajouter,':date_supprimer'=>$date_supprimer,':categorie'=>$categorie,':prix'=>$prix,':surface'=>$surface,':autre_details'=>$autreDetail,':adresse'=>$adresse,':id'=>$V));
            $last_id = $bdd->lastInsertId();
            $_SESSION['success']="La modification de cette annonce est bien passé";
            header("Location: modifier_annonce.php");
}else{
    $_SESSION['Error']="!! Veuillez remplir tous les champs !!";
    header('Location:modifier_annonce.php');
}

?>
