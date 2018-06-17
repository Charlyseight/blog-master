<?php
namespace Blog\Models;


class Auth extends Model
{
    function authLogin($password, $email)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT password, id FROM blogboot.users WHERE email = :email';
        $pst = $cx->prepare($sql);
        $pst->execute([':email' => $email]);
        $res = $pst->fetch();
        if($res){
            $pwHash = $res->password;
            $id = $res->id;
            if(password_verify($password, $pwHash)){
                $sql = 'SELECT * FROM blogboot.users WHERE id = :id';
                $pst = $cx->prepare($sql);
                $pst->execute([':id' => $id]);
                return $pst->fetch();
            }
        }else{
            die('pas d’utilisateur avec ce mail et ce mdp');
        }

    }

    function store($password,$email, $name){
        $cx = $this->getConnectionToDb();
        $sql = 'INSERT INTO blogboot.users(name,password, email) VALUES (:name, :password, :email)';
        $pst = $cx->prepare($sql);
        $pst = $pst->execute([':password' => $password, 'email' => $email, ':name' => $name]);
        return $cx->lastInsertId();
    }

    function find($id){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM blogboot.posts WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':id' => $id]);
        return $pst->fetch();
    }

    function categories(){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM blogboot.category';
        $pst = $cx->query($sql);
        return $pst->fetchAll();
    }
}


