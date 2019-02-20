<?php require 'bdd.php'; ?>
<a href="logout.php">Déconnexion</a>
<h1>Bonjour <?=$_SESSION['email']?></h1>
<form action="connexion.php" method="POST">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" value="Connexion">
</form>

<ul>
<?php
//Si on a un id dans $_SESSION, la connexion a réussi, on peut afficher le backoffice
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) :

$projets = $pdo->query("SELECT id,titre FROM projets");


foreach ($projets as $key => $projet) : ?>
    <li><form action="deleteProject.php" method="POST">
        <h2><?=$projet['titre']?></h2>
        <input type="hidden" name="idProjet" value="<?=$projet['id']?>">
        <input type="submit" value="supprimer">
        <a href="deleteProject.php?idProject=<?=$projet['id']?>">test</a>
    </form></li>
<?php endforeach;
endif;

?>
</ul>



