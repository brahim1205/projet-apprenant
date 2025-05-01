<?php

function apprenants_index() {
    // Inclure la vue correspondante
    require_once APP_PATH . 'views/apprenant/apprenant.php';
}

function get_filtered_apprenants() {
    $data = load_data();
    return $data['Apprenants'] ?? [];
}

function export_apprenants() {
    $apprenants = json_decode($_POST['filtered_data'], true);
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="apprenants.csv"');
    
    $fp = fopen('php://output', 'w');
    
    // En-têtes CSV
    fputcsv($fp, ['Matricule', 'Nom', 'Adresse', 'Téléphone', 'Référentiel', 'Statut']);
    
    // Données
    foreach ($apprenants as $apprenant) {
        fputcsv($fp, [
            $apprenant['matricule'],
            $apprenant['nom'],
            $apprenant['adresse'],
            $apprenant['telephone'],
            $apprenant['referentiel'],
            $apprenant['statut']
        ]);
    }
    
    fclose($fp);
    exit();
}

function save_apprenant() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upload_dir = APP_PATH . '../public/uploads/apprenants/';
        
        // Créer le dossier s'il n'existe pas
        if (!file_exists($upload_dir)) {
            if (!mkdir($upload_dir, 0777, true)) {
                $_SESSION['error'] = "Impossible de créer le dossier d'upload";
                header('Location: index.php?route=ajoutapprenant');
                exit();
            }
        }
        
        // Gérer l'upload de la photo
        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo_name = uniqid() . '_' . basename($_FILES['photo']['name']);
            $photo_path = $upload_dir . $photo_name;
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
                $photo = 'uploads/apprenants/' . $photo_name;
            } else {
                $_SESSION['error'] = "Erreur lors de l'upload de la photo";
                header('Location: index.php?route=ajoutapprenant');
                exit();
            }
        }
        
        // Créer le nouvel apprenant
        $data = load_data();
        $apprenants = $data['Apprenants'] ?? [];
        
        $nouvel_apprenant = [
            'id' => count($apprenants) + 1,
            'matricule' => 'AP' . str_pad(count($apprenants) + 1, 3, '0', STR_PAD_LEFT),
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'date_naissance' => $_POST['date-naissance'],
            'lieu_naissance' => $_POST['lieu-naissance'],
            'adresse' => $_POST['adresse'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'referentiel' => $_POST['referentiel'],
            'photo' => $photo,
            'tuteur' => [
                'nom' => $_POST['nom-tuteur'],
                'lien_parente' => $_POST['lien-parente'],
                'adresse' => $_POST['adresse-tuteur'],
                'telephone' => $_POST['telephone-tuteur']
            ],
            'statut' => 'Actif'
        ];
        
        $apprenants[] = $nouvel_apprenant;
        $data['Apprenants'] = $apprenants;
        
        if (save_data($data)) {
            $_SESSION['success'] = "Apprenant ajouté avec succès";
            header('Location: index.php?route=apprenant');
            exit();
        }
    }
    
    $_SESSION['error'] = "Erreur lors de l'ajout de l'apprenant";
    header('Location: index.php?route=ajoutapprenant');
    exit();
}