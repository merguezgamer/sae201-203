<?php
session_start();
require_once 'config.php'; // Connexion à la base de données

// Vérification si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et nettoyage des données du formulaire
    $email = filter_var(trim($_POST['courriel']), FILTER_SANITIZE_EMAIL); // On s'assure que l'email est propre
    $password = $_POST['password']; // Mot de passe en clair

    // Validation des champs
    if (empty($email) || empty($password)) {
        echo "Tous les champs sont requis."; // Affichage si les champs sont vides
        exit; // On arrête l'exécution si les champs sont vides
    }

    try {
        // Récupérer l'utilisateur correspondant à l'email
        $stmt = $pdo->prepare("SELECT id, nom, prenom, email, mot_de_passe, role FROM utilisateurs WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère les données de l'utilisateur
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            // Connexion réussie : on initialise les variables de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                
            // Redirection vers la page d'accueil ou tableau de bord
            header("Location: ..\html\dashboard.php"); // À adapter selon la page que tu souhaites rediriger
            exit; // On arrête l'exécution après la redirection
            }else{
                // Redirection vers la page d'accueil ou tableau de bord
                header("Location: ../Html/inscription.php"); // À adapter selon la page que tu souhaites rediriger
                exit; // On arrête l'exécution après la redirection
            }
        } else {
            // Si les identifiants sont incorrects
            echo "<div class='alert alert-danger'>Identifiants incorrects.</div>";
        }

    } catch (PDOException $e) {
        // Gestion des erreurs avec la base de données
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

} else {
    // Si la méthode n'est pas POST
    echo "Accès interdit.";
}
?>
