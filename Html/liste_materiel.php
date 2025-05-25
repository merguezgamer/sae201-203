<?php
require_once '../php/liste.php';
require_once '../php/verifier_admin.php';

$materiels = getMateriels($pdo);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste du Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/liste_materiel.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
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
<div class="container mt-5">
    <h2 class="mb-4">Liste du Matériel</h2>

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
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="12" class="text-center">Aucun matériel trouvé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <a href="acceuil.php" class="btn btn-secondary">Retour</a>
</div>
</body>
</html>
