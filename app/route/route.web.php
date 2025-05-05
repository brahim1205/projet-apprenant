<?php

define('APP_PATH', __DIR__ . '/../');
define('BASE_URL', '/projets/ges-apprenant');

require_once APP_PATH . 'controller/controller.php'; // Inclure le fichier contenant render()

session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user']) && ($_REQUEST['route'] ?? '') !== 'login') {
    header('Location: index.php?route=login');
    exit();
}

$route = $_REQUEST['route'] ?? 'dashboard';

$result = match ($route) {
    'login' => function () {
        require_once APP_PATH . 'controller/login.controller.php';
        login_index();
    },
    'dashboard' => function () {
        render('dashboard/dashboard');
    },
    'promo' => function () {
        render('promo/promo');
    },
    'referentiel' => function () {
        render('referentiel/referentiel');
    },
    'apprenants' => function () {
        render('apprenant/apprenant');
    },
    'presences' => function () {
        render('presences/presences');
    },
    'kits' => function () {
        render('kits/kits');
    },
    'rapports' => function () {  
        render('rapports/rapports');   
    },
    'forgot-password' => function() {
        render('login/forgot-password');
    },
    'logout' => function () {
        session_destroy();
        session_unset();
        header('Location: index.php?route=login');
        exit();
    },
    'addpromotion' => function () {
        require_once APP_PATH . 'controller/promo.controller.php';
        promo_add();
    },
    'activatepromo' => function () {
        require_once APP_PATH . 'controller/promo.controller.php';
        promo_activate($_GET['id']);
    },
    'addreferentiel' => function () {
        $content = APP_PATH . '/views/referentiel/addreferentiel.php'; // Chemin vers la page
        require_once APP_PATH . '/views/layout/base.layout.php'; // Inclure le layout
    },
    'savereferentiel' => function () {
        require_once APP_PATH . 'controller/referentiel.controller.php';
        save_referentiel();
    },
    'toutreferentiel' => function () {
        $content = APP_PATH . '/views/referentiel/tout_referentiel.php';
        require_once APP_PATH . '/views/layout/base.layout.php';
    },
    'ajoutref' => function () {
        $content = APP_PATH . '/views/referentiel/ajoutref.php';
        require_once APP_PATH . '/views/layout/base.layout.php';
    },
    default => function () {
        // Affiche la page 404 hors du layout
        require_once APP_PATH . 'views/acceuil/erreur404.php';
    }
};

$result();
