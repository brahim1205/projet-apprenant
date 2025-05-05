<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Connexion</title>
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
            <h5>Bienvenue sur</h5>
            <h5 class="ECSA">Ecole du code Sonatel Academy</h5>
        </div>
        <div class="seConnecter">Se Connecter </div>
        <?php if (!empty($error)): ?>
            <div class="error-message" style="color: red; text-align: center;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
         <form action="index.php?route=login" method="post">
            <div class="login">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" placeholder="matricule ou email" >
            </div>
            <div class="mdp">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="mot de passe" >
            </div>
            <div class="mdpOublie">
                <a href="index.php?route=forgot-password">Mot de passe oublié ?</a>
            </div>
            <div class="bc">
                <input class="btnSeConnecter" type="submit" value="Se connecter">
            </div>
        </form>
    </div>

</body>
</html>