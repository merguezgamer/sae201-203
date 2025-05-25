<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="acceuil.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="reserver_materiel.php">Réserver</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_materiel.php">Matériel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_salle.php">Salles</a>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Admin</a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['role'])): ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light ms-2 bg-light" href="..\php\logout.php">Déconnexion</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light ms-2" href="..\php\login.php">Se connecter</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <h1 class="text-center mb-5"> Portail de reservation</h1>
    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Réserver</h5>
                    <p class="card-text">Réservez du matériel facilement.</p>
                    <a href="reserver_materiel.php" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Liste du matériel</h5>
                    <p class="card-text">Consultez tout le matériel disponible.</p>
                    <a href="liste_materiel.php" class="btn btn-success">Voir le matériel</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Liste des salles</h5>
                    <p class="card-text">Consultez les salles disponibles.</p>
                    <a href="liste_salle.php" class="btn btn-warning text-white">Voir les salles</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Mes réservations</h5>
                    <p class="card-text">Voir toutes vos réservations.</p>
                    <a href="mes_reservations.php" class="btn btn-info text-white">Mes réservations</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
