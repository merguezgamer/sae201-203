<?php
require_once '../php/config.php';
require_once '../php/verifier_admin.php';
verifierAdmin();

// Récupérer les statistiques
// Nombre de réservations (matériel)
$stmt = $pdo->query("SELECT COUNT(*) FROM reservation");
$nb_reservations = $stmt->fetchColumn();

// Nombre de matériels
$stmt = $pdo->query("SELECT COUNT(*) FROM materiel");
$nb_materiels = $stmt->fetchColumn();

// Nombre de salles
$stmt = $pdo->query("SELECT COUNT(*) FROM salle");
$nb_salles = $stmt->fetchColumn();

// Nombre d'utilisateurs
$stmt = $pdo->query("SELECT COUNT(*) FROM utilisateurs");
$nb_utilisateurs = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Mon Dashboard</a>
        <div class="d-flex">
          <a href="..\php\logout.php" class="btn btn-light">Déconnexion</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
          <div class="pt-3">
            <a href="acceuil.php">Accueil</a>
            <a href="liste_materiel_admin.php">liste materiel</a>
            <a href="liste_salle_admin.php">liste salle</a>
            <a href="admin_validation.php">validation reservation</a>
            <a href="gestion_reservations.php">gestion reservations</a>
          </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
          <h1 class="h2">Bienvenue sur votre tableau de bord</h1>
          <div class="row g-4 mb-4">
            <div class="col-md-3">
              <div class="card text-bg-primary shadow">
                <div class="card-body text-center">
                  <h5 class="card-title">Réservations</h5>
                  <p class="display-5"><?= $nb_reservations ?></p>
                  <p class="card-text">Total des réservations de matériel</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-bg-success shadow">
                <div class="card-body text-center">
                  <h5 class="card-title">Matériels</h5>
                  <p class="display-5"><?= $nb_materiels ?></p>
                  <p class="card-text">Nombre de matériels</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-bg-warning shadow">
                <div class="card-body text-center">
                  <h5 class="card-title">Salles</h5>
                  <p class="display-5"><?= $nb_salles ?></p>
                  <p class="card-text">Nombre de salles</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-bg-info shadow">
                <div class="card-body text-center">
                  <h5 class="card-title">Utilisateurs</h5>
                  <p class="display-5"><?= $nb_utilisateurs ?></p>
                  <p class="card-text">Nombre d'utilisateurs</p>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
