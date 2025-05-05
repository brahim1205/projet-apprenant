<?php
// Charger les données des promotions et des référentiels
$data = load_data();
$promotions = $data['Promotion'] ?? [];
$referentiels = $data['Referentiels'] ?? [];

// Compter le nombre total de référentiels
$total_referentiels = count($referentiels);

// Compter le nombre total de promotions
$total_promotions = count($promotions);

// Trier les promotions : les actives en premier
usort($promotions, function ($a, $b) {
    return $b['statut'] === 'active' ? 1 : -1;
});

// Appliquer un filtre si une recherche est effectuée
$search = $_GET['search'] ?? '';
$filtered_promotions = array_filter($promotions, function ($promo) use ($search) {
    return stripos($promo['nom'], $search) !== false;
});
?>

<head>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ; ?>/assets/css/promo.css">
</head>

    <!-- Main Content -->
    <div class="main-content">
   

        <!-- Page Header -->
        <div class="page-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1>Promotion</h1>
                    <p class="page-description">Gérer les promotions de l'école</p>
                </div>
                <button class="action-button" onclick="window.location.href='index.php?route=addpromotion'">
                    <i class="fas fa-plus"></i> Ajouter une promotion
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stat-cards">
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-number">0</span>
                    <span class="stat-label">Apprenants</span>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-number"><?php echo $total_referentiels; ?></span>
                    <span class="stat-label">Référentiels</span>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-number">1</span>
                    <span class="stat-label">Promotions actives</span>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-number"><?php echo $total_promotions; ?></span>
                    <span class="stat-label">Total promotions</span>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-folder"></i>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters">
            <div class="filter-search">
                <form method="GET" action="index.php">
                    <input type="hidden" name="route" value="promo">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Rechercher..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                    <button type="submit"></button>
                </form>
            </div>
            <div class="filter-options">
                <select class="filter-select">
                    <option>Tous</option>
                </select>
                <div class="view-toggle">
                    <a href="index.php?route=promo&view=grid" class="<?php echo ($_GET['view'] ?? 'grid') === 'grid' ? 'active' : ''; ?>">Grille</a>
                    <a href="index.php?route=promo&view=list" class="<?php echo ($_GET['view'] ?? 'grid') === 'list' ? 'active' : ''; ?>">Liste</a>
                </div>
            </div>
        </div>

        <!-- Promotion Cards -->
        <div class="promotion-grid <?php echo ($_GET['view'] ?? 'grid') === 'list' ? 'list-mode' : 'grid-mode'; ?>">
         <?php foreach ($filtered_promotions as $promo): ?>
                <div class="promotion-card">
                    <div class="promo-header">
                        <div class="promo-logo">
                            <img src="<?php echo htmlspecialchars($promo['photo'] ?? '/assets/images/default-promo.png'); ?>" alt="<?php echo htmlspecialchars($promo['nom']); ?>">
                        </div>
                        <div class="promo-status">
                            <span class="status-badge <?php echo $promo['statut'] === 'active' ? 'active' : 'inactive'; ?>">
                                <?php echo ucfirst($promo['statut']); ?>
                            </span>
                            <a href="index.php?route=activatepromo&id=<?php echo $promo['id']; ?>" class="status-toggle <?php echo $promo['statut'] === 'active' ? 'active' : ''; ?>">
                                
                            </a>
                        </div>
                    </div>
                    <div class="promo-content">
                        <h3 class="promo-title"><?php echo htmlspecialchars($promo['nom']); ?></h3>
                        <div class="promo-date">
                            <i class="far fa-calendar"></i> <?php echo $promo['date_debut']; ?> - <?php echo $promo['date_fin']; ?>
                        </div>
                        <div class="promo-students">
                            <i class="fas fa-users"></i> 
                            <?php echo isset($promo['apprenants']) ? $promo['apprenants'] : 0; ?> apprenants
                        </div>
                    </div>
                    <div class="promo-actions">
                        <a href="#" class="view-details">
                            Voir détails <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>


