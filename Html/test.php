<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Université Gustave Eiffel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9f9f9;
        }

        .navbar {
            background-color: #2c2f8f;
        }

        .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            margin-left: 10px;
        }

        .hero-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background-color: #e3f7fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .accordion-button {
            background-color: #d0eff5;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" alt="Université Gustave Eiffel">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="acceuil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservation.php">Réservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aide.php">Aide</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <div class="hero-section">
                <h2>Bienvenue sur la plateforme de réservation</h2>
                <p class="mt-3">
                    Ce site vous permet de réserver facilement des salles et du matériel proposé par l’Université Gustave Eiffel.
                </p>
                <p>
                    Utilisez le menu de navigation pour accéder à la réservation ou obtenir de l’aide.
                </p>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <div class="sidebar">
                <h5 class="text-center mb-4">Disponibilités</h5>

                <div class="accordion" id="accordionSidebar">
                    <!-- Salles -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSalles">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSalles">
                                Salles disponibles
                            </button>
                        </h2>
                        <div id="collapseSalles" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Salle A101</li>
                                    <li class="list-group-item">Salle B202</li>
                                    <li class="list-group-item">Salle C303</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Articles -->
                    <div class="accordion-item mt-2">
                        <h2 class="accordion-header" id="headingArticles">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseArticles">
                                Articles disponibles
                            </button>
                        </h2>
                        <div id="collapseArticles" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Vidéoprojecteur</li>
                                    <li class="list-group-item">PC portable</li>
                                    <li class="list-group-item">Tableau blanc</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end accordion -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>