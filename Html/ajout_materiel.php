<?php
require_once '../php/ajout.php';
require_once '../php/verifier_admin.php';

verifierAdmin();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = ajouterMateriel($pdo, $_POST);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/ajouter_materiel.js" defer></script>
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
    <h2 class="mb-4">Ajouter un Matériel</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" onsubmit="return validerFormulaire();" style="background-color:rgb(193, 230, 236); padding:20px;">
        <div class="mb-3">
            <label for="ref" class="form-label">Référence</label>
            <input type="text" class="form-control" id="ref" name="ref">
        </div>
        <div class="mb-3">
            <label for="desgnation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="desgnation" name="desgnation">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo (nom de fichier ou URL)</label>
            <input type="text" class="form-control" id="photo" name="photo">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>
        <div class="mb-3">
            <label for="date_achat" class="form-label">Date d'achat</label>
            <input type="date" class="form-control" id="date_achat" name="date_achat">
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <input type="text" class="form-control" id="etat" name="etat">
        </div>
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite">
        </div>
        <div class="mb-3">
            <label for="descriptif" class="form-label">Descriptif</label>
            <input type="text" class="form-control" id="descriptif" name="descriptif">
        </div>
        <div class="mb-3">
            <label for="lien" class="form-label">Lien (fiche produit, etc.)</label>
            <input type="text" class="form-control" id="lien" name="lien">
        </div>
        <div class="mb-3">
            <label for="satut" class="form-label">Statut</label>
            <input type="text" class="form-control" id="satut" name="satut">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="dashboard.php" class="btn btn-secondary">Retour</a>
    </form>
</div>
</body>
</html>
