<head>
  <link rel="stylesheet" href="/assets/css/addpromo.css">
</head>

<div class="overlay">
  <div class="modal">
    <h2>Créer une nouvelle promotion</h2>
    <p class="subtitle">Remplissez les informations ci-dessous pour créer une nouvelle promotion.</p>

    <form class="form" method="POST" action="index.php?route=addpromotion" enctype="multipart/form-data">
      <label>Nom de la promotion</label>
      <input type="text" name="nom" placeholder="Ex : Promotion 2025" required>

      <div class="form-row">
        <div>
          <label>Date de début</label>
          <input type="date" name="date_debut" required>
        </div>
        <div>
          <label>Date de fin</label>
          <input type="date" name="date_fin" required>
        </div>
      </div>

      <label>Référentiel</label>
      <input type="text" name="referentiel" placeholder="Rechercher un référentiel..." required>

      <label>Photo de la promotion</label>
      <input type="file" name="photo" accept="image/*" required>

      <div class="buttons">
        <button type="button" class="btn-cancel" onclick="window.location.href='index.php?route=promo'">Annuler</button>
        <button type="submit" class="btn-create">Créer la promotion</button>
      </div>
    </form>
  </div>
</div>

<div class="promo-logo">
    <img src="<?php echo htmlspecialchars($promo['photo'] ?? '/assets/images/default-promo.png'); ?>" alt="<?php echo htmlspecialchars($promo['nom']); ?>">
</div>
