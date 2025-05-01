<?php
// Charger les données des référentiels
$data = load_data();
$referentiels = $data['Referentiels'] ?? [];

// Compter le nombre total de référentiels
$total_referentiels = count($referentiels);

// Appliquer un filtre si une recherche est effectuée
$search = $_GET['search'] ?? '';
$filtered_referentiels = array_filter($referentiels, function ($referentiel) use ($search) {
    // Vérifiez si la clé 'libelle' existe avant d'appliquer le filtre
    if (isset($referentiel['libelle'])) {
        return stripos($referentiel['libelle'], $search) !== false;
    }
    return false;
});

// Si aucune recherche n'est effectuée, afficher tous les référentiels
if (empty($search)) {
    $filtered_referentiels = $referentiels;
}
?>

<head>    <link rel="stylesheet" href="/assets/css/referentiel.css"> </head>
<div class="main-content">

        
        <div class="content">
            <h1 class="page-title">Référentiels</h1>
            <p class="page-subtitle">Gérer les référentiels de la promotion</p>
            
            <input type="text" class="search-referential" placeholder="Rechercher un référentiel...">
            
            <div class="action-buttons">
    <a href="index.php?route=toutreferentiel" class="btn btn-primary">
        <i>🔍</i> Tous les référentiels
    </a>
    <a href="index.php?route=addreferentiel" class="btn btn-success">
        <i>➕</i> Ajouter à la promotion
    </a>
</div>
            
            <div class="referentials-grid">
    <?php foreach ($filtered_referentiels as $referentiel): ?>
        <div class="referential-card">
            <div class="card-body">
                <h3 class="card-title"><?= htmlspecialchars($referentiel['libelle'] ?? 'Nom non défini') ?></h3>
                <p class="card-description"><?= htmlspecialchars($referentiel['description'] ?? 'Description non définie') ?></p>
                <span class="promotion-name">Promotion : <?= htmlspecialchars($referentiel['promotion'] ?? 'Non spécifiée') ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </div>
    </div>