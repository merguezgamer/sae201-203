<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #f8f9fa;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>
  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mon Dashboard</a>
      <div class="d-flex">
        <a href="logout.php" class="btn btn-light">Déconnexion</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="pt-3">
          <a href="#">Accueil</a>
          <a href="#">Profil</a>
          <a href="#">Paramètres</a>
          <a href="#">Autre</a>
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
