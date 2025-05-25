<?php
require_once '../php/gestion.php';
require_once '../php/verifier_admin.php';
verifierAdmin();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $message = supprimerReservation($pdo, $_POST['delete_id']);
}

$reservations = recupererReservations($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Réservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/gestion_reservations.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Gestion des Réservations</h1>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <?php if (empty($reservations)): ?>
        <div class="alert alert-warning">Aucune réservation trouvée.</div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Utilisateur</th>
                    <th>Matériel</th>
                    <th>Quantité</th>
                    <th>Statut</th>
                    <th>Emprunt</th>
                    <th>Retour</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $res): ?>
                    <tr>
                        <td><?= htmlspecialchars($res['prenom'] . ' ' . $res['nom']) ?></td>
                        <td><?= htmlspecialchars($res['desgnation']) ?></td>
                        <td><?= $res['quantite'] ?></td>
                        <td><?= htmlspecialchars($res['statut']) ?></td>
                        <td><?= $res['date_emprunt'] ?> à <?= $res['heur_emprunt'] ?></td>
                        <td><?= $res['date_rendu'] ?> à <?= $res['heur_rendu'] ?></td>
                        <td>
                            <form method="post" onsubmit="return confirmerSuppression();">
                                <input type="hidden" name="delete_id" value="<?= $res['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <div class="text-center">
        <a href="dashboard.php" class="btn btn-secondary">Retour au Dashboard</a>
    </div>
</div>
</body>
</html>
