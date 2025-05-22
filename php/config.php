<?php
// Informations de connexion
$host = 'localhost';      // Hôte, généralement localhost
$dbname = 'base_site_reservation';  // Nom de la base de données
$user = 'root';   // Nom d'utilisateur MySQL
$password = '';  // Mot de passe MySQL

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Facultatif : désactiver l'émulation des requêtes préparées
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) {
    // En cas d'erreur, afficher un message
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
