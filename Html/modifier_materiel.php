<?php
require_once '../php/modifier.php';
require_once '../php/verifier_admin.php';

verifierAdmin();

if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$id = intval($_GET['id']);
$message = "";

$materiel = getMaterielById($pdo, $id);
if (!$materiel) {
    die("Matériel introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if (updateMateriel($pdo, $id, $params)) {
        $message = "✅ Matériel mis à jour.";
        $materiel = getMaterielById($pdo, $id);
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
    <script src="../js/modifier_materiel.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Modifier un Matériel</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" onsubmit="return validerFormulaire();">
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
