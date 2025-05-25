<?php
require_once '../php/ajout.php';
require_once '../php/verifier_admin.php';


verifierAdmin();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = ajouterSalle($pdo, $_POST);
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
<div class="container mt-5">
    <h2 class="mb-4">Ajouter un Matériel</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" onsubmit="return validerFormulaireSalle();" style="background-color:rgb(193, 230, 236); padding:20px;">
        <div class="mb-3">
            <label for="desgnation" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
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
