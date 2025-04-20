<?php
namespace App\ModelsRef;
use App\Enums\Fonction\Fonction;
return [
    Fonction::ajouterRef->value => function(array &$database, string $nomModule, int $nbrModule, string $desRef, int $nbrApr, $photoRef) {
        $database['Module'][] = [
            'Nom' => $nomModule,
            'NombresModule' => $nbrModule,
            'Description' => $desRef,
            'NombresApprenant' => $nbrApr,
            'photoRef' => $photoRef,
        ];
        return true;
    },
    Fonction::afficherAllRef->value => fn($database) => $database['Referentiels'],

];
?>
