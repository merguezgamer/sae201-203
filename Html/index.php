<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil</title>
    <!--style-->
    <link rel="stylesheet" href="..\css\style.css">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="col-12 text-center titre">
            <h1>Gustave Eiffel</h1>
            <p>Portail de connexion</p>
        </div>
    </div>
    <div class="col col-6 offset-3 ">
        <div class="sous-titre text-center pb-4">
            <h2>Service central d'authentification</h2>
        </div>
        <div class="text-center">
            <p>entrez votre identifiant et votre mot de passe</p>
        </div>
        <form action="..\php\connexion.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <div>
                <p>Vous n'avez pas de compte ? <a href="..\Html\Inscription.php">Inscrivez-vous</a></p>
            </div>
        </form>
    </div>
    <!-- lien vers le fichier javascript -->
    <script src="..\javascript\javascript.js"></script>
</body>
</html>