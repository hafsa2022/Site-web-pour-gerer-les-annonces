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
    <title>Ajouter un nouveau Avis !</title>
</head>
<body>
<header class="he" style="background-color: #a7f0aa; height: 70px;">
        <a href="newhome.php" class="logo"><span>N</span>ew<span>H</span>ome</a>
    </header>

<div class="div_form">
<form class="modal-content animate"  method="post"  action="ajouter_avis_script.php">
<div class="titrecontainer">
            <h2 class="avatar">Un nouvel avis,YAAA!</h2>
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
  

          <div class="container" >
          <label for="nom">Nom Complet</label>
            <input type="text" placeholder="Entrer le nom complet" name="nom" required>
          <label for="message">Message</label>
             <textarea name="message" id="" cols="30" rows="10" required></textarea>
             <button type="submit" class="btn">Ajouter Un Avis </button>
            </div>
</form> 
</div>
</body>
</html>