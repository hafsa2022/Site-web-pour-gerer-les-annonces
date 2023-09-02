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
    <title>my inscription</title>
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<div class="div_form">
    
<form class="modal-content animate" action="inscription_script.php" method="post" >
  <div class="titrecontainer">
    <h2 class="avatar">Inscription</h2>
  </div>

  <?php
        if(isset($_SESSION['err'])) 
        { ?>
          <p class="message-erreur" >
           <?php echo $_SESSION['err'];
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
  <label for="nomComplet"><b>Nom Complet (au moins 4 caractères)</b></label>
  <input type="text" placeholder="Entrer le nom complet" name="nom" id="nom" pattern="{4,}"   required>



    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Entrer l'email" name="email" id="email"  required>


    <label for="pass"><b>Mot de passe (au moins 6 caractères) </b></label>

    <input type="password" placeholder="Entrer le mot de passe" name="pass" id="password" pattern="{6,}"  required>

    <label for="repass"><b>Confirmer le mot de passe</b></label>

    <input type="password" placeholder="Confirmer le mot de passe" name="repass" id="repeatpassword"  required>

    <label for="pays"><b>Le pays</b></label>
    <input type="text" placeholder="pays" name="pays" required>

    <button type="submit" class="en" name="botton_en" >S'inscrire</button>
    <label>
        <input type="checkbox" checked="checked" name="accepter">J'accepte tous les conditions.
      </label>
      <a href="connexion.php" class="con_botton" >Connexion ?</a>
  </div>
</form>
</div>
</body>
</html>