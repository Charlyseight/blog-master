<form action="index.php" method="POST">
    <label for="title" id="title">
        titre
    </label>
    <input type="text" id="title" name="title" value="<?= $data['data']['post']->title;?>">
    <br>
    <label for="category">Category</label>
    <select name="category" id="category">
        <option value=""></option>
        <?php foreach ($data['data']['categories'] as $category): ?>
            <option value="<?=$category->name; ?>"><?=$category->name; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="desc">Description</label>
    <textarea name="desc" id="desc" cols="50" rows="5"><?= $data['data']['post']->description; ?></textarea>
    <label for="contenu" id="content">
        Contenu
    </label>
    <textarea name="content" id="contenu" cols="30" rows="10"><?= $data['data']['post']->content; ?></textarea>
    <input type="hidden" name="a" value="update">
    <input type="hidden" name="r" value="post">
    <input type="hidden" name="id" value="<?= $data['data']['post']->id?>">
    <input type="submit" value="Mettre à jour cette article">
</form>