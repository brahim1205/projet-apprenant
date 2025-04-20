<?php
declare(strict_types=1);

namespace App\ControllersPromo;
use App\Enums\Fonction\Fonction;
use App\MESS\Enums\Textes;
use Chemins;

$servicePromo = include __DIR__ . Chemins::ServicePromo->value;
$validator = include __DIR__ . Chemins::Validator->value;

function redirectionPromo(string $path): void {
    header("Location:/" . $path);
    exit;
}

function ajoutPromo(array $params, array $validator, array $servicePromo): array {
    $donnee = include __DIR__ . Chemins::Model->value;
    $database = &$donnee['database'];
    $databaseFile = $donnee['databaseFile'];

    $nomPromo = $params['nomPromo'] ?? '';
    $dateDebut = $params['date_debut'] ?? '';
    $dateFin = $params['date_fin'] ?? '';
    $referentiel = $params['referentiel'] ?? '';
    $photoPromo = $_FILES['photo'] ?? null;

    $erreurs = [];

    if (empty($referentiel) || empty($nomPromo) || empty($dateDebut) || empty($dateFin) || empty($photoPromo['name'])) {
        $erreurs[] = Textes::TLO->value;
    }

    if (!$validator['date_Valide']($dateDebut) || !$validator['date_Valide']($dateFin)) {
        $erreurs[] = "Date invalide";
    } else {
        if (!$validator['dateDebut_Inferieur_DateFin']($dateDebut, $dateFin)) {
            $erreurs[] = "La date de début doit être inférieure ou égale à la date de fin.";
        }
    }

    if (!$servicePromo['unicite']($database, $nomPromo)) {
        $erreurs[] = Textes::PromoExiste->value;
    }

    if (!empty($erreurs)) {
        
        return $erreurs;
    }

    $rootPath = dirname(__DIR__, 2);
    $uploadDir = $rootPath . '/public' . Chemins::CheminAssetImage->value;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filename = basename($photoPromo['name']);
    move_uploaded_file($photoPromo['tmp_name'], $uploadDir . '/' . $filename);
    $photoPromoPath = '/' . $filename;

    if ($servicePromo['ajouterPromo']($database, $nomPromo, $dateDebut, $dateFin, $referentiel, $photoPromoPath)) {
        file_put_contents($databaseFile, json_encode($database, JSON_PRETTY_PRINT));
        $_SESSION['message'] = Textes::AjoutSuccess->value;
        return [];
    }

    return ["Erreur lors de l'ajout dans la base de données"];
}




function affichageAllPromo(array $servicePromo): void {
    $donnee = include __DIR__ . Chemins::Model->value;
    $database = $donnee['database'];

    $infoPromo = $servicePromo['afficherAllPromo']($database);

    $promotions = array_filter($infoPromo, function($promo) {
        return 
            isset($promo['MatriculePromo'], $promo['filiere'], $promo['photoPromo'], $promo['debut'], $promo['fin']) &&
            !empty($promo['MatriculePromo']) && !empty($promo['filiere']) && !empty($promo['photoPromo']) && !empty($promo['debut']) && !empty($promo['fin']);
    });


    $promotions = array_values($promotions); 

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
    $perPage = 6; 

    $totalPromotions = count($promotions);
    $totalPages = ceil($totalPromotions / $perPage);

    $offset = ($page - 1) * $perPage;
    $promotionsPage = array_slice($promotions, $offset, $perPage);


    $data = [
        'Promotion' => $promotionsPage,
        'nbrRef' => $servicePromo['nbrFilieres']($database),
        'nbrProm' => $servicePromo['nbrPromo']($database),
        'nbrAppr' => $servicePromo['nbrAppr']($database),
        'totalPages' => $totalPages,
        'pageActuelle' => $page,
    ];

    $grillePromotion = include __DIR__ . Chemins::Promotion->value;
    $layout = include __DIR__ . Chemins::Layout->value;

    echo $layout($grillePromotion($data));
}

function trouverPromo($nomPromo, $servicePromo,$mode) {
    $donnee = include __DIR__ . Chemins::Model->value;
    $database = $donnee['database'];

    $promoCherchee = $servicePromo['chercherPromo'](database: $database, nomPromo: $nomPromo);

    if ($promoCherchee) {
       
        if (!isset($promoCherchee[0])) {
            $promoCherchee = [$promoCherchee];
        }
    
        $data = [
            'Promotion' => $promoCherchee,
            'nbrRef' => $servicePromo['nbrFilieres']($database),
            'nbrProm' => $servicePromo['nbrPromo']($database),
            'nbrAppr' => $servicePromo['nbrAppr']($database),
        ];
    } else {
        $data = [
            'Promotion' => null,
            'message' => 'Aucune promotion trouvée pour ce terme de recherche.'
        ];
    }
    




    echo $mode($data);


}

function affichageListe(array $servicePromo){
    $donnee = include __DIR__ . Chemins::Model->value;
    $database = $donnee['database'];

    $infoPromo = $servicePromo['afficherAllPromo']($database);
    $promotions = array_filter($infoPromo, function($promo) {
        return
            isset($promo['MatriculePromo'], $promo['filiere'], $promo['photoPromo'], $promo['debut'], $promo['fin']) &&
            !empty($promo['MatriculePromo']) && !empty($promo['filiere']) && !empty($promo['photoPromo']) && !empty($promo['debut']) && !empty($promo['fin']);
    });


    $promotions = array_values($promotions);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 6;

    $totalPromotions = count($promotions);
    $totalPages = ceil($totalPromotions / $perPage);

    $offset = ($page - 1) * $perPage;
    $promotionsPage = array_slice($promotions, $offset, $perPage);


    $data = [
        'Promotion' => $promotionsPage,
        'REF'=>$database['Referentiels'],
        'nbrRef' => $servicePromo['nbrFilieres']($database),
        'nbrProm' => $servicePromo['nbrPromo']($database),
        'nbrAppr' => $servicePromo['nbrAppr']($database),
        'totalPages' => $totalPages,
        'pageActuelle' => $page,
    ];

    

    $ListePromotion = include __DIR__ . Chemins::PromotionListe->value;


    echo  $ListePromotion($data);
}

$grillePromoti= include __DIR__ . Chemins::Promotion->value;
$layout = include __DIR__ . Chemins::Layout->value;

$grillePromotion=fn($data)=>$layout($grillePromoti($data));

$ListePromotion = include __DIR__ . Chemins::PromotionListe->value;


return [
    Fonction::ajoutPromo->value => function(array $params) use ($validator, $servicePromo) {
        return ajoutPromo($params, $validator, $servicePromo);
    },
    Fonction::afficherAllPromos->value => function() use ($servicePromo) {

        affichageAllPromo($servicePromo);
    },

    Fonction::AffichageListe->value => function() use ($servicePromo) {

        affichageListe($servicePromo);
    },

    Fonction::trouverPromoGrille->value => function($nomPromo) use ($servicePromo,$grillePromotion) {
        return trouverPromo($nomPromo, $servicePromo, $grillePromotion);
    },

    Fonction::trouverPromoListe->value => function($nomPromo) use ($servicePromo,$ListePromotion) {
        return trouverPromo($nomPromo, $servicePromo, $ListePromotion);
    },
];
