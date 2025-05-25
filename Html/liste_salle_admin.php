<?php
require_once '../php/liste.php';
require_once '../php/verifier_admin.php';

$salle = getRoom($pdo);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/liste_materiel.js" defer></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Liste du Matériel</h2>

    <a href="ajout_salle.php" class="btn btn-success mb-3">➕ Ajouter une salle</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>numéro</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($salle) > 0): ?>
                    <?php foreach ($salle as $s): ?>
                        <tr>
                            <td><?= htmlspecialchars($s['id']) ?></td>
                            <td><?= htmlspecialchars($s['nom']) ?></td>
                            <td><?= htmlspecialchars($s['satut']) ?></td>
                            <td>
                                <a href="modifier_salle.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                                <a href="../php/supprimer_salle.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirmerSuppression();">🗑️ Supprimer</a>
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
