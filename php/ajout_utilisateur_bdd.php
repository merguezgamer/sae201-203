<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   `if (!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($motdepasse) && !empty($email) && !empty($adresse)) {
        try {
          
            $sqlUtilisateur = "INSERT INTO utilisateur (nom, prenom, pseudo, mot_de_passe, email, adresse, etat) 
                                VALUES (:nom, :prenom, :pseudo, :mot_de_passe, :email, :adresse, :etat)";
            $stmtUtilisateur = $pdo->prepare($sqlUtilisateur);
            $stmtUtilisateur->execute([
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":pseudo" => $pseudo,
                ":mot_de_passe" => $motdepasse,
                ":email" => $email,
                ":adresse" => $adresse,
                ":etat" => "en attente"

            ]);` ?>