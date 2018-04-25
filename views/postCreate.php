<form action="index.php" method="POST">
    <label for="title" id="title">
        titre
    </label>
    <input type="text" id="title" name="title">
    <br>
    <label for="contenu" id="content">
        contenu
    </label>
    <textarea name="content" id="contenu" cols="30" rows="10"></textarea>
    <input type="hidden" name="a" value="store">
    <input type="hidden" name="r" value="post">
    <input type="submit" value="créer cette article">
</form>