<?php

function referentiel_index() {
    // Inclure la vue correspondante
    require_once APP_PATH . 'views/referentiel/referentiel.php';
}
function referentiel_add() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = trim($_POST['nom'] ?? '');
        $description = trim($_POST['description'] ?? '');

        // Vérifier que toutes les données sont présentes
        if (!empty($nom) && !empty($description)) {
            // Charger les données existantes
            $data = load_data();
            $referentiels = $data['Referentiels'] ?? [];

            // Générer un nouvel ID
            $new_id = count($referentiels) > 0 ? max(array_column($referentiels, 'id')) + 1 : 1;

            // Ajouter le nouveau référentiel
            $referentiels[] = [
                'id' => $new_id,
                'nom' => $nom,
                'description' => $description
            ];

            // Sauvegarder les données mises à jour
            $data['Referentiels'] = $referentiels;
            save_data($data);

            // Rediriger vers la page des référentiels
            header('Location: index.php?route=referentiel');
            exit();
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }

    // Afficher le formulaire d'ajout
    render('referentiel/addreferentiel');
}
function referentiel_save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Charger les données existantes
        $data = load_data();
        $referentiels = $data['Referentiels'] ?? [];

        // Récupérer les données du formulaire
        $nom = trim($_POST['nom']);
        $description = trim($_POST['description']);
        $capacite = intval($_POST['capacite']);
        $sessions = trim($_POST['sessions']);

        // Gérer l'importation de la photo
        $photo = '/assets/images/default-referentiel.png'; // Photo par défaut
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/assets/images/';
            $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                $photo = '/assets/images/' . basename($_FILES['photo']['name']);
            }
        }

        // Générer un nouvel ID
        $new_id = count($referentiels) > 0 ? max(array_column($referentiels, 'id')) + 1 : 1;

        // Ajouter le nouveau référentiel
        $referentiels[] = [
            'id' => $new_id,
            'nom' => $nom,
            'description' => $description,
            'capacite' => $capacite,
            'sessions' => $sessions,
            'photo' => $photo
        ];

        // Sauvegarder les données mises à jour
        $data['Referentiels'] = $referentiels;
        save_data($data);

        // Rediriger vers la liste des référentiels
        header('Location: index.php?route=referentiel');
        exit();
    }
}
function save_referentiel() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $capacite = $_POST['capacite'] ?? 30;
        $sessions = $_POST['sessions'] ?? 1;
        
        // Traitement de l'image
        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'public/uploads/referentiels/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $photo_name = uniqid() . '_' . basename($_FILES['photo']['name']);
            $photo_path = $upload_dir . $photo_name;
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
                $photo = $photo_path;
            }
        }
        
        // Charger les données existantes
        $data = load_data();
        $referentiels = $data['Referentiel'] ?? [];
        
        // Générer un nouvel ID
        $new_id = count($referentiels) > 0 ? max(array_column($referentiels, 'id')) + 1 : 1;
        
        // Créer le nouveau référentiel
        $nouveau_referentiel = [
            'id' => $new_id,
            'nom' => $nom,
            'description' => $description,
            'capacite' => (int)$capacite,
            'sessions' => (int)$sessions,
            'photo' => $photo,
            'statut' => 'actif'
        ];
        
        // Ajouter le référentiel
        $referentiels[] = $nouveau_referentiel;
        $data['Referentiel'] = $referentiels;
        
        // Sauvegarder dans le fichier JSON
        if (save_data($data)) {
            $_SESSION['success'] = "Référentiel ajouté avec succès";
            header('Location: index.php?route=toutreferentiel');
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la sauvegarde";
            header('Location: index.php?route=ajoutref');
            exit();
        }
    }
}