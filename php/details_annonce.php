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
    <title>Details Annonce</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/annonce_style.css">
    <link rel="stylesheet" href="../css/newhome_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<section class="annonces" id="annonces"  style=" margin-top:-5%;">
        <h1 class="title-apropos">Détails de l'annonce</h1>
        <div class="nosannonces_contenu">
            <div class="box">
                <div class="slideshow-container">
                <?php
                        $bdd = connexionBD();
                        
                        if(isset($_POST["lire_plus"])){
                          $V=$_POST['id'];   
                          $stmt = $bdd->prepare("SELECT * FROM annonces where id_annonce=:id ");
                          $stmt->execute(array(':id'=>$V));
                          // set the resulting array to associative
                          $result =$stmt->fetchAll();
                                     
                            $sear_img=$bdd->prepare("SELECT * FROM images where id_annonce=:id");
                            $sear_img->execute(array(':id'=>$V));
                            // set the resulting array to associative
                            $result_image =$sear_img->fetchAll();
                            foreach($result_image as $image){
                              images_details($image["image_nom"]);
                  
                            }
                         }
                ?>
                    </div>
                    <br>

                    <div style="text-align:center">
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                    </div>
        </div>
                        </div>
    </section>
    <?php
    foreach($result as $annonce)
    details_annonce($annonce["categorie"],$annonce["prix"],$annonce["surface"],$annonce["Autre_details"],$annonce["numero"],$annonce["titre"],$annonce["date_ajouter"],$annonce["Adresse"])
    ?>
    <script type="text/javaScript" src="../js/annonces.js"></script>

</body>
</html>