<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Mot de passe oublié</title>
    <style>
        input {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80%;
            width: 100%;
            padding-left: 10px;
            border-radius: 5px 5px 5px 5px;
            border: solid 1px #00000080;
        }

        input:focus {
            outline: none;
            border: solid 1px var(--orange);
        }
    </style>
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