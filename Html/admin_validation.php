<?php
require_once '../php/config.php';
require_once '../php/validation.php'; // fichier où tu mets tes fonctions PHP

// verifier que l'utilisateur est un administrateur
verifierAdmin();

// Traitement validation/refus 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['reservation_id'])) {
    traiterReservation($pdo, $_POST['reservation_id'], $_POST['action']);
}

// Récupère les réservations en attente
$reservations = recupererReservationsEnAttente($pdo);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation des Réservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Réservations à valider</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Matériel</th>
                <th>Quantité</th>
                <th>Date emprunt</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($reservations) === 0): ?>
            <tr><td colspan="6" class="text-center">Aucune réservation en attente</td></tr>
        <?php else: ?>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['prenom'] . ' ' . $r['nom']) ?></td>
                    <td><?= htmlspecialchars($r['desgnation']) ?></td>
                    <td><?= $r['quantite'] ?></td>
                    <td><?= $r['date_emprunt'] ?> à <?= $r['heur_emprunt'] ?></td>
                    <td><?= $r['duree'] ?> jour(s)</td>
                    <td>
                        <form method="post" class="d-inline" onsubmit="return confirmerAction(this.action.value);">
                            <input type="hidden" name="reservation_id" value="<?= $r['id'] ?>">
                            <button type="submit" name="action" value="valider" class="btn btn-success btn-sm">Valider</button>
                            <button type="submit" name="action" value="refuser" class="btn btn-danger btn-sm">Refuser</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="text-center">
        <a href="dashboard.php" class="btn btn-primary">Retour</a>
    </div>
</div>

<script src="fonction_validation.js"></script>
</body>
</html>
