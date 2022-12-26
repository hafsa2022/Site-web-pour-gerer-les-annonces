<?php	
if (isset($_POST["send"])) {
	$nom = htmlspecialchars($_POST['nom']);	
	$email = htmlspecialchars($_POST['email']);	
	$objet = htmlspecialchars($_POST['objet']); 
	$message = htmlspecialchars($_POST['message']);							
	$destinataire = 'h.hafsaelakhdar@gmail.com';	
    // CRLF Injection attack protection
    //$nom = strip_crlf($nom);
    //$email = strip_crlf($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
        $mailHeaders = "From: " . $nom . "<" . $email . ">\r\n";
        if (mail($destinataire,$nom,$objet,$message,$mailHeaders))  // envoi du mail réussit
	{ 
		header("Location:newhome.php?envoi du mail réussit"); 
	} 
	else // échec de l'envoi du mail
	{ 
		header("Location:newhome.php? échec de l'envoi du mail");
	} 
    }
}	
	
?>
