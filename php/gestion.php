<?php
require_once 'config.php';

function supprimerReservation($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return "✅ Réservation supprimée avec succès.";
}

function recupererReservations($pdo) {
    $stmt = $pdo->query("
        SELECT r.id, u.nom, u.prenom, m.desgnation, r.quantite, r.statut, 
               r.date_emprunt, r.heur_emprunt, r.date_rendu, r.heur_rendu
        FROM reservation r
        LEFT JOIN utilisateurs u ON r.id_utilisateur = u.id
        LEFT JOIN materiel m ON r.id_materiel = m.id
        ORDER BY r.date_emprunt DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
