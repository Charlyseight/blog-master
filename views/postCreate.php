<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="title" id="title">
        Title
    </label>
    <input type="text" id="title" name="title">
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
    <textarea name="desc" id="desc" cols="50" rows="5"></textarea>
    <label for="contenu" id="content">
        Content
    </label>
    <textarea name="content" id="contenu" cols="100" rows="10"></textarea>
    <br>
    <input type="hidden" name="a" value="store">
    <input type="hidden" name="r" value="post">
    <input type="submit" value="Créer cette article">
</form>