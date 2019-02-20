<?php

require("bdd.php");

//Pensez à vérifier sur chaque page que l'utilisateur est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) :

    $id = $_GET['idProject'];

    $query = $pdo->prepare("DELETE FROM projets where id=?");
    $query->execute([$id]);


endif;