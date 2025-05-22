<?php
require_once '..\php\config.php';

session_start();

// Vérifie si c'est bien un admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: acceuil.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$id = intval($_GET['id']);
$message = "";

// Récupérer les données du matériel
$stmt = $pdo->prepare("SELECT * FROM materiel WHERE id = :id");
$stmt->execute([':id' => $id]);
$materiel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$materiel) {
    die("Matériel introuvable.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE materiel SET 
        ref = :ref, 
        desgnation = :desgnation, 
        photo = :photo, 
        type = :type, 
        date_achat = :date_achat, 
        etat = :etat, 
        quantite = :quantite, 
        descriptif = :descriptif, 
        lien = :lien, 
        satut = :satut 
        WHERE id = :id";

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
        ':satut' => $_POST['satut'],
        ':id' => $id
    ];

    if ($pdo->prepare($sql)->execute($params)) {
        $message = "✅ Matériel mis à jour.";
        // Recharge les données mises à jour
        $stmt->execute([':id' => $id]);
        $materiel = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $message = "❌ Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Modifier un Matériel</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
        <?php foreach ($materiel as $key => $value) {
            if ($key === 'id') continue;
        ?>
        <div class="mb-3">
            <label class="form-label"><?= ucfirst($key) ?></label>
            <input type="<?= ($key === 'date_achat') ? 'date' : (is_numeric($value) ? 'number' : 'text') ?>"
                   class="form-control" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>">
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="liste_materiel.php" class="btn btn-secondary">Retour</a>
    </form>
</div>
</body>
</html>
