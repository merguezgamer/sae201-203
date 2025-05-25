<?php
require_once '../php/config.php';
require_once '../php/verifier_admin.php';
verifierAdmin();
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
          <p>Contenu principal ici. Tu peux ajouter des graphiques, des tableaux, etc.</p>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Carte 1</h5>
                  <p class="card-text">Infos ou statistiques.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Carte 2</h5>
                  <p class="card-text">Autres données ou actions.</p>
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
