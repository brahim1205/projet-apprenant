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
            <a href="#" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"></path>
                </svg>
                Retour aux référentiels actifs
            </a>
        </div>
        
        <div class="page-title">
            <h1>Tous les Référentiels</h1>
            <p class="subtitle">Liste complète des référentiels de formation</p>
        </div>
        
<div class="search-bar-container">
    <div class="search-bar">
        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" placeholder="Rechercher un référentiel...">
    </div>
    <!-- Modification du lien ici -->
    <a href="index.php?route=ajoutref" class="create-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        Créer un référentiel
    </a>
</div>
        
<div class="cards-grid">
    <?php 
    $data = load_data();
    $referentiels = $data['Referentiel'] ?? [];
    
    foreach ($referentiels as $ref): ?>
        <div class="card">
            <div class="card-image">
                <?php if (!empty($ref['photo'])): ?>
                    <img src="<?php echo htmlspecialchars($ref['photo']); ?>" alt="<?php echo htmlspecialchars($ref['nom']); ?>">
                <?php else: ?>
                    <div class="no-image">Pas d'image</div>
                <?php endif; ?>
            </div>
            <div class="card-content">
                <h3 class="card-title"><?php echo htmlspecialchars($ref['nom']); ?></h3>
                <p class="card-description"><?php echo htmlspecialchars($ref['description']); ?></p>
                <div class="card-details">
                    <span>Capacité: <?php echo $ref['capacite']; ?> apprenants</span>
                    <span>Sessions: <?php echo $ref['sessions']; ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
            
            <!-- Card 2 -->
            <div class="card">
                <div class="card-image">
                    <img src="/api/placeholder/250/140" alt="Développement data" style="background-color: #8ECAE6;">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Développement data</h3>
                    <p class="card-description">De l'analyse du besoin à la data visualisation, en passant par la récolte des données</p>
                    <span class="card-capacity">Capacité: 25 places</span>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="card">
                <div class="card-image">
                    <img src="/api/placeholder/250/140" alt="Assistanat Digital" style="background-color: #636363;">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Assistanat Digital (Hackeuse)</h3>
                    <p class="card-description">La formation d'assistante digitale réservée uniquement aux femmes avec des compétences numériques</p>
                    <span class="card-capacity">Capacité: 25 places</span>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="card">
                <div class="card-image">
                    <img src="/api/placeholder/250/140" alt="AWS & DevOps" style="background-color: #F8A41B;">
                </div>
                <div class="card-content">
                    <h3 class="card-title">AWS & DevOps</h3>
                    <p class="card-description">De l'analyse des besoins au monitoring de l'infrastructure, en passant par le déploiement</p>
                    <span class="card-capacity">Capacité: 25 places</span>
                </div>
            </div>
            
            <!-- Card 5 -->
            <div class="card">
                <div class="card-image">
                    <img src="/api/placeholder/250/140" alt="Développement web/mobile" style="background-color: #7F7FD5;">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Développement web/mobile</h3>
                    <p class="card-description">De l'analyse du besoin à la mise en production</p>
                    <span class="card-capacity">Capacité: 25 places</span>
                </div>
            </div>
            
            <!-- Card 6 -->
            <div class="card">
                <div class="card-image">
                    <img src="/api/placeholder/250/140" alt="Cyber Sécurité" style="background-color: #213555;">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Cyber Sécurité</h3>
                    <p class="card-description">hhgggghghghghghghghghghghghj</p>
                    <span class="card-capacity">Capacité: 25 places</span>
                </div>
            </div>
        </div>
    </div>
