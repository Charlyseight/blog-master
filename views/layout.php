<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
    <div>
        <a href="index.php?a=getLoginForm&r=auth">
            Se connecter
        </a>
        <a href="index.php?a=index&r=post">
            Tous les articles
        </a>
        <a href="index.php?a=create&r=post">
            Créer un article
        </a>
    </div>
</head>
<body>
<?php include $data['view']; ?>
</body>
</html>
