<?php
function traiterReservation($pdo, $reservation_id, $action) {
    if ($action === 'valider') {
        $stmt = $pdo->prepare("UPDATE reservation SET statut = 'Validée' WHERE id = :id");
        $stmt->execute(['id' => $reservation_id]);
    } elseif ($action === 'refuser') {
        $stmt = $pdo->prepare("UPDATE reservation SET statut = 'Refusée' WHERE id = :id");
        $stmt->execute(['id' => $reservation_id]);
    }
}

function recupererReservationsEnAttente($pdo) {
    $sql = "SELECT r.*, u.nom, u.prenom, m.desgnation 
            FROM reservation r
            JOIN utilisateurs u ON r.id_utilisateur = u.id
            JOIN materiel m ON r.id_materiel = m.id
            WHERE r.statut = 'en attente'
            ORDER BY r.date_emprunt";

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
