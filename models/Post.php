<?php
namespace Blog\Models;



class Post extends Model
{
    function all()
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts ORDER BY date DESC';
        $pst = $cx->query($sql);
        return $pst->fetchAll();

    }

    function find($id)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':id' => $id]);
        return $pst->fetch();
    }

    function storePost($category, $title, $createby, $desc, $content)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'INSERT INTO posts(`category`,`title`,`date`,`createby`,`description`,`content`) VALUES(:category , :title , CURRENT_DATE , :createby, :description, :content)';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $category, ':title' => $title, ':createby' => $createby, ':description' => $desc, ':content' => $content]);
        return $cx->lastInsertId();
    }

    function updatePost($id, $category, $title, $desc, $content)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE posts SET category = :category, title = :title, description = :description, content = :content WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':category'=>$category, 'title' => $title, ':description' => $desc, ':content' => $content, ':id' => $id]);
    }

    function deletePost($id)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'DELETE FROM posts WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':id' => $id]);

    }

    function getUserPosts($name)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE createby = :user ';
        $pst = $cx->prepare($sql);
        $pst->execute([':user' => $name]);
        return $pst->fetchAll();
    }

    function nukePosts()
    {
        $cx = $this->getConnectionToDb();
        $sql = 'TRUNCATE TABLE blog.posts';
        $cx->query($sql);
    }

    function getCategoryPosts($cat)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE category = :category ORDER BY date DESC';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $cat]);
        return $pst->fetchAll();
    }

    function categories(){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM category';
        $pst = $cx->query($sql);
        return $pst->fetchAll();
    }

    function addCat($name){
        $cx = $this->getConnectionToDb();
        $sql = 'INSERT INTO category(`name`) VALUES(:name)';
        $pst = $cx->prepare($sql);
        $pst->execute([':name' => $name]);

    }

    function delCat($name){
        $cx = $this->getConnectionToDb();
        $sql = 'DELETE FROM category WHERE name = :name';
        $pst = $cx->prepare($sql);
        $pst->execute([':name' => $name]);
    }

    function getArchive($month,$year){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE (SELECT EXTRACT(MONTH FROM date) = :month) AND (SELECT EXTRACT(YEAR FROM date) = :year) ORDER BY date DESC';
        $pst = $cx->prepare($sql);
        $pst->execute([':month' => $month, ':year' => $year]);
        return $pst->fetchAll();
    }

    function getAbout($cat){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT about FROM category WHERE name = :category';
        $pst= $cx->prepare($sql);
        $pst->execute([':category' => $cat]);
        return $pst->fetch();
    }

    function getCatAbout($category, $about){
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE category SET about= :about WHERE name = :category';
        $pst = $cx->prepare($sql);
        $pst->execute([':about' => $about, ':category' => $category]);
    }

    function getUsers(){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT name FROM users';
        $pst = $cx->query($sql);
        return $pst->fetchAll();
    }

    function editAdmin($toggleadmin, $admin){
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE users SET admin = :admin WHERE name= :name';
        $pst = $cx->prepare($sql);
        $pst->execute([':admin' => $toggleadmin, ':name' => $admin]);
    }
}




