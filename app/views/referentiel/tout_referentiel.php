<?php
// Charger les données des référentiels
$data = load_data();
$referentiels = $data['Referentiels'] ?? [];
?>
<head>
    <title>Tous les Référentiels</title>
    <link rel="stylesheet" href="/assets/css/tout_referentiel.css">
    <style>
        
    </style>
</head>

<div class="container">
    <div class="header">
        <a href="index.php?route=referentiel" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Retour aux référentiels actifs
        </a>
    </div>
    
    <div class="page-title">
        <h1>Tous les Référentiels</h1>
        <p class="subtitle">Liste complète des référentiels de formation</p>
    </div>
    
    <div class="search-bar-container">
        <form method="GET" action="index.php" class="search-bar">
            <input type="hidden" name="route" value="referentiel">
            <input type="text" name="search" 
                   value="<?php echo htmlspecialchars($search ?? ''); ?>"
                   placeholder="Rechercher un référentiel...">
        </form>
        
        <a href="index.php?route=ajoutref" class="create-button">
            <i class="fas fa-plus"></i> Créer un référentiel
        </a>
    </div>
    
    <div class="cards-grid">
        <?php foreach ($referentiels as $ref): ?>
            <?php include 'partials/referentiel-card.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
