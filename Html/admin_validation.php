<?php
require_once '..\php\config.php';
session_start();

// Vérifie si c'est bien un admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: acceuil.php");
    exit;
}

// Traitement validation/refus
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['reservation_id'];
    $action = $_POST['action']; // "valider" ou "refuser"
    $newStatut = $action === 'valider' ? 'validée' : 'refusée';

    $stmt = $pdo->prepare("UPDATE reservation SET statut = :statut WHERE id = :id");
    $stmt->execute([':statut' => $newStatut, ':id' => $id]);
}

// Récupère les réservations en attente
$sql = "SELECT r.*, u.nom, u.prenom, m.desgnation 
        FROM reservation r
        JOIN utilisateurs u ON r.id_utilisateur = u.id
        JOIN materiel m ON r.id_materiel = m.id
        WHERE r.statut = 'en attente'
        ORDER BY r.date_emprunt";

$reservations = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
                        <form method="post" class="d-inline">
                            <input type="hidden" name="reservation_id" value="<?= $r['id'] ?>">
                            <button name="action" value="valider" class="btn btn-success btn-sm">Valider</button>
                            <button name="action" value="refuser" class="btn btn-danger btn-sm">Refuser</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
