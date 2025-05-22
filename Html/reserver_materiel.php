<?php
require_once '..\php\config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";

// Traitement de la réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO reservation 
        (id_materiel, id_utilisateur, email_utilisateur, quantite, statut, date_emprunt, heur_emprunt, duree, date_rendu, heur_rendu) 
        VALUES 
        (:id_materiel, :id_utilisateur, :email_utilisateur, :quantite, :statut, :date_emprunt, :heur_emprunt, :duree, :date_rendu, :heur_rendu)";
    
    $params = [
        ':id_materiel' => $_POST['id_materiel'],
        ':id_utilisateur' => $_SESSION['user_id'],
        ':email_utilisateur' => $_SESSION['email'],
        ':quantite' => $_POST['quantite'],
        ':statut' => 'en attente',
        ':date_emprunt' => $_POST['date_emprunt'],
        ':heur_emprunt' => $_POST['heur_emprunt'],
        ':duree' => $_POST['duree'],
        ':date_rendu' => $_POST['date_rendu'],
        ':heur_rendu' => $_POST['heur_rendu'],
    ];

    if ($pdo->prepare($sql)->execute($params)) {
        $message = "✅ Réservation enregistrée avec succès.";
    } else {
        $message = "❌ Une erreur est survenue.";
    }
}

// Liste des matériels
$stmt = $pdo->query("SELECT id, desgnation FROM materiel");
$materiels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Réservations de l'utilisateur
$stmt2 = $pdo->prepare("SELECT r.*, m.desgnation FROM reservation r 
                        JOIN materiel m ON r.id_materiel = m.id 
                        WHERE r.id_utilisateur = :uid 
                        ORDER BY r.date_emprunt DESC");
$stmt2->execute([':uid' => $_SESSION['user_id']]);
$reservations = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver un Matériel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updateDateRendu() {
            const dateEmprunt = document.querySelector('[name="date_emprunt"]').value;
            const duree = parseInt(document.querySelector('[name="duree"]').value);
            if (dateEmprunt && duree) {
                const empruntDate = new Date(dateEmprunt);
                empruntDate.setDate(empruntDate.getDate() + duree);
                const year = empruntDate.getFullYear();
                const month = String(empruntDate.getMonth() + 1).padStart(2, '0');
                const day = String(empruntDate.getDate()).padStart(2, '0');
                document.querySelector('[name="date_rendu"]').value = `${year}-${month}-${day}`;
            }
        }
    </script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Réserver un Matériel</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" class="row g-3">
        <div class="col-md-6">
            <label for="id_materiel" class="form-label">Matériel</label>
            <select name="id_materiel" class="form-select" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($materiels as $m): ?>
                    <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['desgnation']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Quantité</label>
            <input type="number" class="form-control" name="quantite" max="" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Date d'emprunt</label>
            <input type="date" class="form-control" name="date_emprunt" required onchange="updateDateRendu()">
        </div>

        <div class="col-md-2">
            <label class="form-label">Heure</label>
            <input type="time" class="form-control" name="heur_emprunt" required>
        </div>

        <div class="col-md-2">
            <label class="form-label">Durée (jours)</label>
            <input type="number" class="form-control" name="duree" required onchange="updateDateRendu()">
        </div>

        <div class="col-md-4">
            <label class="form-label">Date de rendu estimée</label>
            <input type="date" class="form-control" name="date_rendu" required readonly>
        </div>

        <div class="col-md-2">
            <label class="form-label">Heure de rendu</label>
            <input type="time" class="form-control" name="heur_rendu" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Réserver</button>
            <a href="acceuil.php" class="btn btn-secondary">Retour</a>
        </div>
    </form>

    <hr class="my-5">

    <h4>Mes Réservations</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Matériel</th>
                <th>Quantité</th>
                <th>Date Emprunt</th>
                <th>Heure</th>
                <th>Date Rendu</th>
                <th>Heure</th>
                <th>Durée</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($reservations) === 0): ?>
            <tr><td colspan="8" class="text-center">Aucune réservation.</td></tr>
        <?php else: ?>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['desgnation']) ?></td>
                    <td><?= $r['quantite'] ?></td>
                    <td><?= $r['date_emprunt'] ?></td>
                    <td><?= $r['heur_emprunt'] ?></td>
                    <td><?= $r['date_rendu'] ?></td>
                    <td><?= $r['heur_rendu'] ?></td>
                    <td><?= $r['duree'] ?> j</td>
                    <td><span class="badge bg-<?= $r['statut'] === 'validée' ? 'success' : ($r['statut'] === 'refusée' ? 'danger' : 'warning') ?>">
                        <?= htmlspecialchars($r['statut']) ?>
                    </span></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
