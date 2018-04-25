<form action="index.php" method="POST">
    <label for="title" id="title">
        titre
    </label>
    <input type="text" id="title" name="title" value="<?= $data['data']['post']->title?>">
    <br>
    <label for="contenu" id="content">
        contenu
    </label>
    <textarea name="content" id="contenu" cols="30" rows="10">
        <?= $data['data']['post']->body ?>
    </textarea>
    <input type="hidden" name="a" value="update">
    <input type="hidden" name="r" value="post">
    <input type="hidden" name="id" value="<?= $data['data']['post']->id?>">
    <input type="submit" value="Mettre à jour cette article">
</form>