<?php
require_once 'config.php';
session_start();

function verifierAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: acceuil.php");
        exit;
    }
}

function getMaterielById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM materiel WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateMateriel($pdo, $id, $data) {
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

    $data[':id'] = $id;

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function getRoomById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM salle WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function updateSalle($pdo, $id, $data) {
    $sql = "UPDATE salle SET 
        id = :id,
        nom = :nom,
        statut = :statut
        WHERE id = :id";

    $data[':id'] = $id;

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}