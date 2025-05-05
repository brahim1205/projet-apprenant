  
    <!-- Main Content -->
    <div class="main-content">
    <div class="header">
        <h2 class="modal-title">Ajouter un Référentiel</h2>
        <p>Remplissez les informations ci-dessous pour ajouter un référentiel.</p>
    </div>
    <div class="content">
        <form action="index.php?route=savereferentiel" method="post">
            <div class="form-group">
                <label class="form-label">Libellé Référentiel</label>
                <input type="text" name="libelle" class="form-input" placeholder="Ex : Développement Web" required>
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" placeholder="Description du référentiel" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Promotion Active</label>
                <input type="text" name="promotion" class="form-input" placeholder="Ex : Promotion 2025" required>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-cancel" onclick="window.location.href='index.php?route=referentiel'">Annuler</button>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
</div>
