<?php
require_once 'config.php';

function ajouterMateriel($pdo, $data) {
    $sql = "INSERT INTO materiel 
        (ref, desgnation, photo, type, date_achat, etat, quantite, descriptif, lien, satut) 
        VALUES 
        (:ref, :desgnation, :photo, :type, :date_achat, :etat, :quantite, :descriptif, :lien, :satut)";
    
    $stmt = $pdo->prepare($sql);

    $params = [
        ':ref' => $data['ref'],
        ':desgnation' => $data['desgnation'],
        ':photo' => $data['photo'],
        ':type' => $data['type'],
        ':date_achat' => $data['date_achat'],
        ':etat' => $data['etat'],
        ':quantite' => $data['quantite'],
        ':descriptif' => $data['descriptif'],
        ':lien' => $data['lien'],
        ':satut' => $data['satut']
    ];

    if ($stmt->execute($params)) {
        return "✅ Matériel ajouté avec succès.";
    } else {
        return "❌ Une erreur est survenue lors de l'ajout.";
    }
}

function ajouterSalle($pdo, $data) {
    $sql = "INSERT INTO salle 
        (id, nom, statut) 
        VALUES 
        (:id, :nom, :statut)";
    
    $stmt = $pdo->prepare($sql);

    $params = [
        ':id' => $data['id'],
        ':nom' => $data['nom'],
        ':statut' => $data['statut']
    ];

    if ($stmt->execute($params)) {
        return "✅ Matériel ajouté avec succès.";
    } else {
        return "❌ Une erreur est survenue lors de l'ajout.";
    }
}