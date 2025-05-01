<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonatel - Dashboard Apprenants</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/programme&module.css">
</head>
<body>

    
    <div class="content-wrapper">
        <!-- Colonne de gauche - Profil étudiant -->
        <div class="student-sidebar">
            <a href="#" class="back-btn">
                <i class="fas fa-arrow-left"></i> Retour sur la liste
            </a>
            
            <div class="student-profile">
                <div class="student-avatar">
                    <img src="/api/placeholder/120/120" alt="Student Photo">
                </div>
                
                <div class="student-name">Seydina Mouhammad Diop</div>
                <div class="dev-badge">DEV FULLSTACK</div>
                <div class="verified-badge">
                    <i class="fas fa-check-circle"></i> Vérifié
                </div>
            </div>
            
            <div class="student-contact">
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
        
        <!-- Colonne de droite - Contenu principal -->
        <div class="main-content">
            <div class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                
                <div class="user-section">
                    <div class="notification">
                        <i class="fas fa-bell"></i>
                    </div>
                    <img src="/api/placeholder/40/40" alt="User Avatar" class="user-avatar">
                    <div>
                        <div>Awa Niang</div>
                        <small>Admin</small>
                    </div>
                </div>
            </div>
            
            <div class="breadcrumb">
                <a href="#">Apprenants</a>
                <span>/</span>
                <span>Details</span>
            </div>
            
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
            
            <div class="navigation-tabs">
                <div class="tab active">Programme & Modules</div>
                <div class="tab">Total absences par étudiant</div>
            </div>
            
            <div class="modules-grid">
                <!-- Module 1 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 30 jours
                        </div>
                        <h3 class="module-title">Algorithme & Langage C</h3>
                        <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>15 Février 2025</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 2 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 15 jours
                        </div>
                        <h3 class="module-title">Frontend 1: Html, Css & JS</h3>
                        <p class="module-description">Créer des interfaces de design avec articulation avancée</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>24 Mars 2025</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 3 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 20 jours
                        </div>
                        <h3 class="module-title">Backend 1: PhpPhp avancées & POO</h3>
                        <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>23 Mar 2024</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 4 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 15 jours
                        </div>
                        <h3 class="module-title">Frontend 2: JS & TS + Tailwind</h3>
                        <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>23 Mar 2024</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 5 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 20 jours
                        </div>
                        <h3 class="module-title">Backend 2: Laravel & SOLID</h3>
                        <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>23 Mar 2024</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 6 -->
                <div class="module-card">
                    <div class="module-header">
                        <div class="menu-dots">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="module-duration">
                            <i class="fas fa-calendar"></i> 15 jours
                        </div>
                        <h3 class="module-title">Frontend 3: ReactJs</h3>
                        <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                        <div class="module-tag">TERMINÉ</div>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-date">
                            <i class="far fa-calendar"></i>
                            <span>23 Mar 2024</span>
                        </div>
                        <div class="module-date">
                            <i class="far fa-clock"></i>
                            <span>12:45 pm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>