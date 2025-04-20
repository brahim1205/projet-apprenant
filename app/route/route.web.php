<?php
declare(strict_types=1);

use App\Controllers;
use App\Enums\Fonction\Fonction;

session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$allowedPaths = ['/login', '/logout', '/MDP'];

if (in_array($path, $allowedPaths, true)) {
    $authController = require __DIR__ . Chemins::Controller->value;

    if ($path === '/login') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController['login']($_POST);
        } else {
            include __DIR__ . Chemins::ViewLogin->value;
        }
    } elseif ($path === '/logout') {
        $authController['logout']();
    } elseif ($path === '/MDP') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController['changerPassword']($_POST);
        } else {
            include __DIR__ . Chemins::ChangePass->value;
        }
    }

    exit;
}

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
}

$promotionController = require __DIR__ . Chemins::PromoController->value;
$referentielController = require __DIR__ . Chemins::RefController->value;
$authController = require __DIR__ . Chemins::Controller->value;

$routes = [
    '/promotion' => function() use ($promotionController) {
        $recherche = $_GET['recherche'] ?? '';
        if (!empty($recherche)) {
            $promotionController['trouverPromoGrille']($recherche);
        } else {
            $promotionController['afficherAllPromo']();
        }
    },

    '/promotion/liste' => function() use ($promotionController) {
        $recherche = $_GET['recherche'] ?? '';
        if (!empty($recherche)) {
            $promotionController['trouverPromoListe']($recherche);
        } else {
            $promotionController['affichageListe']();
        }
    },

    '/promotion/ajout' => function() use ($promotionController) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $promotionController['ajoutPromo'](
                $_POST['nomPromo'] ?? '',
                $_POST['dateDebut'] ?? '',
                $_POST['dateFin'] ?? '',
                $_FILES['photoPromo'] ?? [],
                $_POST['referentiel'] ?? ''
            );
        }
    },

    '/referentiels' => $referentielController['affichageRef'],

    '/referentiels/ajout' => function() use ($referentielController) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $referentielController['ajoutReferentiel'](
                $_POST['nomReferentiel'] ?? '',
                $_POST['description'] ?? '',
                $_FILES['photoReferentiel'] ?? []
            );
        }
    },
];

if (isset($routes[$path])) {
    $handler = $routes[$path];
    $handler();
} else {
    http_response_code(404);
    echo "Page non trouvée.";
}
