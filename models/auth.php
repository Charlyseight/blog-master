<?php

include 'model.php';

function authLogin($password,$email){
    $cx = getConnectionToDb();
    $sql = 'SELECT password, email FROM blog.user WHERE password = :password AND email = :email';
    $pst = $cx->prepare($sql);
    $pst->execute([':password' => $password,
                    ':email' => $email]);
    return $pst->fetch();
}

function getAllPosts()
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts';
    $pst = $cx->query($sql);
    return $pst->fetchAll();

}

