<?php
function load_data() {
    $file = APP_PATH . 'data/data.json';
    try {
        if (!file_exists($file)) {
            // Créer un fichier avec une structure de base si n'existe pas
            $default_data = [
                'users' => [],
                'Referentiels' => [],
                'Promotion' => []
            ];
            file_put_contents($file, json_encode($default_data, JSON_PRETTY_PRINT));
        }
        return json_decode(file_get_contents($file), true) ?? [];
    } catch (Exception $e) {
        error_log("Erreur de chargement des données: " . $e->getMessage());
        return [];
    }
}

function save_data($data) {
    $file = APP_PATH . 'data/data.json';
    try {
        return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    } catch (Exception $e) {
        error_log("Erreur de sauvegarde des données: " . $e->getMessage());
        return false;
    }
}