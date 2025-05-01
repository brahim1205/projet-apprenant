<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion - Sonatel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">


        <!-- Main -->
        <main class="main">
            <header class="header">
                <h2>Promotion</h2>
                <button class="btn-primary">+ Ajouter promotion</button>
            </header>

            <section class="cards">
                <div class="card">
                    <h3>180</h3>
                    <p>Apprenants</p>
                </div>
                <div class="card">
                    <h3>5</h3>
                    <p>Interférences</p>
                </div>
                <div class="card">
                    <h3>5</h3>
                    <p>Stages</p>
                </div>
                <div class="card">
                    <h3>13</h3>
                    <p>Partenaires</p>
                </div>
            </section>

            <section class="filters">
                <input type="text" placeholder="Rechercher...">
                <select>
                    <option>Filtrer par classe</option>
                </select>
                <select>
                    <option>Filtrer par statut</option>
                </select>
            </section>

            <section class="table-section">
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Promotion</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Niveau réel</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple ligne -->
                        <tr>
                            <td><img src="photo.jpg" class="photo" alt="Photo"></td>
                            <td>Promotion 2023</td>
                            <td>04/03/2023</td>
                            <td>05/03/2023</td>
                            <td>
                                <span class="badge green">DEV-WEB-MOBILE</span>
                                <span class="badge blue">REF-DIG</span>
                            </td>
                            <td><span class="status actif">Actif</span></td>
                            <td>...</td>
                        </tr>
                        <!-- Répéter -->
                    </tbody>
                </table>

                <div class="pagination">
                    <button>1</button>
                    <button>2</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
