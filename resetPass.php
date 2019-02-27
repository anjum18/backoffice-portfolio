<?php require "bdd.php";

if(isset($_GET['token'])) : //Si il y a un token en get

    //On récupère l'user correspondant au token
    $query = $pdo->prepare('SELECT * FROM users where token=?;'); 
    $query->execute([$_GET['token']]);
    $user = $query->fetch();


    $date = new \DateTime(); //On crée un objet datetime vide, qui va donc contenir la date et le moment de l'exécution du script
    $expire_date = new \DateTime($user['expire_date']); //On crée un autre objet datetime à partir de la date d'expiration stockée en base

    //Comme on a deux objets datetime, ils sont facile à comparer. Si l'instant courant est plus tard que la date d'expiration, on arrête le script, la suite ne sera pas exécutée.
    if($date > $expire_date) {
        die("token expired");
    }
  
    ?>
    <!-- Si le script n'est pas entré dans le die() plus haut, on affiche le formulaire -->
    <form action="" method="POST">

        <input type="hidden" name="token" value="<?=$_GET['token']?>"><!-- Il faut passer le token à l'étape suivante, l'input caché est la méthode la plus simple -->
        <input type="password" name="password">
        <input type="password" name="password_confirm">
        <input type="submit">
    </form>

<?php endif;

if(isset($_POST['password'])) { //Si on a un password dans $_POST, c'est la deuxième étape, le formulaire a été envoyé, on set le nouveau mdp

    if($_POST['password'] === $_POST['password_confirm']) { //On vérifie que les 2 mdp correspondent

        $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); //On hash le nouveau mdp

        //On récupère l'user correspondant au token. On a juste besoin de la date d'expiration pour la vérifier
        $query = $pdo->prepare("SELECT expire_date FROM users WHERE token=?;");
        $query->execute([$_POST['token']]); 
        $user = $query->fetch();

        //Comme tout à l'heure, on vérifie que le token n'est pas expiré, si oui on arrête le script
        $date = new \DateTime();
        $expire_date = new \DateTime($user['expire_date']);
        if($date > $expire_date) {
            die("token expired");
        }

        //On set le nouveau mot de passe sur l'utilisateur et on efface le token
        $query = $pdo->prepare("UPDATE users set password=?, token=? WHERE token=?");
        $query->execute([$hashed_pass,"",$_POST['token']]);

    }
    else {
        echo "Les mots de passe ne correspondent pas";
    }

}