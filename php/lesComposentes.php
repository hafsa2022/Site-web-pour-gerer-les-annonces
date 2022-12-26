<?php
function component_annonce($image,$titre,$prix,$categorie,$surface,$adresse,$date,$annonce_id){
    $v=$annonce_id;
    
    $element="
    <div class=\"box\">
    <img src=\"$image\">
    <div class=\"content-annonces\">
        <form method=\"POST\" action=\"details_annonce.php\">
            <h4>$titre</h4>
            <p>$prix</p>
            <p>$categorie</p>
            <p>$surface</p>
            <p>$adresse</p>
            <p>$date</p>
            <button type=\"submit\" name=\"lire_plus\" class=\"btn_annonce\" >Lire Plus</button>
            <input type=\"text\" name=\"id\" value=\"$v\" />
        </div>
    </form>
</div>
";

echo $element;
}
function component_annonce_personnel($image,$titre,$prix,$categorie,$surface,$adresse,$date,$annonce_id){
    $v=$annonce_id;
    $element="
    <div class=\"box\">
    <img src=\"$image\">
    <div class=\"content-annonces\">
        <form method=\"POST\" action=\"modifier_annonce.php\">
            <h4>$titre</h4>
            <p>$prix</p>
            <p>$categorie</p>
            <p>$surface</p>
            <p>$adresse</p>
            <p>$date</p>
            <button type=\"submit\" name=\"modifier_annonce\" class=\"btn_annonce\" >Modifier</button>
            <input type=\"text\" name=\"id_number\" value=\"$v\" />
        </div>
    </form>
</div>
";

echo $element;
}
function component_avis($avis,$nom,$date){
    $element="
    <div class=\"boxavis\" >
    <div class=\"text\">
        <p>$avis</p>
        <h6>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"far fa-star\"></i>
        </h6>
        <h3>$nom</h3>
        <h3>$date</h3>
    </div>
</div>
";
echo $element;
}
function images_details($image){
    $element="
    <div class=\"mySlides fade\">
    <img src=\"$image\" style=\"width:100%\">
  </div>";
  echo $element;
}
function details_annonce($categorie,$prix,$surface,$autre_details,$num,$email,$date_ajouter,$adresse){
    $element="<section id=\"infos\" style=\"height:500px;\">
    <h1 class=\"title-apropos\" style=\"margin-bottom:20px;margin-top:-5%;font-size:200;color:#000\">$email</h1>
    <form action=\"detailsAnnonce.php\">
        <div class=\"left-right\">
            <div class=\left\">
                <label >Catégorie : </label>
                <p style=\"color:#000\">$categorie</p>
                <label >Prix : </label>
                <p style=\"color:#000\">$prix</p>
                <label >Surface en m^2 : </label>
                <p style=\"color:#000\">$surface</p>
                <label >Autre Details : </label>
                <p style=\"color:#000\">$autre_details</p>
                <label>Numéro : </label>
               <p style=\"color:#000\">$num</p>
               <label >Date : </label>
               <p style=\"color:#000\">$date_ajouter</p>
               <label >Adresse : </label>
               <p style=\"color:#000\">$adresse</p>
           </div>
        </div>
        <button >Contacter</button>
    </form>
</section>";
echo $element;
}


?>