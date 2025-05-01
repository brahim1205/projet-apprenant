<head>
    <link rel="stylesheet" href="/assets/css/ajoutref.css">
</head>

<div class="modal">
    <div class="modal-header">
        <h3 class="modal-title">Créer un nouveau référentiel</h3>
    </div>
    <div class="modal-body">
        <form action="index.php?route=savereferentiel" method="POST" enctype="multipart/form-data">
            <div class="photo-upload">
                <label for="photo" class="photo-label">
                    <?php if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK): ?>
                        <img src="<?php echo '/public/uploads/referentiels/' . $_FILES['photo']['name']; ?>" alt="Aperçu">
                    <?php else: ?>
                        <div class="photo-icon">🖼️</div>
                        <div class="photo-text">Cliquez pour ajouter<br>une photo</div>
                    <?php endif; ?>
                </label>
                <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
            </div>
            
            <div class="form-group">
                <label for="nom">Nom*</label>
                <input type="text" id="nom" name="nom" required value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <label for="capacite">Capacité*</label>
                    <input type="number" id="capacite" name="capacite" value="<?php echo isset($_POST['capacite']) ? htmlspecialchars($_POST['capacite']) : '30'; ?>" required>
                </div>
                
                <div class="form-col">
                    <label for="sessions">Nombre de sessions*</label>
                    <select id="sessions" name="sessions" required>
                        <?php 
                        $sessions = range(1, 5);
                        foreach ($sessions as $session): 
                            $selected = (isset($_POST['sessions']) && $_POST['sessions'] == $session) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $session; ?>" <?php echo $selected; ?>>
                                <?php echo $session; ?> session<?php echo $session > 1 ? 's' : ''; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="modal-footer">
                <a href="index.php?route=toutreferentiel" class="btn btn-cancel">Annuler</a>
                <button type="submit" name="submit" class="btn btn-create">Créer</button>
            </div>
        </form>
    </div>
</div>