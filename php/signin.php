<?php
require_once 'config.php'; // Connexion PDO

// Vérifier que le formulaire a été soumis en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer et sécuriser les données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = filter_var(trim($_POST['courriel']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Vérifications de base
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {
        die("Tous les champs sont requis.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse email invalide.");
    }

    if ($password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    if (strlen($password) < 6) {
        die("Le mot de passe doit contenir au moins 6 caractères.");
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Vérifier si l'email existe déjà
        $check = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
        $check->execute([':email' => $email]);

        if ($check->rowCount() > 0) {
            die("Un compte avec cette adresse email existe déjà.");
        }

        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) 
                               VALUES (:nom, :prenom, :email, :mot_de_passe, :role)");

        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':mot_de_passe' => $hashed_password,
            ':role' => $role
        ]);

        echo "✅ Inscription réussie !";
        header( "Location: ../index.php?success=1");

        // Redirection possible :
        // header("Location: success.php");
        // exit;

    } catch (PDOException $e) {
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }
} else {
    echo "Accès non autorisé.";
}
?>
