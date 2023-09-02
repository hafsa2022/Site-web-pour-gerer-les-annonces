<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ajouter une nouvelle annonce !</title>

</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<div class="div_form" >
        <form class="modal-content animate"  method="post"  action="ajouter_annonce_script.php" enctype="multipart/form-data">
          <div class="titrecontainer">
            <h2 class="avatar">Une nouvelle annonce,YAAA!</h2>
          </div>

          
  <?php


            if(isset($_SESSION['imageError']) && !empty($_SESSION['imageError'])){?>
                <p class="message-erreur">
                <?php
                echo $_SESSION['imageError'];
                session_destroy();
                ?></p><?php
            } else if (isset($_SESSION['imageError2']) && !empty($_SESSION['imageError2'])){?>
                <p class="message-erreur">
                <?php
                echo $_SESSION['imageError2'];
                session_destroy();
                ?></p><?php
            } else if (isset($_SESSION['imageError3']) && !empty($_SESSION['imageError3'])){?>
                <p class="message-erreur">
                <?php
                echo $_SESSION['imageError3'];
                session_destroy();
                ?></p><?php
            } else if (isset($_SESSION['imageError4']) && !empty($_SESSION['imageError4'])){?>
                <p class="message-erreur">
                <?php
                echo $_SESSION['imageError4'];
                session_destroy();
                ?></p><?php
            }?>
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
                    <label for="">Titre</label>
                   <input type="text" name="titre" id="titre" required>
                   <label for="">Numéro</label>
                   <input type="text" name="numéro" id="" required>
                   <label for="">Date de publier</label>
                   <input type="date" name="date_publier" id="date_publier" required>
                   <label for="">Date de supprimer</label>
                   <input type="date" name="date_supprimer" required>
                   <label for="catégories">Catégories</label>
                    <select id="catégories" name="catégories" id="categorie" required>
                        <option value="Maison" name="" value="1" >Maison</option>
                        <option value="Appartement" name="" value="2" >Appartement</option>
                    </select><br>
                   <label for="">Les images</label><br>
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="file1"   required><br>
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="file2"   required><br>
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="file3"   required><br>
                    <input type="file" accept=".jpg, .jpeg, .png" style="width:49%;margin-bottom:3px" name="file4"  id="image_4" required><br>
                    <label for="">Prix</label>
                   <input type="text" name="prix" id="prix" required>
                   <label for="">Surface</label>
                   <input type="text" name="surface" id="surface" required>
                   <label for="">Autre Details</label>
                    <textarea name="autre_details"  cols="30" rows="10" id="autre_details"></textarea>
                   <label for="adresseX">Adresse</label>
                   <input type="text" id="adresse" name="adresse"  >
                   
                    <button type="submit" class="btn" name="ajouter_annonce">Ajouter Une annonce</button>
                </div>
        </form> 
      </div>
</body>
</html>