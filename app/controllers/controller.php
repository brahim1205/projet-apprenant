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

 
    Fonction::Render->value => function(string $layoutPath, string $contentPath, array $data = []): void {
        
        ob_start();
        include __DIR__ . $layoutPath;

        foreach ($data as $key => $value) {
            $$key = $value;  
        }

        include __DIR__ . $contentPath;
        
        
        echo ob_get_clean();
    }
];

