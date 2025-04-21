<?php
    declare(strict_types=1);

    namespace App\ControllersReferentiel;

    use App\Enums\Fonction\Fonction;
    use Chemins;
    $controller=require __DIR__ . "/controller.php";
    function affichageRef(): void
    {
        $donnee = include __DIR__ . Chemins::Model->value;
        $database = $donnee['database'];

        $serviceRef = include __DIR__ . Chemins::ServiceRef->value;
        $infoRef = $serviceRef['afficherAllRef']($database);

        $ref = include __DIR__ . Chemins::Referentiel->value;
        $layout = include __DIR__ . Chemins::Layout->value;

        echo $layout($ref($infoRef));
    }

    function affichageToutRef(): void
    {

        $donnee = include __DIR__ . Chemins::Model->value;
        $database = $donnee['database'];

        $serviceRef = include __DIR__ . Chemins::ServiceRef->value;
        $infoRef = $serviceRef['afficherAllRef']($database);

        $ref = include __DIR__ . Chemins::Tous_referentiel->value;
        $layout = include __DIR__ . Chemins::Layout->value;

        echo $layout($ref($infoRef));
        // $contro=include __DIR__ .Chemins::ControllerPrincipale->value;

        // $donnee = include __DIR__ . Chemins::Model->value;
        // $database = $donnee['database'];

        // $serviceRef = include __DIR__ . Chemins::ServiceRef->value;
        // $infoRef = $serviceRef['afficherAllRef']($database);



        // $contro[Fonction::Render->value](
        //     Chemins::Layout1->value, 
        //     Chemins::Tous_referentiel->value, 
        //     [
        //         'referentiels' => $infoRef,
        //         'title' => 'Référentiels',
        //         'message' => 'Bienvenue sur la page des référentiels',
        //     ]
        // );
        
    }

    return [
        Fonction::AffichageRef->value => 'App\ControllersReferentiel\affichageRef',
        Fonction::AffichageToutRef->value  => 'App\ControllersReferentiel\affichageToutRef',
    ];