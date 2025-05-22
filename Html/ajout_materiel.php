<?php
require_once '..\php\config.php'; // Assure-toi que $pdo est bien initialisé ici

if (($_SESSION['role']!== 'admin')) {
    header("Location: login.php");
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO materiel 
        (ref, desgnation, photo, type, date_achat, etat, quantite, descriptif, lien, satut) 
        VALUES 
        (:ref, :desgnation, :photo, :type, :date_achat, :etat, :quantite, :descriptif, :lien, :satut)";
    
    $stmt = $pdo->prepare($sql);

    $params = [
        ':ref' => $_POST['ref'],
        ':desgnation' => $_POST['desgnation'],
        ':photo' => $_POST['photo'],
        ':type' => $_POST['type'],
        ':date_achat' => $_POST['date_achat'],
        ':etat' => $_POST['etat'],
        ':quantite' => $_POST['quantite'],
        ':descriptif' => $_POST['descriptif'],
        ':lien' => $_POST['lien'],
        ':satut' => $_POST['satut']
    ];

    if ($stmt->execute($params)) {
        $message = "✅ Matériel ajouté avec succès.";
    } else {
        $message = "❌ Une erreur est survenue lors de l'ajout.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Ajouter un Matériel</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
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
