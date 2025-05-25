<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #ffffff);
        }
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<div class="container row">
    <p class="right text-end">
        <a href="dashboard.php" class="btn btn-outline-primary">Admin</a>
    <h1 class="text-center mb-5">🏠 Bienvenue sur la page d'accueil</h1>     
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">📅 Réservation d'aide</h5>
                    <p class="card-text">Accédez à la page pour réserver une aide.</p>
                    <a href="reserver_materiel.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">📦 Liste du matériel</h5>
                    <p class="card-text">Voir et gérer l'inventaire des matériels.</p>
                    <a href="liste_materiel.php" class="btn btn-success">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">🏛️ Liste des salles</h5>
                    <p class="card-text">Consulter et réserver les salles disponibles.</p>
                    <a href="liste_salle.php" class="btn btn-warning">Accéder</a>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['role'])) : ?>
        <div class="text-center mt-5">
            <a href="..\php\logout.php" class="btn btn-outline-danger">Se déconnecter (<?= htmlspecialchars($_SESSION['role']) ?>)</a>
        </div>
    <?php else : ?>
        <div class="text-center mt-5">
            <a href="..\php\login.php" class="btn btn-outline-primary">Se connecter</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
