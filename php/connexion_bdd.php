<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$bdd = "base_site_reservation";

try {

    $pdo = new PDO("mysql:host=$serveur; dbname=$bdd; charset=utf8", $utilisateur, $motdepasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussite a la base de données";
} catch (PDOException $e) {
    die ("Erreur de connexion". $e->getMessage());
}
?>