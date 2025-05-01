<?php
// filepath: /home/khalil/Serveurphp/ges-apprenant/app/controller/login.controller.php
require_once APP_PATH . '/route/../model/auth.model.php';

function login_index() 
{
    //session_start();

    if (isset($_SESSION['user'])) {
        header('Location: index.php?route=dashboard');
        exit();
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = trim($_POST['login'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $user = authenticate_user($login, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: index.php?route=dashboard');
            exit();
        } else {
            $error = "Identifiants incorrects. Veuillez réessayer.";
        }
    }

    require APP_PATH . '/views/login/login.php';
}
function authenticate_user($login, $password) {
    $data = load_data();
    $users = $data['users'] ?? [];

    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            return $user;
        }
    }

    return null;
}
