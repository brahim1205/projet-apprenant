<?php
    declare(strict_types=1);

    namespace App\Controllersdescription;

    use App\Enums\Fonction\Fonction;
    use App\MESS\Enums\Textes;
    use Chemins;
    $controller=require __DIR__ . "/controller.php";
    $modelRef = $controller[Fonction::Inclusion->value](Chemins::ServiceRef->value);

    function ajoutdescription(array $params, array $modelRef,$controller)
    {
        $donnee = include __DIR__ . Chemins::Model->value;
        $database = &$donnee['database'];
        $databaseFile = $donnee['databaseFile'];
        $nomRef = $params['nomRef'] ?? '';
        $description = $params['description'] ?? '';
        $photoref = $_FILES['photo'] ?? null;
        $nbrModule = (int)$params['nbrModule'] ?? 0;
        $nbrApprenant = (int)$params['nbrApprenant'] ??0;
    
        $erreurs = [];
    
        if (empty($description) || empty($nomRef) || empty($nbrApprenant) || empty($nbrModule) || empty($photoref['name'])) {
            $erreurs[] = Textes::TLO->value;
        }
    
    
        if (!$modelRef['unicite']($database, $nomRef)) {
            $erreurs[] = Textes::PromoExiste->value;
        }
    
        if (!empty($erreurs)) {
            
            return $erreurs;
        }
    
        $photorefPath= $controller[Fonction::SavePhoto->value]($photoref);
    
        if ($modelRef['ajouterPromo']($database, $nomRef, $nbrApprenant, $nbrModule, $description, $photorefPath)) {
            $controller[Fonction::FPC->value]($databaseFile, $database);
            $_SESSION['message'] = Textes::AjoutSuccess->value;
            return [];
        }
    
        return ["Erreur lors de l'ajout dans la base de données"];
    }
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
    
        
    }

    return [
        Fonction::AffichageRef->value => 'App\Controllersdescription\affichageRef',
        Fonction::AffichageToutRef->value  => 'App\Controllersdescription\affichageToutRef',
    ];