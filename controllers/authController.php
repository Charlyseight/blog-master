<?php

include 'models/auth.php';


function getLoginForm()
{
    return [
        'view' => 'loginform.php'
    ];
}

function login()
{
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        header('Location: index.php?a=getLoginForm&r=auth');
        exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = authLogin($password, $email);
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php?a=index&r=post');
    } else {
        header('Location: index.php?a=getLoginForm&r=auth');
    }
    exit;
}

function logOut()
{
    $_SESSION = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 0,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
    header('Location: index.php');
    exit;
}

