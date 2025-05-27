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
    <div class="row">
        <div class="col col-6 offset-3 ">
            <div class="sous-titre text-center pb-4">
                <h2>Service central d'authentification</h2>
            </div>
            <div class="text-center">
                <p>entrez votre identifiant et votre mot de passe</p>
            </div>
            <form action="..\php\signin.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Prenom" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Nom" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="courriel" name="courriel" placeholder="Adresse mail universitaire" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                </div>
                <select name="role" id="role" class="form-select mb-3">
                    <option value="" disabled selected>Choisissez votre rôle</option>
                    <option value="etudiant">Etudiant</option>
                    <option value="enseignant">Enseignant</option>
                    <option value="agent">Agent</option>
                </select>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
            <div>
                <p>Vous avez déjà un compte ? <a href="..\index.php">Connectez-vous</a></p>
            </div>
        </div>
        <div class="col col-5 offset-1 ">
            <div class="zone_role">

        </div>
    </div>
    <!-- lien vers le fichier javascript -->
    <script src="..\javascript\javascript.js"></script>
</body>
</html>