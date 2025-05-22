<?php
require_once '..\php\config.php';

if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$id = intval($_GET['id']);

// Supprimer l'entrée
$stmt = $pdo->prepare(query: "DELETE FROM materiel WHERE id = :id");
if ($stmt->execute([':id' => $id])) {
    header("Location: liste_materiel.php?deleted=1");
    exit;
} else {
    die("Erreur lors de la suppression.");
}