<?php

session_start();

try {
    $user = "root";
    $pass = "L0Z8E9kF";
    $pdo = new PDO('mysql:host=localhost;dbname=backoffice', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
