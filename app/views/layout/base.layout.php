<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sonatel Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/layout.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">      
  <link rel="stylesheet" href="/assets/css/apprenants.css">    
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/addreferentiel.css">

  <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ; ?>/assets/css/promo.css">
  

</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo-section">
        <img src="/assets/images/logo_odc.png" alt="Sonatel Logo" class="logo-img">
        <div class="badge">Promotion - 2025</div>
      </div>

      <nav class="menu">
        <a href="index.php?route=dashboard"><i class="ri-dashboard-line"></i><span>Tableau de bord</span></a>
        <a href="index.php?route=promo"><i class="ri-folder-2-line"></i><span>Promotions</span></a>
        <a href="index.php?route=referentiel"><i class="ri-folder-2-line"></i><span>Référentiels</span></a>
        <a href="index.php?route=apprenants"><i class="ri-user-3-line"></i><span>Apprenants</span></a>
        <a href="#"><i class="ri-calendar-check-line"></i><span>Gestion des présences</span></a>
        <a href="#"><i class="ri-laptop-line"></i><span>Kits & Laptops</span></a>
        <a href="#"><i class="ri-bar-chart-line"></i><span>Rapports & Stats</span></a>
      </nav>

      <!-- Bouton déconnexion tout en bas -->
      <div class="logout-section">
        <a href="index.php?route=logout" class="logout">
          <i class="ri-logout-box-r-line"></i><span>Déconnexion</span>
        </a>
      </div>
    </aside>

    <!-- Main -->
    <div class="main">
      <header class="topbar">
        <div class="search">
          <input type="text" placeholder="Rechercher...">
        </div>
        <div class="profile">
          <i class="ri-notification-3-line"></i>
          <div class="user">
            <div class="avatar">A</div>
            <div class="info">
              <span>admin@sonatel-academy.sn</span>
              <small>Administrateur</small>
            </div>
          </div>
        </div>
      </header>

      <!-- Section dynamique pour le contenu -->
      <div class="content">
        <?php echo $content ?? ''; ?>
      </div>
      <?php
      // Inclure dynamiquement le contenu de la page
      if (isset($content) && file_exists($content)) {
          require_once $content;
      } 
      ?>
    </div>
  </div>
</body>
</html>
