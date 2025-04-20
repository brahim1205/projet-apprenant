<?php
//factorise les fonctions communes a plusieurs controller
//il veut ici redirection ,render,savePhoto
declare(strict_types=1);

namespace App\Controllers;
use Chemins;
// include __DIR__ .Chemins::EnumFonction->value;
use App\Enums\Fonction\Fonction;

return [
    Fonction::Redirection->value => function(string $routes): void {
        header("Location:/" . $routes);
        exit;
    },

    Fonction::Inclusion->value => fn(string $routes) =>include __DIR__ . $routes,

    Fonction::ReqOnce->value => fn(string $routes) =>require_once __DIR__ . $routes,

    Fonction::Req->value => fn(string $routes) =>require __DIR__ . $routes,

    Fonction::Render->value => fn(string $routes) =>require __DIR__ . $routes,

    

];