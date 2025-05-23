<?php
require_once '..\php\config.php';

    
try {
    $stmt = $pdo->query("SELECT * FROM materiel ORDER BY id DESC");
    $materiels = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Liste du Matériel</h2>

    <a href="ajout_materiel.php" class="btn btn-success mb-3">➕ Ajouter un matériel</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Réf</th>
                    <th>Désignation</th>
                    <th>Photo</th>
                    <th>Type</th>
                    <th>Date achat</th>
                    <th>État</th>
                    <th>Quantité</th>
                    <th>Descriptif</th>
                    <th>Lien</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($materiels) > 0): ?>
                    <?php foreach ($materiels as $m): ?>
                        <tr>
                            <td><?= htmlspecialchars($m['id']) ?></td>
                            <td><?= htmlspecialchars($m['ref']) ?></td>
                            <td><?= htmlspecialchars($m['desgnation']) ?></td>
                            <td>
                                <?php if (!empty($m['photo'])): ?>
                                    <img src="<?= htmlspecialchars($m['photo']) ?>" alt="Photo" width="50">
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($m['type']) ?></td>
                            <td><?= htmlspecialchars($m['date_achat']) ?></td>
                            <td><?= htmlspecialchars($m['etat']) ?></td>
                            <td><?= htmlspecialchars($m['quantite']) ?></td>
                            <td><?= htmlspecialchars($m['descriptif']) ?></td>
                            <td>
                                <?php if (!empty($m['lien'])): ?>
                                    <a href="<?= htmlspecialchars($m['lien']) ?>" target="_blank">Voir</a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($m['satut']) ?></td>
                            <td>
                                <a href="modifier_materiel.php?id=<?= $m['id'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                                <a href="..\php\supprimer_materiel.php?id=<?= $m['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce matériel ?')">🗑️ Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="12" class="text-center">Aucun matériel trouvé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <a href="dashboard.php" class="btn btn-secondary">Retour</a>
</div>
</body>
</html>
