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
    if(!isset($_POST['email']) || !isset($_POST['password'])){
        header('Location: index.php?a=getLoginForm&r=auth');
        exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dbCheck = authLogin($password, $email);



    if ($dbCheck->email === $email && $dbCheck->password === $password) {


        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;


        return [
            'view' => 'postIndex.php',
            'data' => [
                'mail' => $dbCheck->email,
                'pwd' => $dbCheck->password
            ]
        ];
    } else {
        return [
            'view' => 'loginform.php'
        ];
    }
}

