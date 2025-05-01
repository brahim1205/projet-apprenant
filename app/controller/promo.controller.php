<?php
require_once APP_PATH . '/model/connexion.model.php'; // Inclure les fonctions load_data() et save_data()

function promo_add() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = trim($_POST['nom'] ?? '');
        $date_debut = trim($_POST['date_debut'] ?? '');
        $date_fin = trim($_POST['date_fin'] ?? '');
        $referentiel = trim($_POST['referentiel'] ?? '');

        // Vérifier que toutes les données sont présentes
        if (!empty($nom) && !empty($date_debut) && !empty($date_fin) && !empty($referentiel)) {
            // Gérer l'upload de la photo
            $photo = null;
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = APP_PATH . '/uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                $photo_name = uniqid() . '_' . basename($_FILES['photo']['name']);
                $photo_path = $upload_dir . $photo_name;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
                    $photo = '/uploads/' . $photo_name;
                }
            }

            // Charger les données existantes
            $data = load_data();
            $promotions = $data['Promotion'] ?? [];

            // Générer un nouvel ID
            $new_id = count($promotions) > 0 ? max(array_column($promotions, 'id')) + 1 : 1;

            // Ajouter la nouvelle promotion
            $promotions[] = [
                'id' => $new_id,
                'nom' => $nom,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'referentiel' => $referentiel,
                'photo' => $photo,
                'statut' => 'inactive'
            ];

            // Sauvegarder les données mises à jour
            $data['Promotion'] = $promotions;
            save_data($data);

            // Rediriger vers la page des promotions
            header('Location: index.php?route=promo');
            exit();
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }

    // Afficher le formulaire d'ajout
    render('promo/addpromo');
}
function promo_activate($id) {
    $data = load_data();
    $promotions = $data['Promotion'] ?? [];

    foreach ($promotions as &$promo) {
        if ($promo['id'] == $id) {
            $promo['statut'] = 'active';
        } else {
            $promo['statut'] = 'inactive';
        }
    }

    $data['Promotion'] = $promotions;
    save_data($data);

    // Rediriger vers la page des promotions
    header('Location: index.php?route=promo');
    exit();
}