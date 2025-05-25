<?php

require_once 'config.php'; // Assure-toi que ce fichier définit bien $pdo

$id_salle = $_GET['id'] ?? null;

if ($id_salle) {
    // Vérifie qu'il n'y a aucune réservation associée
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM salle WHERE id_salle = :id");
    $stmt->execute([':id' => $id_salle]);
    $reservations_existantes = $stmt->fetchColumn();

    if ($reservations_existantes > 0) {
        echo "❌ Cette salle ne peut pas être supprimée car des réservations (même refusées) y sont encore liées.";
    } else {
        $stmt = $pdo->prepare("DELETE FROM salle WHERE id = :id");
        $stmt->execute([':id' => $id_salle]);
        echo "✅ Salle supprimée avec succès.";
        header("Location: ..\php\dashboard.php");
        exit;
    }

} else {
    echo "ID de salle invalide.";
}