<head>
  <link rel="stylesheet" href="/assets/css/addpromo.css">
</head>
<style>
  
</style>
<div class="overlay">
  <div class="modal">
    <h2>Créer une nouvelle promotion</h2>
    <p class="subtitle">Remplissez les informations ci-dessous pour créer une nouvelle promotion.</p>

    <form class="form" method="POST" action="index.php?route=addpromotion" enctype="multipart/form-data">
      <label>Nom de la promotion</label>
      <input type="text" name="nom" placeholder="Ex : Promotion 2025" >

      <div class="form-row">
        <div>
          <label>Date de début</label>
          <input type="date" name="date_debut" >
        </div>
        <div>
          <label>Date de fin</label>
          <input type="date" name="date_fin" >
        </div>
      </div>

      <label>Référentiel</label>
      <input type="text" name="referentiel" placeholder="Rechercher un référentiel..." >

      <label>Photo de la promotion</label>
      <input type="file" name="photo" accept="image/*" >

      <div class="buttons">
        <button type="button" class="btn-cancel" onclick="window.location.href='index.php?route=promo'">Annuler</button>
        <button type="submit" class="btn-create">Créer la promotion</button>
      </div>
    </form>
  </div>
</div>


