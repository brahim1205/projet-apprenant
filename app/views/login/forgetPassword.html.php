<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer de mot de passe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80%;
            width: 100%;
            padding-left: 10px;
            border-radius: 5px;
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
        <div class="seConnecter">Changer de mot de passe</div>

        <?php if (!empty($error)): ?>
            <div class="error-message" style="color: red; text-align: center;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-message" style="color: green; text-align: center;">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <form action="index.php?route=changePassword" method="post">

            <div class="mdp">
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" id="new_password" name="new_password" placeholder="Nouveau mot de passe" >
            </div>
            <div class="mdp">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" >
            </div>
            <div class="bc">
                <input class="btnSeConnecter" type="submit" value="Changer le mot de passe">
            </div>
        </form>
    </div>
</body>
</html>
