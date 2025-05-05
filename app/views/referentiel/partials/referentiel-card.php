<div class="card">
    <div class="card-image">
        <?php if (!empty($ref['photo'])): ?>
            <img src="/public/uploads/referentiels/<?php echo htmlspecialchars($ref['photo']); ?>" 
                 alt="<?php echo htmlspecialchars($ref['libelle'] ?? ''); ?>">
        <?php else: ?>
            <div class="no-image">Pas d'image</div>
        <?php endif; ?>
    </div>
    
    <div class="card-content">
        <h3 class="card-title">
            <?php echo htmlspecialchars($ref['libelle'] ?? 'Sans titre'); ?>
        </h3>
        <p class="card-description">
            <?php echo htmlspecialchars($ref['description'] ?? 'Aucune description'); ?>
        </p>
    </div>
</div>