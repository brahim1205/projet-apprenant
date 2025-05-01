<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonatel - Dashboard Apprenants</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/layout.css">
    <link rel="stylesheet" href="/assets/css/apprenant/listepresence.css">
</head>
<body>
  
    <!-- Contenu principal -->
    <div class="main-content">
        <!-- En-tête avec recherche et utilisateur -->
        <div class="header">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search">
            </div>
            
            <div class="user-section">
                <div class="notification">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="user-avatar">
                    <img src="/api/placeholder/35/35" alt="User Avatar">
                </div>
                <div class="user-info">
                    <div>Awa Niang</div>
                    <small>Admin</small>
                </div>
            </div>
        </div>
        
        <!-- Fil d'ariane -->
        <div class="breadcrumb">
            <a href="#">Apprenants</a>
            <span>/</span>
            <span>Details</span>
        </div>
        
        <!-- Contenu principal et profil étudiant -->
        <div class="student-container">
            <!-- Barre latérale profil étudiant -->
            <div class="student-sidebar">
                <a href="#" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Retour sur la liste
                </a>
                
                <div class="student-profile">
                    <div class="student-avatar">
                        <img src="/api/placeholder/100/100" alt="Student Photo">
                    </div>
                    
                    <div class="student-name">Seydina Mouhammad Diop</div>
                    <div class="dev-badge">DEV WEB/MOBILE</div>
                    <div class="verified-badge">
                        <i class="fas fa-check-circle"></i> Vérifié
                    </div>
                </div>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+221 78 599 35 46</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>mouldiop7@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sipres 1 Villa 6099 Dakar</span>
                    </div>
                </div>
            </div>
            
            <!-- Zone de contenu principale -->
            <div class="content-area">
                <!-- Cartes statistiques -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>20</h3>
                            <p>Présence(s)</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>5</h3>
                            <p>Retard(s)</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon red">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>1</h3>
                            <p>Absence(s)</p>
                        </div>
                    </div>
                </div>
                
                <!-- Onglets -->
                <div class="tabs">
                    <div class="tab">Programme & Modules</div>
                    <div class="tab active">Liste de présences de l'apprenant</div>
                </div>
                
                <!-- Tableau des présences -->
                <div class="presence-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Matricule</th>
                                <th>Nom Complet</th>
                                <th>Date & Heure</th>
                                <th>Status</th>
                                <th>Justification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058215</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge absent">Absent</span></td>
                                <td><span class="justified"><i class="fas fa-check-circle"></i> Justifié</span></td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058216</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge absent">Absent</span></td>
                                <td><span class="not-justified"><i class="fas fa-times-circle"></i> Non justifié</span></td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058219</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge present">Présent</span></td>
                                <td>-</td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058220</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge present">Présent</span></td>
                                <td>-</td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058221</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge absent">Absent</span></td>
                                <td><span class="not-justified"><i class="fas fa-times-circle"></i> Non justifié</span></td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058222</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge retard">Retard</span></td>
                                <td><span class="not-justified"><i class="fas fa-times-circle"></i> Non justifié</span></td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-row-img">
                                        <img src="/api/placeholder/35/35" alt="Student">
                                    </div>
                                </td>
                                <td>1058223</td>
                                <td>Seydina Mouhammad Diop</td>
                                <td>10/02/2025 7:32</td>
                                <td><span class="status-badge present">Présent</span></td>
                                <td>-</td>
                                <td class="actions"><i class="fas fa-ellipsis-v"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-container">
                    <div class="pagination-info">
                        Apprenants/page: <span>10</span> | 1 à 10 apprenants pour 142
                    </div>
                    <div class="pagination-controls">
                        <div class="page-nav">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item">...</div>
                        <div class="page-item">10</div>
                        <div class="page-nav">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>