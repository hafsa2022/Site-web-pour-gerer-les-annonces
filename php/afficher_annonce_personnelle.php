<?php
require_once('lesComposantes.php');
include 'connexionBD.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/newhome_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<section id="nos-annonces"   style=" margin-top:8%;">
        <h1 class="title-apropos">Nos annonces</h1>
        <div class="content-annonces">
        <?php
                        $bdd = connexionBD();
                            if($_SESSION["nmb_annonce"]==0){
                                ?>
                                <p style="text-align:center; color:red;font-size:bold"><?php echo "!! il n'existe aucune annonce !!";?></p>
                                <?php
                            }else{   
                                $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE  nom = :nom');
                                $req->execute(array(
                                    'nom' => $_SESSION["username"][0]));//si on une seul username unique il ca marche
                                $id_utilisateur = $req->fetch()[0];
                                $req2=$bdd->prepare('SELECT * FROM annonces WHERE  id_utilisateur = :id_utilisateur');
                                $req2->execute(array(
                                    'id_utilisateur' => $id_utilisateur));
                                $result = $req2->fetchAll();   
                        foreach($result as $annonce) {
                            $sear_img=$bdd->prepare("SELECT * FROM images where id_annonce=:id");
                            $sear_img->execute(array(':id'=>$annonce["id_annonce"]));
                            // set the resulting array to associative
                            $result_image =$sear_img->fetchAll();
                            foreach($result_image as $image){
                                component_annonce_personnel($image["image_nom"],"newHome",$annonce["prix"],$annonce["surface"],$annonce["categorie"],$annonce["Adresse"],$annonce["date_ajouter"],$annonce["id_annonce"]);
                                break;
                            }
                        }                       
                        }

                        
                ?>
        </div>
      </section>


</body>
</html>