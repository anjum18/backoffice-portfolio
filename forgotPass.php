<?php require "bdd.php"; ?>

<form action="" method="POST">
    <input type="email" name="email">
    <input type="submit">
</form>

<?php


if(isset($_POST['email'])) { //Si le formulaire a été envoyé

    //On récupère l'user correspondant à l'email dans la base. L'email vient de l'utilisateur donc dans le doute, prepare-execute
    $user = $pdo->prepare("SELECT * FROM users WHERE email=?;");
    $user->execute([$_POST['email']]);

    if($user) { //Si on a trouvé un user correspondant à l'email
        $token = bin2hex(random_bytes(16)); //On génère un token unique et impossible à deviner
        $date = new \DateTime(); //On crée un objet datetime qui contendra la moment précis de l'exécution du script
        $date->modify("+30 minutes"); //On ajoute 30 minutes à la date courante

        $date = $date->format('Y-m-d H:i:s'); //On convertit l'objet datetime en string pour stockage en base


        //On enregistre le token unique etla date d'expiration dans la BDD
        $query = $pdo->prepare("UPDATE users SET token=?, expire_date=? WHERE email=?;"); 
        $query->execute([$token,$date,$_POST['email']]);


        //On envoie un mail contenant le lien vers la page resetPass.php avec le token en get.
        mail($_POST['email'], "mdp oublié", "<a href='http://localhost/backoffice/resetPass.php?token=" . $token . "'></a>");


    }
    else {
        echo "email inconnu"; //Il vaut mieux ne rien dire si l'email n'est pas dans la base pour donner le moins d'info possible aux hackers potentiels, mais pour l'exemple et le debug je mets ce message
    }

}