<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonatel Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f7;
            padding: 20px;
        }
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
        }
        .top-cards {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            flex-grow: 1;
            padding: 15px;
        }
        .orange-card {
            background-color: #FF7900;
            color: white;
            display: flex;
            padding: 20px;
            align-items: center;
        }
        .orange-card .icon {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        .orange-card .number {
            font-size: 28px;
            font-weight: bold;
        }
        .orange-card .label {
            font-size: 14px;
            opacity: 0.9;
        }
        .chart-section {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .chart-title {
            font-size: 18px;
            font-weight: 500;
        }
        .dropdown {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
        }
        .chart {
            height: 250px;
            position: relative;
        }
        .chart-legend {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-bottom: 10px;
        }
        .legend-item {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 2px;
            margin-right: 5px;
        }
        .bars-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            height: 200px;
        }
        .month-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 7%;
        }
        .bar-stack {
            width: 100%;
            display: flex;
            flex-direction: column-reverse;
        }
        .bar {
            width: 100%;
            border-radius: 4px 4px 0 0;
        }
        .presence {
            background-color: #00917A;
        }
        .retard {
            background-color: #B8E8E0;
        }
        .absence {
            background-color: #FF7900;
        }
        .month-label {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }
        .bottom-row {
            display: flex;
            gap: 20px;
        }
        .bottom-left {
            flex: 2;
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .bottom-right {
            flex: 5;
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .header-with-logo {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }
        .sonatel-logo {
            text-align: right;
        }
        .sonatel-logo .orange-text {
            color: #FF7900;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .sonatel-logo .sonatel-text {
            color: #00917A;
            font-size: 24px;
            font-weight: bold;
        }
        .orange-square {
            width: 24px;
            height: 24px;
            background-color: #FF7900;
            margin-left: 10px;
        }
        .donut-chart {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 20px auto;
        }
        .donut-chart.small {
            width: 120px;
            height: 120px;
        }
        .donut-hole {
            position: absolute;
            width: 60%;
            height: 60%;
            background-color: white;
            border-radius: 50%;
            top: 20%;
            left: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 24px;
        }
        .donut-hole .percentage {
            font-size: 14px;
        }
        .stats-row {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin-top: 30px;
        }
        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            background-color: #00917A;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 14px;
            color: #00917A;
        }
        .apprenant-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .apprenant-icon {
            width: 40px;
            height: 40px;
            background-color: #FF7900;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
        }
        .mini-stats {
            display: flex;
            justify-content: space-between;
            max-width: 180px;
            margin: 20px auto;
        }
        .mini-stat {
            text-align: center;
            background-color: #f5f5f7;
            padding: 10px;
            border-radius: 8px;
            min-width: 50px;
        }
        .mini-stat-value {
            font-weight: bold;
        }
        .mini-stat-label {
            font-size: 12px;
            color: #666;
        }
        .menu-dots {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
        .dot {
            width: 6px;
            height: 6px;
            background-color: #999;
            border-radius: 50%;
            margin: 0 2px;
        }
        .percentage-indicator {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        .arrow-up {
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 12px solid #00A651;
            margin-right: 5px;
        }
        .arrow-down {
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-top: 12px solid #FF7900;
            margin-right: 5px;
        }
        .percentage-value {
            font-weight: bold;
        }
        .percentage-value.up {
            color: #00A651;
        }
        .percentage-value.down {
            color: #FF7900;
        }
        .centre-item {
            text-align: center;
        }
        .centres-list {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Top Cards -->
        <div class="top-cards">
            <div class="orange-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <div>
                    <div class="number">180</div>
                    <div class="label">Apprenants</div>
                </div>
            </div>
            <div class="orange-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div>
                    <div class="number">5</div>
                    <div class="label">Différentiels</div>
                </div>
            </div>
            <div class="orange-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 8v8"/>
                        <path d="M8 12h8"/>
                    </svg>
                </div>
                <div>
                    <div class="number">5</div>
                    <div class="label">Stagiaires</div>
                </div>
            </div>
            <div class="orange-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                        <line x1="12" y1="8" x2="12" y2="16"/>
                    </svg>
                </div>
                <div>
                    <div class="number">13</div>
                    <div class="label">Permanant</div>
                </div>
            </div>
        </div>

        <!-- Menu dots -->
        <div class="menu-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <!-- Charts Section -->
        <div class="chart-section">
            <div class="chart-header">
                <div class="chart-title">Présences statistiques</div>
                <select class="dropdown">
                    <option>This Month</option>
                </select>
            </div>

            <div class="chart-legend">
                <div class="legend-item">
                    <div class="legend-color presence"></div>
                    <span>Présence</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color retard"></div>
                    <span>Retard</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color absence"></div>
                    <span>Absences</span>
                </div>
            </div>

            <div class="chart">
                <div class="bars-container">
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 15px;"></div>
                            <div class="bar retard" style="height: 25px;"></div>
                            <div class="bar presence" style="height: 60px;"></div>
                        </div>
                        <div class="month-label">Jan</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 10px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 70px;"></div>
                        </div>
                        <div class="month-label">Feb</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 10px;"></div>
                            <div class="bar retard" style="height: 15px;"></div>
                            <div class="bar presence" style="height: 85px;"></div>
                        </div>
                        <div class="month-label">Mar</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 15px;"></div>
                            <div class="bar retard" style="height: 25px;"></div>
                            <div class="bar presence" style="height: 60px;"></div>
                        </div>
                        <div class="month-label">Apr</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 20px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 45px;"></div>
                        </div>
                        <div class="month-label">May</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 15px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 65px;"></div>
                        </div>
                        <div class="month-label">Jun</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 10px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 70px;"></div>
                        </div>
                        <div class="month-label">Jul</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 5px;"></div>
                            <div class="bar retard" style="height: 30px;"></div>
                            <div class="bar presence" style="height: 85px;"></div>
                        </div>
                        <div class="month-label">Aug</div>
                        <div style="position: absolute; top: 80px; left: 50%; transform: translateX(-50%); font-size: 12px; font-weight: bold; color: white; background-color: #00917A; padding: 3px 6px; border-radius: 4px;">72</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 10px;"></div>
                            <div class="bar retard" style="height: 25px;"></div>
                            <div class="bar presence" style="height: 65px;"></div>
                        </div>
                        <div class="month-label">Sep</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 15px;"></div>
                            <div class="bar retard" style="height: 30px;"></div>
                            <div class="bar presence" style="height: 55px;"></div>
                        </div>
                        <div class="month-label">Oct</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 20px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 50px;"></div>
                        </div>
                        <div class="month-label">Nov</div>
                    </div>
                    <div class="month-column">
                        <div class="bar-stack">
                            <div class="bar absence" style="height: 5px;"></div>
                            <div class="bar retard" style="height: 20px;"></div>
                            <div class="bar presence" style="height: 80px;"></div>
                        </div>
                        <div class="month-label">Dec</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="bottom-row">
            <!-- Left Card -->
            <div class="bottom-left">
                <div class="apprenant-header">
                    <div class="apprenant-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="number">180</div>
                        <div class="label">Apprenants</div>
                    </div>
                </div>

                <div class="donut-chart">
                    <svg width="150" height="150" viewBox="0 0 100 100">
                        <path d="M50,50 L50,0 A50,50 0 0,1 96.6,65 Z" fill="#00917A" />
                        <path d="M50,50 L96.6,65 A50,50 0 0,1 50,100 Z" fill="#00917A" />
                        <path d="M50,50 L50,100 A50,50 0 0,1 3.4,35 Z" fill="#00917A" />
                        <path d="M50,50 L3.4,35 A50,50 0 0,1 14,7 Z" fill="#FF7900" />
                        <path d="M50,50 L14,7 A50,50 0 0,1 50,0 Z" fill="#FF7900" />
                    </svg>
                    <div class="donut-hole">
                        <div class="percentage-indicator">
                            <div class="arrow-up"></div>
                            <div class="percentage-value up">65%</div>
                        </div>
                    </div>
                </div>

                <div class="percentage-indicator" style="justify-content: center;">
                    <div class="arrow-down"></div>
                    <div class="percentage-value down">35%</div>
                </div>

                <div class="mini-stats">
                    <div class="mini-stat">
                        <div class="mini-stat-value">180</div>
                        <div class="mini-stat-label">Apprenants</div>
                    </div>
                    <div class="mini-stat">
                        <div class="mini-stat-value">2025</div>
                        <div class="mini-stat-label">Promotion</div>
                    </div>
                    <div class="mini-stat">
                        <div class="mini-stat-value">10</div>
                        <div class="mini-stat-label">Mois</div>
                    </div>
                </div>
            </div>

            <!-- Right Card -->
            <div class="bottom-right">
                <div class="header-with-logo">
                    <div class="sonatel-logo">
                        <div class="orange-text">Orange Digital Center</div>
                        <div class="sonatel-text">sonatel</div>
                    </div>
                    <div class="orange-square"></div>
                </div>

                <div class="stats-row">
                    <div class="stat-item">
                        <div class="donut-chart small">
                            <svg width="120" height="120" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="transparent" stroke="#00917A" stroke-width="10" />
                            </svg>
                            <div class="donut-hole">
                                100<span class="percentage">%</span>
                            </div>
                        </div>
                        <div class="stat-label">Taux d'insertion Professionnelle</div>
                    </div>

                    <div class="stat-item">
                        <div class="donut-chart small">
                            <svg width="120" height="120" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="transparent" stroke="#E3F5F3" stroke-width="10" />
                                <path d="M50,5 A45,45 0 0,1 84.6,25 L50,50 Z" fill="#00917A" />
                                <path d="M50,5 A45,45 0 0,1 95,50 L50,50 Z" fill="#00917A" />
                            </svg>
                            <div class="donut-hole">
                                56<span class="percentage">%</span>
                            </div>
                        </div>
                        <div class="stat-label">Taux de Féminisation</div>
                    </div>

                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div class="stat-value">1000</div>
                        <div class="stat-label">Développeurs</div>
                    </div>

                    <div class="stat-item centre-item">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="stat-value">4 Centres</div>
                        <div class="centres-list">Dakar, Diamniado, Ziguinchor, et Saint Louis</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>