<?php
require_once '../php/liste.php';
require_once '../php/verifier_admin.php';

$salle = getRoom($pdo);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Salles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/liste_materiel.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mon Dashboard</a>
    <div class="d-flex">
      <a href="..\php\logout.php" class="btn btn-light">Déconnexion</a>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h2 class="mb-4">Liste des Salles</h2>

    <a href="ajout_salle.php" class="btn btn-success mb-3">➕ Ajouter une salle</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Numéro</th>
                    <th>Statut</th>
                    <th>Actions</th>
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
                    <tr><td colspan="4" class="text-center">Aucune salle trouvée.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="dashboard.php" class="btn btn-primary">Retour au dashboard</a>
    </div>
</div>
</body>
</html>
