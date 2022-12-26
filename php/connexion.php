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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>
  <div class="div_form">
  <form class="modal-content animate" action="connexion_script.php" method="POST" style="height:100%">
          <div class="titrecontainer">
 
            <h2 class="avatar">Connexion</h2>
          </div>
        <?php
        if( isset($_SESSION['error']) && !empty($_SESSION['error'])) 
        { ?>
          <p class="message-erreur" >
           <?php echo $_SESSION['error'];
            session_destroy();
            ?>
          </p>
        <?php   
        }
        ?>
 
      
          <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Entrer l'email" name="email" required>

      
            <label for="pass"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="pass" required>

            <span class="psw" ><a href="#" style="color:rgb(206, 192, 0);text-decoration: none;">Mot de passe oublie ?</a></span>
            <button type="submit" class="bt" >Se connecter</button>

  
            <label>
              <input type="checkbox" checked="checked" name="remember">Reste Connecter
            </label>

            <a href="inscription.php"  class="create">Créer un compte ?</a>
          </div>
        </form>
  </div>

</body>
</html>