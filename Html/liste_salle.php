<?php
require_once '../php/liste.php';
require_once '../php/verifier_admin.php';

$materiels = getRoom($pdo);

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
                <?php if (count($materiels) > 0): ?>
                    <?php foreach ($materiels as $m): ?>
                        <tr>
                            <td><?= htmlspecialchars($m['id']) ?></td>
                            <td><?= htmlspecialchars($m['nom']) ?></td>
                            <td><?= htmlspecialchars($m['satut']) ?></td>
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
