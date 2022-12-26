<?php
session_start();
require_once("lesComposentes.php");
include 'connexionBD.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewHome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="newhome_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

.navbar > .l {
        float: left;
        width: 100px;
        height: 40px;
        line-height: 40px;
        background-color: #a7f0aa;
        cursor: pointer;
        font-size: 14px;
      }
      .sub-menu {
        transform: scale(0);
        transform-origin: top center;
        transition: all 300ms ease-in-out;
      }
      .sub-menu .d {
        font-size: 14px;
        width: 250px;
        background: #a7f0aa;
        padding: 8px 0;
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        transform: scale(0);
        transform-origin: top center;
        transition: all 300ms ease-in-out;
      }
      .sub-menu .d  a{
          color:#fff
      }
      .sub-menu .d  a:hover{
          color:#fff;
          border-bottom:none
      }
      .sub-menu .d:last-child {
        border-bottom: 0;
      }
      .sub-menu .d:hover {
        background: black;

      }
      .navbar > .l:hover .sub-menu .d {
        transform: scale(1);
      }
      .navbar > .l:hover .sub-menu {
        transform: scale(1);
      }

    </style>
</head>
<body>
    <header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="#" class="logo"><span>N</span>ew<span>H</span>ome</a>
        <ul class="navbar" id="" style="margin-top:20px">
            <li><a href="#">Accueil</a></li>
            <li><a href="#a-propos">A propos</a></li>
            <li><a href="#nos-annonces">Nos Annonces</a></li>
            <li><a href="#avis">Avis</a></li>
            <li><a href="#contact">Contactez-nous</a></li>
            <li class="l"  ><a href="#" calss="deroulant"><img src="images/imagicon.png" class="" alt="" style="border-radius:50%;display:inline-block;width:50px;height:50px;margin-top:-14px" ></a>
                <ul class="sub-menu" > 
                    <li class="d"><a href="#" ><?php  echo "Bienvenu ".$_SESSION["username"][0];?></a></li>
                    <li class="d"><a href="modifier_mdp.php">Modifier le mot de passe</a></li>
                    <li class="d" name="annonce_personnel"><a href="afficher_annonce_personnelle.php"><?php $bdd = connexionBD();
                                                $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE  nom = :nom');
                                                $req->execute(array(
                                                    'nom' => $_SESSION["username"][0]));
                                                $resultat = $req->fetch()[0];
                                                $req2=$bdd->prepare('SELECT id_annonce FROM annonces WHERE  id_utilisateur = :id_utilisateur');
                                                $req2->execute(array(
                                                    'id_utilisateur' => $resultat));
                                                $resultat2 = $req2->fetchAll();
                                                $_SESSION["nmb_annonce"]=count($resultat2);
                                                echo "Vos annonces (".$_SESSION["nmb_annonce"].")";?></a></li>
                    <li class="d" name="avis_personnel"><a href="afficher_avis_personnel.php"><?php $bdd = connexionBD();
                                                $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE  nom = :nom');
                                                $req->execute(array(
                                                    'nom' => $_SESSION["username"][0]));
                                                $resultat = $req->fetch()[0];
                                                $req2=$bdd->prepare('SELECT id_avis FROM avis WHERE  id_utilisateur = :id_utilisateur');
                                                $req2->execute(array(
                                                    'id_utilisateur' => $resultat));
                                                $resultat2 = $req2->fetchAll();
                                                $_SESSION["nmb_avis"]=count($resultat2);
                                                echo "Vos avis (".$_SESSION["nmb_avis"].")";?></a></li>
                    <li class="d"><a href="#"  onclick="document.getElementById('id03').style.display='block'">Déconnecter</a></li>
                </ul>
            </li>


        </ul>
        <a href="#" class="toggle-button" onclick="myFunction(this)">
            <span class="bar1"></span>
            <span class="bar2"></span>
            <span class="bar3"></span>
        </a>

    </header>
    <script >
        // When the user scrolls down 50px from the top of the document, resize the header's font size
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("header").style.backgroundColor = "#a7f0aa";
        } else {
            document.getElementById("header").style.backgroundColor = "transparent";
        }
        window.onload = function() {
        document.body.className += " loaded";
        }
        }
    </script>

    <script type="text/javaScript" src="annonce_script.js"></script>
    <section class="title" id="title">
        <div class="contenu">
            <div class="bottons">
                <button type="submit" class="btn-aceuil" ><a href="ajouter_avis.php" >Ajouter un avis</a></button>
                <button type="submit" class="btn-aceuil" ><a href="ajouter_annonce.php" >Déposer une annonce</a></button>
            </div>
            <h3>Toujours</h3>
            <h2>Nous restons le meilleur choix pour trouver  votre meilleur environnement </h2>

        <div class="find_bien">
            <form action="details_annonce.php" method="POST">
                <div>
                    <label>Pays</label>
                    <input type="text" placeholder="Entrez un Pays">
                </div>
                <div>
                    <label>Ville</label>
                    <input type="text" placeholder="Entrez une ville">
                </div>
                <div>
                    <label>Catégorie</label>
                    <input type="text" placeholder="Entrez une Catégorie">
                </div>
                <div>
                    <label>Budget</label>
                    <input type="text" placeholder="Entrez un Budget">
                </div>
            <button class="btChercher" >chercher</button>
            </form>
        </div>
            
        </div>
    </section>
    <div id="id03" class="modal" >
    <form class="modal-content animate"  method="post" style="height:30%">
          <div class="titrecontainer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 class="avatar">Déconnexion</h2>
          </div>
      
          <div class="containerConnecter">
          <label for="" style="margin-left:35px;margin-top:35px"><b>Vous voullez déconnecter ?</b></label>
        <div class="content_button">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn">Annuler</button>
         <button type="button" class="btn"><a href="deconnexion.php" style="color:#fff;text-decoration:none">Oui</a></button>
        </div>

          </div>
        </form> 
      </div>
      <script>
        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
       <div id="id04" class="modal"  >
        <form class="modal-content animate"  method="post" style="height:110% ;width:90%; padding:10px"   action="ajouter_annonce.php">
          <div class="titrecontainer">
            <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 class="avatar">Une nouvelle annonce,YAAA!</h2>
          </div>
          <div class="left-right">
                <div class="left" >
                   <label for="">Email</label>
                   <input type="text" name="email">
                   <label for="">Numéro</label>
                   <input type="text" name="numéro">
                   <label for="">Date de publier</label>
                   <input type="date" name="date_publier">
                   <label for="">Date de supprimer</label>
                   <input type="date" name="date_supprimer">
                   <label for="catégories">Catégories</label>
                    <select id="catégories" name="catégories" style="padding:8px;outline:0;border:1px solid #999;">
                        <option value="Maison" name="catégories">Maison</option>
                        <option value="Appartement" name="catégories">Appartement</option>
                        <option value="fiat" name="catégories">Fiat</option>
                    </select>
                    
                   <label for="">Ajouter les images</label>
                    <div style="display:inline-block ;padding-bottom:3px">
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="image1">
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="image2"><br>
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="image3">
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="image4">
                    </div>

               </div>
              <div class="right">
                    <label for="">Prix</label>
                   <input type="number" name="prix">
                   <label for="">Surface</label>
                   <input type="number" name="surface">
                   <label for="">Autre Deatils</label>
                    <textarea name="autre_details" id="" cols="30" rows="10"></textarea>
                   <label for="adresse">Adresse</label>
                   <iframe name="adresse" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103599.60818020605!2d-5.904510105499951!3d35.76339324542842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTanger!5e0!3m2!1sfr!2sma!4v1659708842923!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div>  <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn">Annuler</button>
            <button type="button" class="btn">Ajouter</button>
        </div>
        </form> 
      </div>
      
      <!--A proppos de nous -->
      <section id="a-propos">
        <h1 class="title-apropos">à propos</h1>
        <div class="img-desc">
            <div class="left">
                <img src="images/image10.jpg" alt="">
            </div>
            <div class="right">
                <h3>Nous cherchons le meilleur pour vous </h3>
                <p>MyTown faite pour faciliter votre vie</p>
                <a href="#">Lire Plus</a>
            </div>
        </div>
      </section>
   <!-- nos annonces-->
   <section id="nos-annonces">
        <h1 class="title-apropos">Nos annonces</h1>
        <div class="content-annonces">
        <?php
        $bdd = connexionBD();
        $stmt = $bdd->prepare("SELECT * FROM annonces ORDER BY id_annonce DESC LIMIT 6 ");
        $stmt->execute();
        // set the resulting array to associative
        $result =$stmt->fetchAll();


        foreach($result as $annonce) {
            $sear_img=$bdd->prepare("SELECT * FROM images where id_annonce=:id");
            $sear_img->execute(array(':id'=>$annonce["id_annonce"]));
            // set the resulting array to associative
            $result_image =$sear_img->fetchAll();
            foreach($result_image as $image){
                component_annonce($image["image_nom"],"newHome",$annonce["prix"],$annonce["surface"],$annonce["categorie"],$annonce["Adresse"],$annonce["date_ajouter"],$annonce["id_annonce"]);
                break;
            }

        }


        ?>
        </div>
      </section>
      <section class="avis" id="avis">
        <h1 class="title-apropos">Vos Avis</h1>
        <div class="contenu">
        <?php
        $bdd = connexionBD();
        $stmt = $bdd->prepare("SELECT * FROM avis ORDER BY id_avis DESC LIMIT 3 ");
        $stmt->execute();
        // set the resulting array to associative
        $result =$stmt->fetchAll();

        foreach($result as $avis) {
                component_avis($avis["personne_nom"],$avis["message"],$avis["date_ajouter"]);
               
        }

?>
     </div>
    </section>
    <section id="contact">
        <h1 class="title-apropos">Contactez-nous</h1>

        <form action="contact_script.php" method="post">
        <p style="color:red ;size:bold"> * Il faut que tous les champs sont rempli !</p>
            <div class="left-right">
                <div class="left">
                    <label for="">Nom Complet</label>
                    <input type="text"  name="nom" required>
                    <label for="">Email</label>
                    <input type="text"  name="email" style="margin-bottom:94px" required>
           
    </div>
              <div class="right">
                    <label for="">Objet</label>
                    <input type="text" name="objet" required>
                    <label for="">Message</label>
                    <textarea id="" cols="30" rows="5"  name="message" required></textarea>
               </div>
              </div>
            <button name="send">Envoyer</button>
        </form>
    </section>
    <footer>
        <p class="ft">Réalisée par <span>El Akhdar Hafsa</span> | Tous les droits sont réservés</p>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
    </footer>
    <script>
        function myFunction(x) {
          var menu =document.querySelector('.navbar');
          x.classList.toggle("change");
          menu.classList.toggle("responsive");
        }
    </script>

</html>