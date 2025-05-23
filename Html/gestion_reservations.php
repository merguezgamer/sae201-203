<?php
session_start();
require_once '..\php\config.php'; // Ajuste le chemin si nécessaire

// Suppression de réservation si demandée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE id = :id");
    $stmt->execute([':id' => $_POST['delete_id']]);
    $message = "✅ Réservation supprimée avec succès.";
}

// Récupérer toutes les réservations
$stmt = $pdo->query("
    SELECT r.id, u.nom, u.prenom, m.desgnation, r.quantite, r.statut, 
           r.date_emprunt, r.heur_emprunt, r.date_rendu, r.heur_rendu
    FROM reservation r
    LEFT JOIN utilisateurs u ON r.id_utilisateur = u.id
    LEFT JOIN materiel m ON r.id_materiel = m.id
    ORDER BY r.date_emprunt DESC
");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Réservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <form method="post" onsubmit="return confirm('Confirmer la suppression ?');">
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
</body>
</html>
