<?php require("bdd.php");

?>

<form action="" method="post">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" value="Connexion">
</form>

<?php if(isset($_POST['email'])) {

    $email = $_POST['email'];
    $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //On stock le mdp crypté avec password_hash et surtout pas le mdp en clair
    $query = $pdo->prepare("INSERT INTO users (email,password) VALUES (?,?);");
    $query->execute([$email,$hashed_pass]);


}