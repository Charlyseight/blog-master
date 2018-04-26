<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
    <div>
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="index.php?a=getLoginForm&r=auth">
                Se connecter
            </a>
        <?php else:  ?>
            <a href="index.php?a=logOut&r=auth">
                Se déconnecter
            </a>
        <?php endif; ?>
        <a href="index.php?a=index&r=post">
            Tous les articles
        </a>
        <?php if (isset($_SESSION['user'])): ?>
        <a href="index.php?a=create&r=post">
            Créer un article
        </a>
        <?php endif; ?>
    </div>
</head>
<body>
<?php include $data['view']; ?>
</body>
</html>
