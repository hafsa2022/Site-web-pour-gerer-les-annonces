<?php
session_start();
if(isset($_POST['btn_modifier'])){
    if(isset($_POST['actuelle_mdp'],$_POST['nouveau_mdp'],$_POST['confirmer_nouveau_mdp']) && !empty($_POST['actuelle_mdp']) && !empty($_POST['nouveau_mdp']) && !empty($_POST['confirmer_nouveau_mdp'])){
        $act_mdp=$_POST['actuelle_mdp'];
        $nouv_mdp=$_POST['nouveau_mdp'];
        $conf_nouv_mdp=$_POST['confirmer_nouveau_mdp'];
        if($nouv_mdp==$conf_nouv_mdp){
            $servname = '127.0.0.1';
            $dbname = 'site_gestion_annonces';
            $user = 'root';
            $pass = '';
             try {
                 $bdd = new PDO('mysql:host='.$servname.';dbname='.$dbname, $user, $pass);
             }
             catch (Exception $e) {
                 die('Erreur : '.$e->getMessage());
             }
            //chercher le mot de passe dans le tableau
            $req = $bdd->prepare('SELECT mdp FROM utilisateurs WHERE  mdp = :password AND nom=:nom_uti');
            $req->execute(array(
                'password' => $act_mdp,'nom_uti'=>$_SESSION["username"][0]));
            $resultat = $req->fetchAll();
            foreach($resultat as $utilisateur){
                $req = $bdd->prepare('UPDATE utilisateurs SET mdp=:nouv_mdp WHERE  mdp =:act_mdp');
                $req->execute(array(
                    'nouv_mdp' => $nouv_mdp,'act_mdp'=>$utilisateur["mdp"]));
                $resul = $req->fetch();
                $_SESSION['success']= "le mot de passe est bien changer";
                header('Location: modifier_mdp.php');  
            }

        }else{
            $_SESSION['err_modifier_mdp']= "les deux mots de passes sont différentes";
        }
    }else{
        $_SESSION['err_modifier_mdp']= "remplir tous les champs ";
    }
}
?>