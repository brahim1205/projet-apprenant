<head>
    <link rel="stylesheet" href="public/css/ajoutapprenant.css">
    <title>Ajout apprenant</title>

</head>
<body>
    <div class="container">
        <h1>Ajout apprenant</h1>
        
        <form action="index.php?route=saveapprenant" method="POST" enctype="multipart/form-data">
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Informations de l'apprenant</h2>
                    <span class="edit-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                    </span>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom">Prénom(s)</label>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="date-naissance">Date de naissance</label>
                        <div class="date-input-container">
                            <input type="date" name="date-naissance" id="date-naissance" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieu-naissance">Lieu de naissance</label>
                        <input type="text" name="lieu-naissance" id="lieu-naissance" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="referentiel">Référentiel</label>
                        <select name="referentiel" id="referentiel" required>
                            <option value="">Sélectionnez un référentiel</option>
                            <?php foreach ($referentiels as $ref): ?>
                                <option value="<?php echo htmlspecialchars($ref); ?>">
                                    <?php echo htmlspecialchars($ref); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="photo">Photo de profil</label>
                        <input type="file" name="photo" id="photo" accept="image/*">
                    </div>
                </div>
            </div>
            
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Informations du tuteur</h2>
                    <span class="edit-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                    </span>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom-tuteur">Prénom(s) & nom</label>
                        <input type="text" name="nom-tuteur" id="nom-tuteur" required>
                    </div>
                    <div class="form-group">
                        <label for="lien-parente">Lien de parenté</label>
                        <input type="text" name="lien-parente" id="lien-parente" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="adresse-tuteur">Adresse</label>
                        <input type="text" name="adresse-tuteur" id="adresse-tuteur" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone-tuteur">Téléphone</label>
                        <input type="tel" name="telephone-tuteur" id="telephone-tuteur" required>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <a href="index.php?route=apprenant" class="btn btn-cancel">Annuler</a>
                <button type="submit" class="btn btn-save">Enregistrer</button>
            </div>
        </form>
    </div>
</body>
</html>