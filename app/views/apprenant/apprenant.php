<head>

    <link rel="stylesheet" href="/assets/css/apprenant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

    <div class="container">
        
        <div class="main-content">
           
            
            <div class="page-title">
                Apprenants 
                <span class="apprentice-count">
                    <?php echo isset($apprenants) ? count($apprenants) : '0'; ?> apprenants
                </span>
            </div>
            
            <form method="GET" action="index.php" class="filters">
                <input type="hidden" name="route" value="apprenant">
                
                <div class="search-input">
                    <input type="text" name="search" placeholder="Rechercher..." 
                           value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </div>
                
                <div class="filter-dropdown">
                    <select name="referentiel">
                        <option value="">Tous les référentiels</option>
                        <?php foreach ($referentiels as $ref): ?>
                            <option value="<?php echo $ref; ?>" 
                                <?php echo ($_GET['referentiel'] ?? '') === $ref ? 'selected' : ''; ?>>
                                <?php echo $ref; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="filter-dropdown">
                    <select name="statut">
                        <option value="">Tous les statuts</option>
                        <?php foreach ($statuts as $statut): ?>
                            <option value="<?php echo $statut; ?>"
                                <?php echo ($_GET['statut'] ?? '') === $statut ? 'selected' : ''; ?>>
                                <?php echo $statut; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-filter">Filtrer</button>
            </form>
            
            <div class="action-buttons">
                <form method="POST" action="index.php?route=exportapprenants">
                    <input type="hidden" name="filtered_data" value="<?php echo htmlspecialchars(json_encode($apprenants)); ?>">
                    <button type="submit" class="btn btn-outline">
                        <i class="fas fa-download"></i> Télécharger la liste
                    </button>
                </form>
                <a href="index.php?route=ajoutapprenant" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Ajouter apprenant
                 </a>
            </div>
            
            <div class="tabs">
                <div class="tab active">Liste des retenus</div>
                <div class="tab">Liste d'attente</div>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Matricule</th>
                            <th>Nom Complet</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Référentiel</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($apprenants) && is_array($apprenants)): ?>
                            <?php foreach ($apprenants as $apprenant): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo !empty($apprenant['photo']) ? 
                                            htmlspecialchars($apprenant['photo']) : 
                                            '/assets/images/default-profile.png'; ?>" 
                                            alt="Profile" class="profile-pic">
                                    </td>
                                    <td><?php echo htmlspecialchars($apprenant['matricule']); ?></td>
                                    <td><?php echo htmlspecialchars($apprenant['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($apprenant['adresse']); ?></td>
                                    <td><?php echo htmlspecialchars($apprenant['telephone']); ?></td>
                                    <td>
                                        <span class="referentiel ref-<?php echo strtolower(str_replace(' ', '-', $apprenant['referentiel'])); ?>">
                                            <?php echo htmlspecialchars($apprenant['referentiel']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status status-<?php echo strtolower($apprenant['statut']); ?>">
                                            <?php echo htmlspecialchars($apprenant['statut']); ?>
                                        </span>
                                    </td>
                                    <td class="action-menu">
                                        <a href="index.php?route=editapprenant&id=<?php echo $apprenant['id']; ?>" class="btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="index.php?route=deleteapprenant" style="display: inline;">
                                            <input type="hidden" name="id" value="<?php echo $apprenant['id']; ?>">
                                            <button type="submit" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet apprenant ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Aucun apprenant trouvé</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="pagination">
                <div class="page-info">
                    <span>Apprenants/page</span>
                    <select>
                        <option>10</option>
                    </select>
                </div>
                <div class="pagination-info">1 à 10 apprenants pour 142</div>
                <div class="pagination-controls">
                    <div class="page-button"><i class="fas fa-chevron-left"></i></div>
                    <div class="page-button active">1</div>
                    <div class="page-button">2</div>
                    <div class="page-button">...</div>
                    <div class="page-button">10</div>
                    <div class="page-button"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
