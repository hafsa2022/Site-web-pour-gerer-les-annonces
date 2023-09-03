<?php
require_once("lesComposantes.php");
include 'connexionBD.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewHome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/newhome_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <header class="he" id="header" style=" height: 70px;">
        <a href="#" class="logo"><span>N</span>ew<span>H</span>ome</a>
        <ul class="navbar" id="">
            <li><a href="#">Accueil</a></li>
            <li><a href="#a-propos">A propos</a></li>
            <li><a href="#nos-annonces">Nos Annonces</a></li>
            <li><a href="#avis">Avis</a></li>
            <li><a href="#contact">Contactez-nous</a></li>
            <li><a href="connexion.php" class="connecter"  >Connecter</a></li>
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
    <script type="text/javaScript" src="../js/annonce_script.js"></script>
    <section class="title" id="title">
        <div class="contenu">
            <div class="bottons">
            <button type="submit" class="btn-aceuil" ><a href="ajouter_avis.php" >Ajouter un avis</a></button>
            <button type="submit" class="btn-aceuil" ><a href="connexion.php" >Déposer une annonce</a></button>
            </div>
            <h3>Toujours</h3>
            <h2>Nous restons le meilleur choix pour trouver votre meilleur espace </h2>

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
            <button type="submit" class="btChercher" value="chercher" >Chercher</button>
            </form>
        </div>
            
        </div>
    </section>
 
     
      <script type="text/javaScript" src="../js/annonce_script.js"></script>
      <div id="id05" class="modal"  >
        <form class="modal-content animate"  method="post" style="height:70% ;width:50%; padding:15px" action="ajouterAvis.php">
          <div class="titrecontainer">
            <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 class="avatar">Un nouvel avis,YAAA!</h2>
          </div>
          <div class="container" >
          <label for="nomComplet"><b>Nom Complet</b></label>
            <input type="text" placeholder="Entrer le nom complet" name="nom" required>
          <label for="">Message</label>
             <textarea name="avis" id="" cols="30" rows="10"></textarea>
            </div>
            <div>  <button type="button" onclick="document.getElementById('id05').style.display='none'" class="btn">Annuler</button>
            <button type="button" class="btn"><a href="ajouter_annonce.php" style="color:#fff;text-decoration:none">Ajouter</a></button>
        </div>
        </form> 
      </div>
      <!--A proppos de nous -->
      <section id="a-propos">
        <h1 class="title-apropos">à propos</h1>
        <div class="img-desc">
            <div class="left">
                <img src="../images/image10.jpg" alt="">
            </div>
            <div class="right">
                <h3>Nous cherchons le meilleur pour vous </h3>
                <p>NewHome faite pour faciliter votre vie</p>
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
    	<!-- vérification de l'égalité des deux mots de passe saisis -->
    <script>
        function myFunction(x) {
          var menu =document.querySelector('.navbar');
          x.classList.toggle("change");
          menu.classList.toggle("responsive");
        }

    </script>
 
</body>
</html>