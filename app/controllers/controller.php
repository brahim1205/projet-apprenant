<?php
//factorise les fonctions communes a plusieurs controller
//il veut ici redirection ,render,savePhoto
declare(strict_types=1);

namespace App\Controllers;
use Chemins;

use App\Enums\Fonction\Fonction;

return [
    Fonction::Redirection->value => function(string $routes): void {
        header("Location:/" . $routes);
        exit;
    },

    Fonction::Inclusion->value => fn(string $routes) =>include __DIR__ . $routes,

    Fonction::ReqOnce->value => fn(string $routes) =>require_once __DIR__ . $routes,

    Fonction::Req->value => fn(string $routes) =>require __DIR__ . $routes,

     // Fonction Render modifiée pour accepter des données
    Fonction::Render->value => function(string $layoutPath, string $contentPath, array $data = []): void {
        // Inclure le layout de base
        ob_start();
        include __DIR__ . $layoutPath;

        // Passer les données à la vue de contenu
        // Si vous avez des variables spécifiques à passer dans le layout, vous pouvez les définir ici
        foreach ($data as $key => $value) {
            $$key = $value;  // Crée une variable dynamique avec le nom du key et la valeur correspondante
        }

        // Inclure la vue spécifique (contenu)
        include __DIR__ . $contentPath;
        
        // Affichage de tout le contenu
        echo ob_get_clean();
    }
];

