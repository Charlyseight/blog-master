<?php
namespace Blog\Controllers;

use Blog\Models\Auth;


class AuthController extends Controller
{
    private $authModel = null;

    function __construct()
    {
        include 'models/Post.php';
        $this->authModel = new Auth();
    }
    function getLoginForm()
    {
        $categories = $this->authModel->categories();
        return [
            'view' => 'loginform.php',
            'data' => [
              'categories' => $categories
            ]
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
        $user = $this->authModel->authLogin($password, $email);
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

    function register(){
        $categories = $this->authModel->categories();
        return [
            'view' => 'registerForm.php',
            'data' => [
                'categories' => $categories
            ]
        ];
    }

    function store()
    {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            header('Location: index.php?a=register&r=auth');
            exit;
        }
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $name = $_POST['name'];
        $id = $this->authModel->store($password, $email, $name);
        unset($_SESSION['user']);
        $_SESSION['user'] = $this->authModel->find($id);

        header('Location: index.php?a=index&r=post');
        exit;
    }
}


