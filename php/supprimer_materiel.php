<?php
require_once 'config.php'; // Assure-toi que ce fichier définit bien $pdo

$id_materiel = $_GET['id'] ?? null;

if ($id_materiel) {
        // Vérifie qu'il n'y a aucune réservation associée
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservation WHERE id_materiel = :id");
    $stmt->execute([':id' => $id_materiel]);
    $reservations_existantes = $stmt->fetchColumn();

    if ($reservations_existantes > 0) {
        echo "❌ Ce matériel ne peut pas être supprimé car des réservations (même refusées) y sont encore liées.";
    } else {
        $stmt = $pdo->prepare("DELETE FROM materiel WHERE id = :id");
        $stmt->execute([':id' => $id_materiel]);
        echo "✅ Matériel supprimé avec succès.";
        header("Location: ..\php\dashboard.php");
        exit;
    }

} else {
    echo "ID de matériel invalide.";
}
