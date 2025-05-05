<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Mot de passe oublié</title>
</head>
<body>
    <div class="container">
        <div class="entSonatel">
           <img src="assets/images/logo_odc.png" alt="logo sonatel ici">
        </div>
        <div class="mBienvenue">
            <h5>Réinitialisation du mot de passe</h5>
        </div>
        
        <form action="index.php?route=reset-password" method="post">
            <div class="login">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       placeholder="Entrez votre email" required>
            </div>
            
            <div class="bc">
                <input class="btnSeConnecter" type="submit" 
                       value="Réinitialiser le mot de passe">
            </div>
            
            <div class="mdpOublie">
                <a href="index.php?route=login">Retour à la connexion</a>
            </div>
        </form>
    </div>
</body>
</html>