<?php

$referentielServices = [
    'getReferentiels' => function() {
        $data = load_data();
        return $data['Referentiel'] ?? [];
    },
    
    'filterReferentiels' => function($search = '') {
        $referentiels = $referentielServices['getReferentiels']();
        if (empty($search)) return $referentiels;
        
        return array_filter($referentiels, function($ref) use ($search) {
            return stripos($ref['nom'], $search) !== false 
                || stripos($ref['description'], $search) !== false;
        });
    },
    
    'validateReferentiel' => function($data) {
        $errors = [];
        if (empty($data['nom'])) $errors[] = "Le nom est obligatoire";
        if (empty($data['description'])) $errors[] = "La description est obligatoire";
        if (!isset($data['capacite']) || $data['capacite'] < 1) {
            $errors[] = "La capacité doit être supérieure à 0";
        }
        return $errors;
    }
];