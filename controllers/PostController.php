<?php
namespace Blog\Controllers;

use Blog\Models\Post;

include './utils/images.php';

// https://laravel.com/docs/5.6/controllers#resource-controllers
class PostController extends Controller
{
    use \imageProcessing;
    private $postModel = null;

    function __construct()
    {
        $this->postModel = new Post();

    }

    function index()
    {
        $categories = $this->postModel->categories();
        $posts = $this->postModel->all();
        $articles = [];


        if(!empty($posts)){
            for($i=0;$i<3;$i++){
                $article = $posts[rand(0, count($posts)-1)];
                $articles[] = $article;
            }
        }



        return [
            'view' => 'postIndex.php',
            'data' => ['pageTitle' => 'liste des posts',
                'posts' => $posts,
                'articles' => $articles,
                'categories' => $categories
            ]
        ];
    }

    function category()
    {
        $cat = $_GET['cat'];
        $posts = $this->postModel->getCategoryPosts($cat);
        $categories = $this->postModel->categories();
        $about = $this->postModel->getAbout($cat);
        $articles = [];


        if(!empty($posts)){
            for($i=0;$i<3;$i++){
                $article = $posts[rand(0, count($posts)-1)];
                $articles[] = $article;
            }
        }
        return[
            'view' => 'postIndex.php',
            'data' => [
                'posts' => $posts,
                'articles' => $articles,
                'categories' => $categories,
                'about' => $about,

            ]
        ];
    }

    function catAbout(){
        $category= $_POST['category'];
        $about = $_POST['about'];
        $this->postModel->getCatAbout($category, $about);
        header('Location: index.php?a=adminPage&r=post');
        exit;


    }


// affiche le formulaire de creation pour un ressource

    function create()
    {
        $this->authCheck();
        $categories = $this->postModel->categories();
        return [
            'view' => 'postCreate.php',
            'data' => [
                'categories' => $categories,
            ]
        ];
    }
//enrigstre la ressource dans la base de donnée
//apres il y aura une redirection

    function store()
    {
        $this->authCheck();
        if (!isset($_POST['title']) &&
            !isset ($_POST['content'])
        ) {
            exit;

        }


        $category = $_POST['category'];
        $title = $_POST['title'];
        $createby = $_SESSION['user']->name;
        $desc = $_POST['desc'];
        $content = $_POST['content'];

        $id = $this->postModel->storePost($category, $title, $createby, $desc, $content);

        header('Location: index.php?a=index&r=post');
        exit;
    }


// affiche une ressource par rapport a un identifiant

    function show()
    {
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
        $id = $_GET['id'];

        $categories = $this->postModel->categories();
        $post = $this->postModel->find($id);

        return [
            'view' => 'postShow.php',
            'data' => [
                'pageTitle' => $post->title,
                'post' => $post,
                'categories' => $categories,
            ]
        ];
    }


// afficher le formulaire d'edition par rapport a un identifiant

    function edit()
    {
        $this->authCheck();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
        $id = $_GET['id'];

        $categories = $this->postModel->categories();
        $post = $this->postModel->find($id);

        return [
            'view' => 'postEdit.php',
            'data' => [
                'post' => $post,
                'categories' => $categories,
            ]
        ];
    }


// modifier une ressource dans la base de donnée par rapport a un identifiant

    function update()
    {
        $this->authCheck();
        if (!isset($_POST['id']) ||
            !ctype_digit($_POST['id']) ||
            !isset ($_POST['category']) ||
            !isset($_POST['title']) ||
            !isset ($_POST['desc']) ||
            !isset ($_POST['content'])
        ) {
            header('Location: index.php?a=index&r=post');
            exit;

        }
        $id = $_POST['id'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $content = $_POST['content'];

        $id = $this->postModel->updatePost($id, $category, $title, $desc, $content);
        header('Location: index.php?a=index&r=post');
        exit;

    }

    function confirmDelete()
    {
        $this->authCheck();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            return false;
        }
        $id = $_GET['id'];
        $post = $this->postModel->find($id);
        $categories = $this->postModel->categories();

        return [
            'view' => 'postConfirmDelete.php',
            'data' => [
                'post' => $post,
                'categories' => $categories
            ]
        ];

    }



// supprime un element de la base de donnée

    function destroy()
    {
        $this->authCheck();
        if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
            return false;
        }
        $id = $_POST['id'];
        $this->postModel->deletePost($id);
        header('Location: index.php?a=index&r=post');
    }

    function userPages(){

        $this->authCheck();
        $name = $_SESSION['user']->name;
        $posts = $this->postModel->getUserPosts($name);
        $categories = $this->postModel->categories();
        return [
            'view' => 'postUser.php',
            'data' => [
                'posts' => $posts,
                'categories' => $categories
            ]
        ];
    }

    function adminPage(){
        $this->authCheck();
        if(!$_SESSION['user']->id === 3){
            header('Location: index.php?a=index&r=post');
        }
        $posts=$this->postModel->all();
        $categories = $this->postModel->categories();
        $users = $this->postModel->getUsers();
        return[
            'view' => 'postAdmin.php',
            'data' => [
                'posts' => $posts,
                'categories' => $categories,
                'users'=> $users,
            ]
        ];
    }

    function removeCat(){
        $this->authCheck();
        $category = $_POST['category'];
        $this->postModel->delCat($category);

        header('Location: index.php?a=adminPage&r=post');
        exit;
        }

        function addCat(){
        $this->authCheck();
        $category = $_POST['cat'];
        $this->postModel->addCat($category);
            header('Location: index.php?a=adminPage&r=post');
            exit;
        }

        function archive(){
        $month = $_GET['month'];
        $year = $_GET['year'];
        $posts = $this->postModel->getArchive($month,$year);
        $categories = $this->postModel->categories();
        $articles = [];


        if(!empty($posts)){
            for($i=0;$i<3;$i++){
                $article = $posts[rand(0, count($posts)-1)];
                $articles[] = $article;
            }
        }

        return[
            'view'=> 'postIndex.php',
            'data' => [
                'categories' => $categories,
                'posts' => $posts,
                'articles' => $articles,
            ]
        ];

        }

        function admin(){
            $this->authCheck();
            $toggleAdmin = $_POST['toggleadmin'];
            $admin = $_POST['admin'];
            $this->postModel->editAdmin($toggleAdmin,$admin);

            header('Location: index.php?a=adminPage&r=post');
            exit;
        }

    function nuke()
    {
        //authCheck();
        $this->postModel->nukePosts();
        echo 'The end of the FUCKING world !';
        exit;
    }
}

// la liste des posts











