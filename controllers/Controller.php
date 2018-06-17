<?php
namespace Blog\Controllers;

class Controller
{
    function authCheck()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?a=getLoginForm&r=auth');
            exit;
        }
    }
}

