<?php
require_once '../php/config.php';
session_start();
// Liste des matériels
$stmt = $pdo->query("SELECT id, desgnation FROM materiel");
$materiels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Réservations de l'utilisateur
$stmt2 = $pdo->prepare("SELECT r.*, m.desgnation FROM reservation r 
                        JOIN materiel m ON r.id_materiel = m.id 
                        WHERE r.id_utilisateur = :uid 
                        ORDER BY r.date_emprunt DESC");
$stmt2->execute([':uid' => $_SESSION['user_id']]);
$reservations = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
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
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'agent'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="liste_reservation.php">liste reservation</a>
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
<div class="container mt-5">
    <h4>Mes Réservations</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Matériel</th>
                <th>Quantité</th>
                <th>Date Emprunt</th>
                <th>Heure</th>
                <th>Date Rendu</th>
                <th>Heure</th>
                <th>Durée</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($reservations) === 0): ?>
            <tr><td colspan="8" class="text-center">Aucune réservation.</td></tr>
        <?php else: ?>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['desgnation']) ?></td>
                    <td><?= $r['quantite'] ?></td>
                    <td><?= $r['date_emprunt'] ?></td>
                    <td><?= $r['heur_emprunt'] ?></td>
                    <td><?= $r['date_rendu'] ?></td>
                    <td><?= $r['heur_rendu'] ?></td>
                    <td><?= $r['duree'] ?> j</td>
                    <td><span class="badge bg-<?= $r['statut'] === 'validée' ? 'success' : ($r['statut'] === 'refusée' ? 'danger' : 'warning') ?>">
                        <?= htmlspecialchars($r['statut']) ?>
                    </span></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="acceuil.php" class="btn btn-secondary">Retour</a>
</div>
</body>
</html>
