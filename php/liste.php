<?php
require_once 'config.php';

function getMateriels($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM materiel ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function getRoom($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM salle ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}