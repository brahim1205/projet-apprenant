<?php
require_once APP_PATH . 'controller/promo.controller.php';

// filepath: /home/khalil/Serveurphp/ges-apprenant/app/controller/controller.php

function render($view, $data = []) 
{
    extract($data); // Extrait les variables pour les rendre disponibles dans la vue

    // Capture le contenu de la vue
    ob_start();
    require_once APP_PATH . 'views/' . $view . '.php';
    $content = ob_get_clean();

    // Inclut le layout avec le contenu injecté
    require_once APP_PATH . 'views/layout/base.layout.php';
}


function render_view($view, $data = []) {
    extract($data);
    
    include APP_PATH . 'views/' . $view . '.php';
}


function redirect($url) {
    header("Location: " . BASE_URL . "/" . $url);
    exit();
}


function is_authenticated() {
    return isset($_SESSION['user']);
}


function require_auth() {
    if (!is_authenticated()) {
        redirect('login');
    }
}