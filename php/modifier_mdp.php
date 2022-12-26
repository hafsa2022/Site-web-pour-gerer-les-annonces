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
    <link rel="stylesheet" href="style.css">
    <title>Changer le mot de passe</title>
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome_principale.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
<div class="div_form">
    
<form class="modal-content animate" action="modifier_mdp_script.php" method="post" >
  <div class="titrecontainer">
    <h2 class="avatar">Changer le mot de passe !!!</h2>
  </div>

  <?php
        if(isset($_SESSION['err_modifier_mdp'])) 
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
    <label>Entrer votre mot de passe actuelle :</label>
    <input type="password" name="actuelle_mdp" required>
    <label>Entrer le nouveau mot de passe :</label>
    <input type="password" name="nouveau_mdp" required>
    <label>Confirmer le nouveau mot de passe :</label>
    <input type="password" name="confirmer_nouveau_mdp" required>
    <button type="submit" class="btn_modi" name="btn_modifier">Changer le mot de passe !</button>
  </div>
</form>
</div>
</body>
</html>