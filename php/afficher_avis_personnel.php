<?php
require_once('lesComposentes.php');
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
    <link rel="stylesheet" href="annonce_style.css">
    <link rel="stylesheet" href="newhome_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
 <section class="avis" id="avis"    style=" margin-top:8%;" >
        <h1 class="title-apropos">Vos Avis</h1>
        <div class="contenu" style="">
        <?php
                                $bdd = connexionBD();
                                    if($_SESSION["nmb_avis"]==0){?>
                                    <p><?php echo "!! il n'existe aucune avis !!";?></p>
                                    <?php
                                    }else{   
                                        $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE nom = :nom');
                                        $req->execute(array(
                                            'nom' => $_SESSION["username"][0]));//si on une seul username unique il ca marche
                                        $id_utilisateur = $req->fetch()[0];
                                        $req2=$bdd->prepare('SELECT * FROM avis WHERE  id_utilisateur = :id_utilisateur');
                                        $req2->execute(array(
                                            'id_utilisateur' => $id_utilisateur));
                                        $resultat = $req2->fetchAll();                             
                                foreach($resultat as $avis){component_avis($avis["personne_nom"],$avis["message"],$avis["date_ajouter"]);}
                                }

?>
</div>
</section>


</body>
</html>