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
    <link rel="stylesheet" href="../css/style.css">
    <title>Modifier une annonce !!!</title>
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome_principale.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<div class="div_form">
    
<form class="modal-content animate" action="modifier_annonce_script.php" method="post" >
  <div class="titrecontainer">
    <h2 class="avatar">Modifier une annonce !!!</h2>
  </div>
  <?php
        if(isset($_SESSION['err'])) 
        { ?>
          <p class="message-erreur" >
           <?php echo $_SESSION['err_modifier_mdp'];
            session_destroy();
            ?>
          </p>
        <?php   
        }
        ?>
  <?php
        if(isset($_SESSION['success'])) 
        { ?>
          <p class="message_success" >
           <?php echo $_SESSION['success'];
            session_destroy();
            ?>
          </p>
        <?php   
        }
        ?>
  <div class="container">
    <?php if(isset($_POST['modifier_annonce'])){
      $bdd = connexionBD();
      $V=$_POST['id_number'];
      $_SESSION['id_number']=$V;
      $req = $bdd->prepare('SELECT * FROM annonces WHERE  id_annonce=:id');
      $req->execute(array(
          'id' => $V));
      $resultat = $req->fetchAll();
      $req2 = $bdd->prepare('SELECT image_nom FROM images WHERE  id_annonce=:id');
      $req2->execute(array(
          'id' => $V));
      $resultatimages = $req2->fetchAll();
      foreach($resultat as $annonce){
      ?>
     <label for="">Titre</label>
                   <input type="text" name="titre"  value="<?php echo $annonce['titre']?>" required>
                   <label for="">Numéro</label>
                   <input type="text" name="numéro" value="<?php echo $annonce['numero']?>" required>
                   <label for="">Date de publier</label>
                   <input type="date" name="date_publier" value="<?php echo $annonce['date_ajouter']?>" required>
                   <label for="">Date de supprimer</label>
                   <input type="date" name="date_supprimer" value="<?php echo $annonce['date_supprimer']?>" required>
                   <label for="catégories">Catégories</label>
                    <select id="catégories" name="catégories" value="<?php echo $annonce['categorie']?>"  required>
                        <option value="Maison" name="" value="1" >Maison</option>
                        <option value="Appartement" name="" value="2" >Appartement</option>
                    </select><br>
                  <!--
                   <label for="">Les images</label><br>
                   <?php
                  //  foreach($resultatimages as $img){
                  //   ?>
                     <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="file1"  value="<?php echo $img['image_nom']?>"  required><br><?php
                  //  echo $img['image_nom'];
                  // }
                   ?>
                   !-->
                    <label for="">Prix</label>
                   <input type="text" name="prix" value="<?php echo $annonce['prix']?>"  required>
                   <label for="">Surface</label>
                   <input type="text" name="surface" value="<?php echo $annonce['surface']?>"  required>
                   <label for="">Autre Details</label>
                    <textarea name="autre_details" id="autre_details" cols="30" rows="10" onclick="changer() " ></textarea>
                   <label for="adresse">Adresse</label>
                   <input type="text" name="adresse" value="<?php echo $annonce['Adresse']?>" required>
                   <input type="text" name="id_annonce" value="<?php echo $V?>"  style="visibility:hidden">
                   <!-- <iframe name="adresse" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103599.60818020605!2d-5.904510105499951!3d35.76339324542842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTanger!5e0!3m2!1sfr!2sma!4v1659708842923!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" required></iframe> -->
                    <button type="submit" class="btn" name="modifier_annonce">Modifier l'annonce</button><?php
    }}?>

  </div>
</form>
</div>

<script>
  function changer(){
    document.getElementById("autre_details").value="<?php echo $annonce['Autre_details']?>"
  }
</script>
    
</body>
</html>